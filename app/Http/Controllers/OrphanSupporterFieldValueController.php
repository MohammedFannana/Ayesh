<?php

namespace App\Http\Controllers;

use App\Models\SupporterField;
use App\Models\Orphan;
use App\Models\OrphanSupporterFieldValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrphanSupporterFieldValueController extends Controller
{

    public function alBerStore(Request $request){

        $orphan = Orphan::findOrFail($request->orphan_id);

        // التحقق إذا كانت جميع الحقول قد تم ملؤها
        if (Gate::allows('has-filled-fields', $orphan)) {
            return redirect()->route('orphan.marketing.index')->with('danger', __('البيانات قد تم ملؤها مسبقاً. لا يمكن تعبئتها مرة أخرى.'));
        }

        $fields = SupporterField::whereIn('id', array_keys($request->all()['fields'] ?? []))->get()->pluck('field_type', 'id');
        $rules = [
            'orphan_id' => ['required', 'integer', 'exists:orphans,id'],
            'fields' => ['required', 'array'],
        ];


        foreach ($fields as $field_id => $field_type) {
            if ($field_type === 'file') {
                $rules["fields.$field_id.file"] = ['required', 'file', 'mimes:png,jpg,jpeg,pdf', 'max:1048576'];
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

        $orphan_name = $orphan->name;

        foreach ($validatedData['fields'] as $field_id => $data) {

            if ($request->hasFile("fields.$field_id.file")) {
                $file = $request->file("fields.$field_id.file");
                $fileName = 'التوقيع' . '.' . $file->getClientOriginalExtension();
                $data['value'] = $file->storeAs('orphans/' . $orphan_name, $fileName, 'public');
            }


            OrphanSupporterFieldValue::create([
                'orphan_id' => $request->orphan_id,
                'supporter_field_id' => $field_id,
                'value' => $data['value'],
            ]);
        }

        return redirect()->route('orphan.marketing.index')->with('success', __('تم حفظ البيانات بنجاح!'));
    }

    public function sharjahStore(Request $request){

        $orphan = Orphan::findOrFail($request->orphan_id);
        // التحقق إذا كانت جميع الحقول قد تم ملؤها
        if (Gate::allows('has-filled-fields', $orphan)) {
            return redirect()->route('orphan.marketing.index')->with('danger', __('البيانات قد تم ملؤها مسبقاً. لا يمكن تعبئتها مرة أخرى.'));
        }

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

        return redirect()->route('orphan.marketing.index')->with('success', __('تم حفظ البيانات بنجاح!'));
    }


}
