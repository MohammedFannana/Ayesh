<?php

namespace App\Http\Controllers;

use App\Models\SupporterField;
use App\Models\Orphan;
use App\Models\OrphanSupporterFieldValue;
use Illuminate\Http\Request;

class OrphanSupporterFieldValueController extends Controller
{

    public function alBerStore(Request $request){


        $fields = SupporterField::whereIn('id', array_keys($request->all()['fields'] ?? []))->get()->pluck('field_type', 'id');
        $rules = [
            'orphan_id' => ['required', 'integer', 'exists:orphans,id'],
            'fields' => ['required', 'array'],
        ];


        foreach ($fields as $field_id => $field_type) {
            if ($field_type === 'file') {
                $rules["fields.$field_id.file"] = ['required', 'image', 'mimes:png,jpg,jpeg', 'dimensions:min_width=100,min_height=100', 'max:1048576'];
            } else {
                $rules["fields.$field_id.value"] = ['required'];
            }
        }

        $validatedData = $request->validate($rules);

        foreach ($validatedData['fields'] as $field_id => &$data) {
            if (isset($data['file'])) {
                $data['file'] = $request->file("fields.$field_id.file");
            }
        }

        $orphan = Orphan::findOrFail($request->orphan_id);
        $orphan_name = $orphan->name;

        foreach ($validatedData['fields'] as $field_id => $data) {

            if ($request->hasFile("fields.$field_id.file")) {
                $file = $request->file("fields.$field_id.file");
                $fileName = 'التوقيع' . '.' . $file->getClientOriginalExtension();
                $data['value'] = $file->storeAs($orphan_name, $fileName, 'public');
            }


            OrphanSupporterFieldValue::create([
                'orphan_id' => $request->orphan_id,
                'supporter_field_id' => $field_id,
                'value' => $data['value'],
            ]);
        }

        return redirect()->back()->with('success', __('تم حفظ البيانات بنجاح!'));
    }

    public function sharjahStore(Request $request){

        $fields = SupporterField::whereIn('id', array_keys($request->all()['fields'] ?? []))->get()->pluck('field_type', 'id');
        $rules = [
            'orphan_id' => ['required', 'integer', 'exists:orphans,id'],
            'fields' => ['required', 'array'],
        ];

        foreach ($fields as $field_id => $field_type) {
                $rules["fields.$field_id.value"] = ['required'];
        }

        $validatedData = $request->validate($rules);


        foreach ($validatedData['fields'] as $field_id => $data) {

            OrphanSupporterFieldValue::create([
                'orphan_id' => $request->orphan_id,
                'supporter_field_id' => $field_id,
                'value' => $data['value'],
            ]);
        }

        return redirect()->back()->with('success', __('تم حفظ البيانات بنجاح!'));
    }


}
