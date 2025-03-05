{{-- basic-information --}}
<div class="bg-white p-3 mb-3 rounded shadow-sm">

    <div class="row" >


        {{-- orphan_name --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_name" class="border" type="text" label=" اسم اليتيم " autocomplete="" placeholder=" أدخل اسم اليتيم"/>
        </div>

        {{-- orphan_code --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_code" class="border" type="text" label="  كود  اليتيم " autocomplete="" placeholder=" أدخل كود اليتيم "/>
        </div>


        {{-- month_number --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="month_number" class="border" type="text" label=" عن عدد الأشهر " autocomplete="" placeholder=" أدخل عدد الأشهر  "/>
        </div>

    </div>

    <div class="row" >

        {{-- sponsor_code --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="sponsor_code" class="border" type="text" label=" كود الكافل " autocomplete="" placeholder="أدخل كود الكافل"/>
        </div>

        <!-- sponsor_name -->
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="sponsor_name"  class="border" type="text" label=" اسم الكافل "  placeholder="أدخل اسم الكافل "/>
        </div>

        {{-- phone--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="phone" class="border" type="text" label=" الهاتف  " autocomplete="" placeholder="أدخل الهاتف  "/>
        </div>

        {{-- email--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="email" class="border" type="email" label=" البريد الالكتروني  " autocomplete="" placeholder="أدخل البريد الالكتروني   "/>
        </div>

        {{-- mailbox--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="mailbox" class="border" type="email" label=" صندوق البريد  " autocomplete="" placeholder="أدخل صندوق البريد   "/>
        </div>

        {{-- address--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="address" class="border" type="text" label=" العنوان " autocomplete="" placeholder="أدخل  العنوان"/>
        </div>

        {{-- orphan_fullname --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_fullname" class="border" type="text" label=" اسم الكامل اليتيم " autocomplete="" placeholder=" أدخل اسم الكامل اليتيم"/>
        </div>

        {{-- orphan_type --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_type" class="border" type="text" label=" نوع اليتيم " autocomplete="" placeholder=" أدخل نوع اليتيم"/>
        </div>

        {{-- birth_place --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="birth_place" class="border" type="text" label="  مكان الميلاد " autocomplete="" placeholder=" أدخل مكان الميلاد "/>
        </div>

        {{-- nationality --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="nationality" class="border" type="text" label=" الجنسية " autocomplete="" placeholder=" أدخل الجنسية  "/>
        </div>

        {{-- gender --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="gender" class="border" type="text" label=" الجنس " autocomplete="" placeholder=" أدخل الجنس  "/>
        </div>

        {{-- birth_date --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="birth_date" class="border" type="date" label="  تاريخ الميلاد " autocomplete=""/>
        </div>


        {{-- age --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="age" class="border" type="text" label=" السن " autocomplete="" placeholder=" أدخل السن  "/>
        </div>

        {{-- reason_continuing_sponsorship--}}
        <div class="col-12  mb-3">
            <x-form.textarea name="reason_continuing_sponsorship" label=" سبب استمرار الكفالة بعد البلوغ "  value="أدخل سبب استمرار الكفالة بعد البلوغ "/>
        </div>

        {{-- father_death --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="father_death" class="border" type="date" label="  تاريخ وفاة الأب " autocomplete=""/>
        </div>

        {{-- mother_name --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم " autocomplete="" placeholder=" أدخل اسم الأم  "/>
        </div>

        {{-- mother_death --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="mother_death" class="border" type="date" label="  تاريخ وفاة الأم " autocomplete=""/>
        </div>

        {{-- family_number --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="family_number" class="border" type="number" label=" عدد افراد الاسرة  " min="0" autocomplete="" placeholder=" أدخل عدد افراد الاسرة   "/>
        </div>


        {{-- person_responsible--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="person_responsible" class="border" type="text" label=" اسم ولي الأمر" autocomplete="" placeholder="أدخل اسم  ولي الأمر "/>
        </div>

        {{-- relationship_orphan --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="relationship_orphan" class="border" type="text" label=" صلة القرابة " autocomplete="" placeholder="أدخل صلة القرابة"/>
        </div>

        {{-- person_responsible_phone --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="person_responsible_phone" class="border" type="text" label=" الهاتف " autocomplete="" placeholder="أدخل الهاتف "/>
        </div>

        {{-- person_responsible_whatsapp --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="person_responsible_whatsapp" class="border" type="text" label=" هاتف واتس اب " autocomplete="" placeholder="أدخل هاتف واتس اب  "/>
        </div>


        {{-- live_mother --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="live_mother" class="border" type="text" label=" هل يعيش مع امه؟" autocomplete="" placeholder="أدخل هل يعيش مع امه؟  "/>
        </div>

        {{-- reason --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="reason" class="border" type="text" label="  السبب  " autocomplete="" placeholder="أدخل السبب  "/>
        </div>

        {{-- housing_type --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="housing_type" class="border" type="text" label="  نوع السكن  " autocomplete="" placeholder="أدخل نوع السكن   "/>
        </div>

    </div>

    <div class="row" >


        {{-- conditions_orphan--}}
        <div class="col-12  mb-3">
            <x-form.textarea name="conditions_orphan" label=" الأحوال التي مر بها اليتيم مؤخرا و عائلته"  value="أدخل الأحوال التي مر بها اليتيم مؤخرا و عائلته "/>
        </div>

        {{-- health_status --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="health_status" class="border" type="text" label="  الحالة الصحية لليتيم" autocomplete="" placeholder="أدخل الحالة الصحية لليتيم"/>
        </div>

        {{-- chronic_disease --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="chronic_disease" class="border" type="text" label="  مرض مزمن  " autocomplete="" placeholder="أدخل  مرض مزمن"/>
        </div>

        {{-- Type_disease --}}
        <div class="col-12  mb-3">
            <x-form.input name="Type_disease" class="border" type="text" label="  نوع المرض و أسبابه " autocomplete="" placeholder="أدخل  نوع المرض و أسبابه"/>
        </div>


        {{-- academic_stage --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="academic_stage" class="border" type="text" label=" المرحلة الدراسية " autocomplete="" placeholder="أدخل  المرحلة الدراسية"/>
        </div>


        {{-- academic_level --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="academic_level" class="border" type="text" label=" المستوى الدراسي" autocomplete="" placeholder="أدخل المستوى الدراسي"/>
        </div>


        {{-- reason_notStudying --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="reason_notStudying" class="border" type="text" label=" سبب عدم الدراسة " autocomplete="" placeholder="أدخل سبب عدم الدراسة "/>
        </div>

        {{-- alternative_approach --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="alternative_approach" class="border" type="text" label="  التوجه البديل  " autocomplete="" placeholder="أدخل التوجه البديل  "/>
        </div>

        {{-- actions_supervisor --}}
        <div class="col-12  mb-3">
            <x-form.input name="actions_supervisor" class="border" type="text" label="  الاجراءات التي اتخذها المشرف  " autocomplete="" placeholder="أدخل الاجراءات التي اتخذها المشرف "/>
        </div>

        {{-- regular_praying --}}
        <div class="col-2  mb-3">
            <x-form.input name="regular_praying" class="border" type="text" label="  يواظب على الصلاة " autocomplete="" placeholder=" أجب بنعم أو لا "/>
        </div>

        {{-- actions_supervisor_praying --}}
        <div class="col-10 mb-3">
            <x-form.input name="actions_supervisor_praying" class="border" type="text" label="  الاجراءات التي اتخذها المشرف  " autocomplete="" placeholder="أدخل الاجراءات التي اتخذها المشرف "/>
        </div>

        {{-- ramadan_fasting --}}
        <div class="col-2  mb-3">
            <x-form.input name="ramadan_fasting" class="border" type="text" label="  صوم رمضان " autocomplete="" placeholder=" أجب بنعم أو لا "/>
        </div>


        {{-- actions_supervisor_ramadan --}}
        <div class="col-10  mb-3">
            <x-form.input name="actions_supervisor_ramadan" class="border" type="text" label="  الاجراءات التي اتخذها المشرف  " autocomplete="" placeholder="أدخل الاجراءات التي اتخذها المشرف "/>
        </div>

        {{--quran_memorized? --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="quran_memorized" class="border" type="text" label="   كم يحفظ من القران الكريم " autocomplete="" placeholder=" أدخل كم يحفظ من القران الكريم "/>
        </div>

    </div>

    <div class="row" >


        <!-- orphan_supervisor -->
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_supervisor"  class="border" type="text" label=" مشرف الأيتام  "  placeholder="أدخل مشرف الأيتام  "/>
        </div>


        <!-- date -->
        {{-- :value="$admin->email" --}}
        <div class="col-12 col-md-6  mb-3">
            <x-form.input name="date"  class="border" type="date" label=" التاريخ " />
        </div>


        {{-- signature  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  التوقيع</label> <br>
            <label for="signature" class="custom-file-upload w-75 text-center"> ارفق صورة التوقيع   </label>
            <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">
        </div>

        {{-- seal_association   --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  ختم الجمعية المشرفة</label> <br>
            <label for="seal_association" class="custom-file-upload w-75 text-center"> ارفق صورة ختم الجمعية المشرفة </label>
            <input class="hidden-file-style" name="seal_association" type="file" id="seal_association" style="display: none;">
        </div>

        {{-- orphan_photo with batch plate  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  صوة اليتيم مع لوحة الدفعة</label> <br>
            <label for="orphan_photo" class="custom-file-upload w-75 text-center"> ارفق صوة اليتيم مع لوحة الدفعة </label>
            <input class="hidden-file-style" name="orphan_photo" type="file" id="orphan_photo" style="display: none;">
        </div>

        {{-- Thank you letter from orphan to sponsor  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  رسالة شكر من اليتيم للكافل</label> <br>
            <label for="thank_orphan" class="custom-file-upload w-75 text-center"> ارفق صورة رسالة شكر من اليتيم للكافل </label>
            <input class="hidden-file-style" name="thank_orphan" type="file" id="thank_orphan" style="display: none;">
        </div>

        {{-- The last certificate the orphan obtained and the last grades  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  اخر شهادة حصل عليها اليتيم و اخر درجات</label> <br>
            <label for="last_certificate" class="custom-file-upload w-75 text-center"> ارفق صورة اخر شهادة   </label>
            <input class="hidden-file-style" name="last_certificate" type="file" id="last_certificate" style="display: none;">
        </div>

        {{-- medical_report  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  التقرير الطبي</label> <br>
            <label for="medical_report" class="custom-file-upload w-75 text-center"> ارفق صورة التقرير الطبي </label>
            <input class="hidden-file-style" name="medical_report" type="file" id="medical_report" style="display: none;">
        </div>

        {{-- Receipt of transferring the sponsorship amount to the orphan’s account  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  ايصال تحويل مبلغ الكفالة الى حساب اليتيم</label> <br>
            <label for="receipt_transferring" class="custom-file-upload w-75 text-center"> أرفق صورة الايصال  </label>
            <input class="hidden-file-style" name="receipt_transferring" type="file" id="receipt_transferring" style="display: none;">
        </div>


    </div>
</div>


<div class="d-flex justify-content-center gap-4 mt-4">
    <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
</div>


