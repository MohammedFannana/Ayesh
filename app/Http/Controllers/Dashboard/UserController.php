<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate('8');
        return view('dashboard.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('dashboard.users.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required' ,'string'],
            'email' => ['required', 'email', Rule::unique('users' , 'email')],
            'phone' => ['required' , 'string' , 'unique:users,phone'],
            'type' => ['required' , 'in:registered,references,certified,marketer,financial_manager'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Hash::make($validated['password']);

        User::create($validated);
        return redirect()->route('dashboard.user.index')->with('success', 'تم انشاء مستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $valideted = $request->validate([
            'phone' => ['sometimes', Rule::unique(User::class)->ignore($id)],
            'name' => ['sometimes','string', 'min:3'],
            'email' => ['sometimes' , 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'type' => ['sometimes' , 'in:registered,references,marketer,certified,financial_manager'],
        ]);


        $user->update($valideted);

        return redirect()->route('dashboard.user.index')->with('success', 'تم تعديل المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if($user->type !== "admin"){
            $user->delete();
            return redirect()->route('dashboard.user.index')->with('success', 'تم حذف المستخدم بنجاح');
        }


    }
}
