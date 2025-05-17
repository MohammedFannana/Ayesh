<x-main-layout>

    <h2 class="mb-5"> {{__('تعديل التقرير')}}</h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="{{route('report.update' , [$report->id , $report->supporter_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- basic-information --}}
            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" >

                    {{-- supporter_id --}}
                    {{-- <input type="hidden" name="supporter_id" value="{{$supporter_id}}" /> --}}

                    {{-- orphan_id --}}
                    {{-- <input type="hidden" name="orphan_id" value=""  id="orphan_id"/> --}}


                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_name" :value="$report->orphan->name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder=" أدخل اسم اليتيم" disabled/>
                    </div>

                    {{-- orphan_code --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_code" :value="$report->orphan->internal_code" id="orphan_code" class="border" type="text" label="  {{__('كود اليتيم')}}" autocomplete="" placeholder=" أدخل كود اليتيم " disabled/>
                    </div>


                    {{-- month_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="month_number" :value="$report->fields['month_number']" class="border" type="text" label=" {{__('عن عدد الأشهر')}}" autocomplete="" placeholder=" أدخل عدد الأشهر  "/>
                    </div>

                </div>

                <div class="row" >

                    {{-- sponsor_code --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_code" :value="$report->fields['sponsor_code']" class="border" type="text" label=" {{__('كود الكافل')}}" autocomplete="" placeholder="أدخل كود الكافل"/>
                    </div>

                    <!-- sponsor_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_name" :value="$report->fields['sponsor_name']"  class="border" type="text" label=" {{__('اسم الكافل')}}"  placeholder="أدخل اسم الكافل "/>
                    </div>

                    {{-- phone--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_phone" :value="$report->fields['sponsor_phone']" class="border" type="text" label=" {{__('الهاتف')}}  " autocomplete="" placeholder="أدخل الهاتف  "/>
                    </div>

                    {{-- email--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_email" :value="$report->fields['sponsor_email']" class="border" type="email" label=" {{__('البريد الالكتروني')}} " autocomplete="" placeholder="أدخل البريد الالكتروني   "/>
                    </div>

                    {{-- mailbox--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_mailbox" :value="$report->fields['sponsor_mailbox']" class="border" type="text" label=" {{__('صندوق البريد')}} " autocomplete="" placeholder="أدخل صندوق البريد   "/>
                    </div>

                    {{-- address--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_address" :value="$report->fields['sponsor_address']" class="border" type="text" label=" {{__('العنوان')}} " autocomplete="" placeholder="أدخل  العنوان"/>
                    </div>

                    {{-- orphan_fullname --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_fullname" :value="$report->orphan->name" id="orphan_fullname" class="border" type="text" label=" {{__('اسم الكامل اليتيم')}}" autocomplete="" placeholder=" أدخل اسم الكامل اليتيم" disabled/>
                    </div>

                    {{-- orphan_type --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_type" :value="$report->orphan->gender" id="orphan_type" class="border" type="text" label=" {{__('نوع اليتيم')}}" autocomplete="" placeholder=" أدخل نوع اليتيم" disabled/>
                    </div>

                    {{-- birth_place --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_place" :value="$report->orphan->birth_place" id="birth_place" class="border" type="text" label="  {{__('مكان الميلاد')}}" autocomplete="" placeholder=" أدخل مكان الميلاد " disabled/>
                    </div>

                    {{-- nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality" :value="$report->orphan->getFieldValueByDatabaseName('nationality')" id="nationality" class="border" type="text" label=" {{__('الجنسية')}} " autocomplete="" placeholder=" أدخل الجنسية  " disabled/>
                    </div>

                    {{-- gender --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="gender" :value="$report->orphan->gender" id="gender" class="border" type="text" label=" {{__('الجنس')}} " autocomplete="" placeholder=" أدخل الجنس  " disabled/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" :value="$report->orphan->birth_date" id="birth_date" class="border" type="date" label="  {{__('تاريخ الميلاد')}}" autocomplete="" disabled/>
                    </div>


                    {{-- age --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="age" id="age" :value="$report->orphan->age" class="border" type="text" label=" {{__('السن')}} " autocomplete="" placeholder=" أدخل السن  " disabled/>
                    </div>

                    {{-- reason_continuing_sponsorship--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="reason_continuing_sponsorship" :value="$report->orphan->getFieldValueByDatabaseName('reason_continuing_sponsorship')" id="reason_continuing_sponsorship" label=" {{__('سبب استمرار الكفالة بعد البلوغ')}}" disabled />
                    </div>

                    {{-- father_death --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="father_death_date" :value="$report->orphan->profile->father_death_date" class="border" id="father_death" type="date" label="  {{__('تاريخ وفاة الأب')}}" autocomplete="" disabled/>
                    </div>

                    {{-- mother_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_name" :value="$report->orphan->profile->mother_name" class="border" id="mother_name" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder=" أدخل اسم الأم  " disabled/>
                    </div>

                    {{-- mother_death --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_death_date" :value="$report->orphan->profile->mother_death_date" class="border" id="mother_death" type="date" label="  {{__('تاريخ وفاة الأم')}}" autocomplete="" disabled/>
                    </div>

                    {{-- family_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_number" :value="$report->orphan->family->family_number" class="border" id="family_number" type="number" label=" {{__('عدد افراد الاسرة')}} " min="0" autocomplete="" placeholder=" أدخل عدد افراد الاسرة   " disabled/>
                    </div>


                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" :value="$report->orphan->guardian->guardian_name" class="border" id="guardian_name" type="text" label=" {{__('اسم ولي الأمر')}}"  autocomplete="" placeholder="أدخل اسم  ولي الأمر " disabled/>
                    </div>

                    {{-- relationship_orphan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" :value="$report->orphan->guardian->guardian_relationship" class="border" id="guardian_relationship" type="text" label=" {{__('صلة القرابة')}}" autocomplete="" placeholder="أدخل صلة القرابة" disabled/>
                    </div>

                    {{-- person_responsible_phone --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="phone" class="border" :value="$report->orphan->profile->phone" id="phone" type="text" label=" {{__('الهاتف')}} " autocomplete="" placeholder="أدخل الهاتف " disabled/>
                    </div>

                    {{-- person_responsible_whatsapp --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="whatsapp_phone" id="whatsapp_phone" :value="$report->orphan->getFieldValueByDatabaseName('whatsapp_phone')" class="border" type="text" label=" {{__('هاتف واتس اب')}}" autocomplete="" placeholder="أدخل هاتف واتس اب  " disabled/>
                    </div>


                    {{-- live_mother --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="live_mother" :value="$report->fields['live_mother']" class="border" type="text" label=" {{__('هل يعيش مع امه؟')}}" autocomplete="" placeholder="أدخل هل يعيش مع امه؟  "/>
                    </div>

                    {{-- reason --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="reason_live" :value="$report->fields['reason_live']" class="border" type="text" label="  {{__('السبب')}}  " autocomplete="" placeholder="أدخل السبب  "/>
                    </div>

                    {{-- housing_type --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="housing_type" :value="$report->orphan->family->housing_type"  id="housing_type" class="border" type="text" label="  {{__('نوع السكن')}} " autocomplete="" placeholder="أدخل نوع السكن   " disabled/>
                    </div>

                </div>

                <div class="row" >


                    {{-- conditions_orphan--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="conditions_orphan" :value="$report->fields['conditions_orphan']" label=" {{__('الأحوال التي مر بها اليتيم مؤخرا و عائلته')}}"  value="أدخل الأحوال التي مر بها اليتيم مؤخرا و عائلته "/>
                    </div>

                    {{-- health_status --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="health_status" id="health_status" :value="$report->orphan->health_status" class="border" type="text" label="  {{__('الحالة الصحية لليتيم')}}" autocomplete="" placeholder="أدخل الحالة الصحية لليتيم" disabled/>
                    </div>

                    {{-- chronic_disease --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="chronic_disease" :value="$report->fields['chronic_disease']" class="border" type="text" label=" {{__('مرض مزمن')}} " autocomplete="" placeholder="أدخل  مرض مزمن"/>
                    </div>

                    {{-- Type_disease --}}
                    <div class="col-12  mb-3">
                        <x-form.input name="Type_disease" :value="$report->fields['Type_disease']" class="border" type="text" label="  {{__('نوع المرض و أسبابه')}}" autocomplete="" placeholder="أدخل  نوع المرض و أسبابه"/>
                    </div>


                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" :value="$report->orphan->profile->academic_stage" id="academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}}" autocomplete="" placeholder="أدخل  المرحلة الدراسية" disabled/>
                    </div>


                    {{-- academic_level --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_level" :value="$report->fields['academic_level']" class="border" type="text" label=" {{__('المستوى الدراسي')}}" autocomplete="" placeholder="أدخل المستوى الدراسي"/>
                    </div>


                    {{-- reason_notStudying --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="reason_notStudying" :value="$report->fields['reason_notStudying']" class="border" type="text" label=" {{__('سبب عدم الدراسة')}}" autocomplete="" placeholder="أدخل سبب عدم الدراسة "/>
                    </div>

                    {{-- alternative_approach --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="alternative_approach" :value="$report->fields['alternative_approach']" class="border" type="text" label="  {{__('التوجه البديل')}} " autocomplete="" placeholder="أدخل التوجه البديل  "/>
                    </div>

                    {{-- actions_supervisor --}}
                    <div class="col-12  mb-3">
                        <x-form.input name="actions_supervisor" :value="$report->fields['actions_supervisor']" class="border" type="text" label="  {{__('الاجراءات التي اتخذها المشرف')}} " autocomplete="" placeholder="أدخل الاجراءات التي اتخذها المشرف "/>
                    </div>

                    {{-- regular_praying --}}
                    <div class="col-4  mb-3">
                        <x-form.input name="regular_praying" :value="$report->fields['regular_praying']" class="border" type="text" label="  {{__('يواظب على الصلاة')}}" autocomplete="" placeholder=" أجب بنعم أو لا "/>
                    </div>

                    {{-- actions_supervisor_praying --}}
                    <div class="col-8 mb-3">
                        <x-form.input name="actions_supervisor_praying" :value="$report->fields['actions_supervisor_praying']" class="border" type="text" label="  {{__('الاجراءات التي اتخذها المشرف')}} " autocomplete="" placeholder="أدخل الاجراءات التي اتخذها المشرف "/>
                    </div>

                    {{-- ramadan_fasting --}}
                    <div class="col-4  mb-3">
                        <x-form.input name="ramadan_fasting" :value="$report->fields['ramadan_fasting']" class="border" type="text" label="  {{__('صوم رمضان')}}" autocomplete="" placeholder=" أجب بنعم أو لا "/>
                    </div>


                    {{-- actions_supervisor_ramadan --}}
                    <div class="col-8  mb-3">
                        <x-form.input name="actions_supervisor_ramadan" :value="$report->fields['actions_supervisor_ramadan']" class="border" type="text" label="  {{__('الاجراءات التي اتخذها المشرف')}} " autocomplete="" placeholder="أدخل الاجراءات التي اتخذها المشرف "/>
                    </div>

                    {{--quran_memorized? --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="quran_memorized" :value="$report->fields['quran_memorized']" class="border" type="text" label="   {{__('كم يحفظ من القران الكريم')}}" autocomplete="" placeholder=" أدخل كم يحفظ من القران الكريم "/>
                    </div>

                </div>

                <div class="row" >


                    <!-- orphan_supervisor -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_supervisor" :value="$report->fields['orphan_supervisor']"  class="border" type="text" label=" {{__('مشرف الأيتام')}} "  placeholder="أدخل مشرف الأيتام  "/>
                    </div>


                    <!-- date -->
                    {{-- :value="$admin->email" --}}
                    <div class="col-12 col-md-6  mb-3">
                        <x-form.input name="date"  class="border" :value="$report->fields['date']" type="date" label=" {{__('التاريخ')}} " />
                    </div>


                    {{-- signature  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('التوقيع')}}</label> <br>
                        <label for="signature" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صورة التوقيع')}}  </label>
                        <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">

                        <a href="{{route('orphan.image' , ['file' => encrypt($report->signature)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('التوقيع') }}.{{ pathinfo($report->signature, PATHINFO_EXTENSION) }}
                        </a>
                    </div>

                    {{-- seal_association   --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('ختم الجمعية المشرفة')}}</label> <br>
                        <label for="supporter_seal" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صورة ختم الجمعية المشرفة')}}</label>
                        <input class="hidden-file-style" name="supporter_seal" type="file" id="supporter_seal" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->supporter_seal)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('ختم الجمعية المشرفة') }}.{{ pathinfo($report->supporter_seal, PATHINFO_EXTENSION) }}
                        </a>
                    </div>

                    {{-- orphan_photo with batch plate  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('صوة اليتيم مع لوحة الدفعة')}}</label> <br>
                        <label for="group_photo" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صوة اليتيم مع لوحة الدفعة')}}</label>
                        <input class="hidden-file-style" name="group_photo" type="file" id="group_photo" style="display: none;">

                        <a href="{{route('orphan.image' , ['file' => encrypt($report->group_photo)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('صوة اليتيم مع لوحة الدفعة') }}.{{ pathinfo($report->group_photo, PATHINFO_EXTENSION) }}
                        </a>
                    </div>

                    {{-- Thank you letter from orphan to sponsor  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('رسالة شكر من اليتيم للكافل')}}</label> <br>
                        <label for="thanks_letter" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صورة رسالة شكر من اليتيم للكافل')}}</label>
                        <input class="hidden-file-style" name="thanks_letter" type="file" id="thanks_letter" style="display: none;">

                        <a href="{{route('orphan.image' , ['file' => encrypt($report->thanks_letter)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('رسالة شكر من اليتيم للكافل') }}.{{ pathinfo($report->thanks_letter, PATHINFO_EXTENSION) }}
                        </a>
                    </div>

                    {{-- The last certificate the orphan obtained and the last grades  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('اخر شهادة حصل عليها اليتيم و اخر درجات')}}</label> <br>
                        <label for="academic_certificate" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صورة اخر شهادة')}}  </label>
                        <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">

                        <a href="{{route('orphan.image' , ['file' => encrypt($report->academic_certificate)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('اخر شهادة حصل عليها اليتيم و اخر درجات') }}.{{ pathinfo($report->academic_certificate, PATHINFO_EXTENSION) }}
                        </a>
                    </div>

                    {{-- medical_report  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('التقرير الطبي')}}</label> <br>
                        <label for="medical_report" id="medical_report_label"  class="custom-file-upload w-75 text-center mb-1" disabled> {{__('ارفق صورة التقرير الطبي')}} </label>
                        <input class="hidden-file-style"  name="medical_report" type="file" style="display: none;" >
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->orphan->image->medical_report)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('التقرير الطبي') }}.{{ pathinfo($report->orphan->image->medical_report, PATHINFO_EXTENSION) }}
                        </a>
                    </div>

                    {{-- Receipt of transferring the sponsorship amount to the orphan’s account  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('ايصال تحويل مبلغ الكفالة الى حساب اليتيم')}}</label> <br>
                        <label for="sponsorship_transfer_receipt" class="custom-file-upload w-75 text-center mb-1"> {{__('أرفق صورة الايصال')}} </label>
                        <input class="hidden-file-style" name="sponsorship_transfer_receipt" type="file" id="sponsorship_transfer_receipt" style="display: none;">

                        <a href="{{route('orphan.image' , ['file' => encrypt($report->sponsorship_transfer_receipt)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('ايصال تحويل مبلغ الكفالة الى حساب اليتيم') }}.{{ pathinfo($report->sponsorship_transfer_receipt, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                </div>
            </div>

            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('تعديل')}} </button>
            </div>


        </form>

    </div>

</x-main-layout>
