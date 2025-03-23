<div class="row" style="justify-content: flex-end;">
    <div class="row" style="margin-right: 15px;">



        <!-- name -->
        <div class="mt-4 col-md-5 col-12">
            <x-form.input name="name" :value="$user->name" class="border border-dark" type="text" label="الاسم" />
        </div>

        <!-- email -->
        <div class="mt-4 col-md-5 col-12">
            <x-form.input name="email" :value="$user->email" class="border border-dark" type="text" label="البريد الالكتروني" />
        </div>

        <!-- Phone -->

        <div class="mt-4 col-md-5 col-12">
            <x-form.input name="phone" class="border border-dark " type="text" label="رقم الجوال" :value="$user->phone" autocomplete="" />
        </div>


        {{-- type --}}
        <div class="col-12 col-md-5 mt-4">
            <label for="" class="mb-2"> {{__(' نوع المستخدم ')}} </label>
            <x-form.select name="case_type"
                :options="['' => ' اختر ', 'registered' => ' مسجل ', 'references' => ' مراجع ', 'certified' => ' معتمد ', 'financial_manager' => ' مدير مالي ']"   />

        </div>



        @if($button == " حفظ ")

        <!-- Password -->
        <div class="mt-4 col-md-5 col-12">
            <x-form.input name="password" class="border border-dark" type="password" label="كلمة المرور" autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 col-md-5 col-12">
            <x-form.input name="password_confirmation" class="border border-dark" type="password" label=" تأكيد كلمة المرور  " autocomplete="new-password" />
        </div>

        @endif



        <div class="flex items-center gap-4 mt-4">
            <button class="btn text-white mb-4" style="background-color:#009FBF;width:150px" type="submit"> {{$button}} </button>
        </div>
    </div>
</div>