<x-main-layout>
    @push('styles')

    @endpush

    <h2 class="mb-4">  {{__(' انشاء تقارير متابعة' )}}</h2>
    <h4 class="mb-4" style="color:var(--title-color);"> {{__('جمعية دار البر ')}}</h4>
    
    <x-alert name="success" />
    <x-alert name="danger" />


    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="{{route('report.follow.albar.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" style="justify-content:between;">


                    {{-- supporter_id --}}
                    {{-- <input type="hidden" name="supporter_id" value="{{$supporter_id}}" /> --}}

                    {{-- orphan_id --}}
                    <input type="hidden" name="orphan_id" value=""  id="orphan_id"/>

                    {{-- orphan_externel_code --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_externel_code" id="orphan_externel_code" class="border" type="text" label="  {{__(' الكود الخارجي اليتيم')}}" autocomplete="" placeholder="{{__('أدخل الكود الخارجي اليتيم')}}"/>
                    </div>


                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">{{__(' صورة اليتيم ' )}}</label> <br>

                        <label for="orphan_image" class="custom-file-upload w-75 text-center">{{__('أرفق صورة اليتيم')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <x-form.input name="orphan_image" class="border hidden-file-style" type="file" id="orphan_image" accept=".jpg,.jpeg,.png,.pdf" autocomplete="" />

                    </div>


                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل اسم اليتيم')}}"/>
                    </div>

                    {{-- orphan_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_code" id="orphan_code" class="border" type="text" label="  {{__(' الكود الداخلي اليتيم')}}" autocomplete="" placeholder="{{__('أدخل رقم ملف اليتيم')}}"/>
                    </div>




                    <!-- sponsor_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_name" id="sponsor_name" class="border" type="text" label=" {{__('اسم الكافل')}}"  placeholder="{{__('أدخل اسم الكافل')}}"/>
                    </div>

                    {{-- sponsor_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_number" id="sponsor_number" class="border" type="text" label=" {{__('رقم ملف الكافل')}}" autocomplete="" placeholder="{{__('أدخل رقم ملف الكافل')}}"/>
                    </div>


                    {{-- orphan_age --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="age" id="age" class="border" type="text" label="  {{__('عمر اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل عمر اليتيم')}} "/>
                    </div>

                    {{-- gender --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="gender" id="gender" class="border" type="text" label="  {{__('جنس اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل جنس اليتيم')}} "/>
                    </div>


                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" id="academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}}" autocomplete="" placeholder="{{__('أدخل المرحلة الدراسية')}}"/>
                    </div>

                    {{-- class --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="class" id="class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="{{__('أدخل الصف')}}"/>
                    </div>

                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" id="guardian_name" class="border" type="text" label=" {{__('المسؤول المباشر عن اليتيم')}}" autocomplete="" placeholder="{{__('أدخل المسؤول المباشر عن اليتيم')}}"/>
                    </div>

                    {{-- relationship_orphan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" id="guardian_relationship" class="border" type="text" label=" {{__('صلته باليتيم')}}" autocomplete="" placeholder="{{__('أدخل صلته باليتيم')}}"/>
                    </div>

                     <!-- supervising_authority -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="supervising_authority" value="جمعية عايش"  class="border" type="text" label="  {{__('الجهة المشرفة')}}"  placeholder="{{__('أدخل اسم الجهة المشرفة')}}" disabled/>
                    </div>


                    <!-- country -->
                    {{-- :value="$admin->email" --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="country" value="مصر"  class="border" type="text" label=" {{__('الدولة')}} " placeholder="{{__('أدخل الدولة')}}" disabled/>
                    </div>


                    {{-- orphan_nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality" id="nationality" class="border" value="مصري/ة" type="text" label="  {{__('جنسية اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل جنسية اليتيم')}} " disabled/>
                    </div>

                    {{-- save_orphan_quran --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="save_orphan_quran" id="save_orphan_quran" class="border" type="number" min="0" max="30" label=" {{__('حفظ اليتيم من القران الكريم')}}" autocomplete="" placeholder="{{__('أدخل حفظ اليتيم من القران الكريم')}}"/>
                    </div>

                    {{-- academic_level --}}

                    <div class="col-12 col-md-6 mb-3 ">
                        <label  class="mb-2"> {{__('المستوى الدراسي')}} </label>
                        <div class="d-flex gap-5">
                            <div>
                                <input type="radio" name="academic_level" id="we" value="ضعيف" >
                                <label for="we">{{__('ضعيف')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="academic_level" id="go" value="جيد">
                                <label for="go">{{__('جيد')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="academic_level" id="em" value="متوسط">
                                <label for="me">{{__('متوسط')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="academic_level" id="ex" value="ممتاز">
                                <label for="ex">{{__('ممتاز')}}</label>
                            </div>
                        </div>

                    </div>



                    {{-- orphan_obligations_islam --}}
                    <div class="col-12 col-md-6 mb-3 ">
                        <label for="type" class="mb-2"> {{__('التزام اليتيم بتعاليم الاسلام')}} </label>
                        <div class="d-flex gap-5">
                            <div>
                                <input type="radio" name="orphan_obligations_islam" id="w" value="ضعيفة" >
                                <label for="w">{{__('ضعيفة')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="orphan_obligations_islam" id="g" value="جيدة">
                                <label for="g">{{__('جيدة')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="orphan_obligations_islam" id="m" value="متوسطة">
                                <label for="m">{{__('متوسطة')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="orphan_obligations_islam" id="e" value="ممتازة">
                                <label for="e">{{__('ممتازة')}}</label>
                            </div>
                        </div>

                    </div>



                    {{-- changes_orphan_year --}}

                    <div class="col-12  mb-3 ">
                        <label for="type" class="mb-2"> {{__('التغيرات التي طرأت على اليتيم هذه السنة')}} </label>
                        <div class="d-flex gap-5">
                            <div>
                                <input type="radio" name="changes_orphan_year" id="learn" value="دخل دورة تدريبية لتعلم الحاسوب">
                                <label for="learn">{{__('دخل دورة تدريبية لتعلم الحاسوب')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="changes_orphan_year" id="study" value="بدأ المرحلة الثانوية">
                                <label for="study">{{__('بدأ المرحلة الثانوية')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="changes_orphan_year" id="other" value="أخرى">
                                <label for="other">{{__('أخرى')}}</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-12  mb-3" id="other_changes_orphan_year" style="display: none">
                        <x-form.textarea name="other_changes_orphan_year" id="other_changes_orphan_year1" label=" {{__('التغيرات التي طرأت على اليتيم هذه السنة')}}" />
                    </div>



                    {{--  authority_comment_guarantee --}}

                    <div class="col-12  mb-3 ">
                        <label for="type" class="mb-2"> {{__('تعليق الهيئة على أثر الكفالة')}} </label>
                        <div class="d-flex gap-5">
                            <div>
                                <input type="radio" name="authority_comment_guarantee" id="save" value="تغيير إيجابي حيث حفظ ٣ أجزاء من القرأن">
                                <label for="save">{{__('تغيير إيجابي حيث حفظ ٣ أجزاء من القرأن')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="authority_comment_guarantee" id="change" value="تغيير ممتاز حيث قام بالتفوق في دراسته">
                                <label for="change">{{__('تغيير ممتاز حيث قام بالتفوق في دراسته')}}</label>
                            </div>
                            <div>
                                <input type="radio" name="authority_comment_guarantee" id="other1" value="أخرى">
                                <label for="other1">{{__('أخرى')}}</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-12  mb-3" id="other_authority_comment_guarantee" style="display: none">
                        <x-form.textarea name="other_authority_comment_guarantee" id="other_authority_comment_guarantee1" label=" {{__('تعليق الهيئة على أثر الكفالة')}}"  placeholder="{{__('أدخل تعليق الهيئة على أثر الكفالة')}}"/>
                    </div>


                    {{-- orphan_message--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="orphan_message" id="orphan_message" label=" {{__('رسالة اليتيم للكافل')}}"  />
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">{{__(' صورة رسالة اليتيم للكافل' )}}</label> <br>

                        <label for="orphan_image_message" class="custom-file-upload w-75 text-center">{{__('أرفق رسالة اليتيم للكافل')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <x-form.input name="orphan_image_message" class="border hidden-file-style" type="file" id="orphan_image_message" style="display: none;" accept=".jpg,.jpeg,.png,.pdf" autocomplete="" />

                    </div>



                    {{-- Health status --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="health_status" id="health_status" label="{{__('الحالة الصحية لليتيم')}}"  placeholder="{{__('أدخل الحالة الصحية لليتبم')}}"/>
                    </div>


                </div>

            </div>


            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
            </div>


        </form>

        @push('scripts')

        <script>
            let orphans = @json($orphans);
        </script>

        {{-- عشان يملأ الحقول المخزنة مسبقا بشكل تلقائي --}}
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        var orphanIdInput = document.getElementById("orphan_id");
        var orphanCodeInput = document.getElementById("orphan_code");
        var orphanExternelCodeInput = document.getElementById("orphan_externel_code");
        var orphanNameInput = document.getElementById("orphan_name");
        var orphanAgeInput = document.getElementById("age");
        var orphanGenderInput = document.getElementById("gender");
        var saveQuranInput = document.getElementById("save_orphan_quran");
        var orphanGuardianRelationshipInput = document.getElementById("guardian_relationship");
        var orphanGuardianNameInput = document.getElementById("guardian_name");
        var orphanHealthStatusInput = document.getElementById("health_status");
        var orphanAcademicStageInput = document.getElementById("academic_stage");
        var orphanClassInput = document.getElementById("class");
        var sponsorNameInput = document.getElementById("sponsor_name");
        var sponsorNumberInput = document.getElementById("sponsor_number");
        var otherAuthorityInput = document.getElementById("other_authority_comment_guarantee1");
        var orphanMessageInput = document.getElementById("orphan_message");
        var otherChangesInput = document.getElementById("other_changes_orphan_year1");

        function fillOrphanData(orphan) {
            if (!orphan || !orphan.orphan) return;

            orphanIdInput.value = orphan.orphan.id || '';
            orphanCodeInput.value = orphan.orphan.internal_code || '';
            orphanExternelCodeInput.value = orphan.external_code || '';
            orphanNameInput.value = orphan.orphan.name || '';
            orphanGenderInput.value = orphan.orphan.gender || '';
            orphanAgeInput.value = calculateAgeFromBirthdate(orphan) || '';
            orphanGuardianNameInput.value = orphan.orphan.guardian?.guardian_name || '';
            orphanGuardianRelationshipInput.value = orphan.orphan.guardian?.guardian_relationship || '';
            orphanHealthStatusInput.value = orphan.orphan.health_status || '';
            orphanAcademicStageInput.value = orphan.orphan.profile?.academic_stage || '';
            orphanClassInput.value = orphan.orphan.profile?.class || '';
            sponsorNameInput.value = orphan.orphan.sponsor?.sponsor_name || '';
            sponsorNumberInput.value = orphan.orphan.sponsor?.sponsor_number || '';
            saveQuranInput.value = orphan.orphan.data?.save_orphan_quran || '';
            otherAuthorityInput.value = orphan.orphan.data?.other_authority_comment_guarantee || '';
            orphanMessageInput.value = orphan.orphan.data?.orphan_message || '';
            otherChangesInput.value = orphan.orphan.data?.other_changes_orphan_year || '';

            orphanCodeInput.disabled = orphanCodeInput.value !== '';
            orphanExternelCodeInput.disabled = orphanExternelCodeInput.value !== '';
            orphanNameInput.disabled = orphanNameInput.value !== '';

            if (orphan.orphan.data?.academic_level) {
                let academicLevelInput = document.querySelector(`input[name="academic_level"][value="${orphan.orphan.data.academic_level}"]`);
                if (academicLevelInput) academicLevelInput.checked = true;
            }

            if (orphan.orphan.data?.orphan_obligations_islam) {
                let islamObligationInput = document.querySelector(`input[name="orphan_obligations_islam"][value="${orphan.orphan.data.orphan_obligations_islam}"]`);
                if (islamObligationInput) islamObligationInput.checked = true;
            }

            if (orphan.orphan.data?.changes_orphan_year) {
                let changesInput = document.querySelector(`input[name="changes_orphan_year"][value="${orphan.orphan.data.changes_orphan_year}"]`);
                if (changesInput) {
                    changesInput.checked = true;
                    if (changesInput.value === 'أخرى') {
                        document.getElementById('other_changes_orphan_year').style.display = 'block';
                    }
                }
            }

            if (orphan.orphan.data?.authority_comment_guarantee) {
                let authorityInput = document.querySelector(`input[name="authority_comment_guarantee"][value="${orphan.orphan.data.authority_comment_guarantee}"]`);
                if (authorityInput) {
                    authorityInput.checked = true;
                    if (authorityInput.value === 'أخرى') {
                        document.getElementById('other_authority_comment_guarantee').style.display = 'block';
                    }
                }
            }
        }

        orphanCodeInput.addEventListener("input", function () {
            let code = orphanCodeInput.value.trim();
            let orphan = orphans.find(o => o.orphan?.internal_code === code);
            if (orphan) fillOrphanData(orphan);
        });

        orphanExternelCodeInput.addEventListener("input", function () {
            let code1 = orphanExternelCodeInput.value.trim();
            let orphan = orphans.find(o => o.external_code === code1);
            if (orphan) fillOrphanData(orphan);
        });

        orphanNameInput.addEventListener("input", function () {
            let name = orphanNameInput.value.trim();
            let orphan = orphans.find(o => o.orphan?.name === name);
            if (orphan) fillOrphanData(orphan);
        });

        function calculateAgeFromBirthdate(orphan) {
            if (orphan?.orphan?.data?.age) {
                return orphan.orphan.data.age;
            }

            const birthdate = orphan?.orphan?.birth_date;
            if (!birthdate) return '';

            const birth = new Date(birthdate);
            if (isNaN(birth)) return '';

            const today = new Date();
            let age = today.getFullYear() - birth.getFullYear();
            const m = today.getMonth() - birth.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) {
                age--;
            }

            return age < 1 ? 0 : age;
        }
    });
</script>


        {{-- to show textarea and hideen when choose اخرى --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const authorityRadios = document.querySelectorAll('input[name="authority_comment_guarantee"]');
                const authorityOther = document.getElementById('other_authority_comment_guarantee');

                const changesRadios = document.querySelectorAll('input[name="changes_orphan_year"]');
                const changesOther = document.getElementById('other_changes_orphan_year');

                function toggleVisibility(radios, containerId, valueToShow) {
                    radios.forEach(radio => {
                        radio.addEventListener('change', function () {
                            if (this.value === valueToShow) {
                                containerId.style.display = 'block';
                            } else {
                                containerId.style.display = 'none';
                            }
                        });

                        // عرض القيمة إذا كانت مختارة عند إعادة تحميل الصفحة
                        if (radio.checked && radio.value === valueToShow) {
                            containerId.style.display = 'block';
                        }
                    });
                }

                toggleVisibility(authorityRadios, authorityOther, 'أخرى');
                toggleVisibility(changesRadios, changesOther, 'أخرى');
            });
        </script>



        @endpush

</x-main-layout>
