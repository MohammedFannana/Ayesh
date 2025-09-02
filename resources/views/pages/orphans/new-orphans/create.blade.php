<x-main-layout>

    @push('styles')

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @endpush


    <h2 class="mb-4">  {{__('يتيم جديد')}}</h2>
    <h4 class="mb-4" style="color:var(--title-color);"> {{__('استمارة التسجيل')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />


    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="{{route('orphan.registered.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @include('pages.orphans.new-orphans._form' , [
                    'button' => __('حفظ') ])

        </form>

    {{-- </div> --}}

    @push('scripts')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


         {{-- for governorate and city- --}}
        <script>
            const governorates = @json($governorates);

            $(document).ready(function () {
                $('#governorate').select2({
                    placeholder: 'اختر المحافظة'
                });

                $('#city-select').select2({
                    placeholder: 'اختر المدينة'
                });

                $('#governorate').on('change', function () {
                    const selectedId = parseInt($(this).val());
                    const selectedName = $('#governorate option:selected').data('name'); // نستفيد منه لتخزين الاسم لاحقاً
                    const citySelect = $('#city-select');

                    citySelect.empty().append('<option value="">اختر المدينة</option>');

                    const selectedGov = governorates.find(g => g.id === selectedId);
                    if (selectedGov && selectedGov.cities.length > 0) {
                        selectedGov.cities.forEach(city => {
                            citySelect.append(`<option value="${city.name}">${city.name}</option>`);
                        });
                    }

                    citySelect.trigger('change');
                });

            });
        </script>



        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const caseTypeSelect = document.getElementById('case_type');
                const motherDeathField = document.getElementById('mother-death');
                const motherWorkSection = document.getElementById('mother-work-section');
                const motherStatusField = document.getElementById('mother-status');

                function toggleMotherFields() {
                    const value = caseTypeSelect.value;

                    // أخفِ الجميع أولًا
                    motherDeathField.style.display = 'none';
                    motherWorkSection.style.display = 'none';
                    motherStatusField.style.display = 'none';

                    // إذا تم اختيار "يتيم الأبوين" أظهرهم
                    if (value === 'يتيم الأبوين') {
                        motherDeathField.style.display = 'block';

                    }else if(value === 'يتيم'){
                        motherWorkSection.style.display = 'block';
                        motherStatusField.style.display = 'block';
                    }
                }

                // عند تحميل الصفحة
                toggleMotherFields();

                // عند تغيير نوع الحالة
                caseTypeSelect.addEventListener('change', toggleMotherFields);
            });
        </script>

        {{-- for academic_stage --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const academicStage = document.getElementsByName('academic_stage');
                const academicStageDetails = document.getElementsByName('academic_stage_details');
                const reasonNotRegistering = document.getElementsByName('reason_not_registering');

                const $academicStageDetails = document.getElementById('academic_stage_details');
                const $academicSecondaryDetails = document.getElementById('academic_secondary_details');
                const $reasonNotRegistering = document.getElementById('reason_not_registering');
                const $otherReason = document.getElementById('other_reason_not_registering');

                function toggleSections() {
                    let stage = document.querySelector('input[name="academic_stage"]:checked')?.value;
                    let detail = document.querySelector('input[name="academic_stage_details"]:checked')?.value;

                    // 1. عرض / إخفاء المرحلة الدراسية
                    if (stage === "عام" || stage === "أزهري") {
                        $academicStageDetails.style.display = "block";
                    } else {
                        $academicStageDetails.style.display = "none";
                        $academicSecondaryDetails.style.display = "none";
                    }

                    // 2. عرض / إخفاء الثانوي الأزهري
                    if (detail === "ثانوي" && (stage === "أزهري" || stage === "عام")) {
                        $academicSecondaryDetails.style.display = "block";
                    } else {
                        $academicSecondaryDetails.style.display = "none";
                    }

                    // 3. عرض / إخفاء أسباب عدم القيد
                    if (stage === "غير مقيد(خارج التعليم)") {
                        $reasonNotRegistering.style.display = "block";

                        // نحصل على قيمة السبب هنا بعد التأكد أنه ظاهر
                        let reason = document.querySelector('input[name="reason_not_registering"]:checked')?.value;

                        // 4. عرض / إخفاء حقل "أخرى"
                        if (reason === "أخرى") {
                            $otherReason.style.display = "block";
                        } else {
                            $otherReason.style.display = "none";
                        }

                    } else {
                        $reasonNotRegistering.style.display = "none";
                        $otherReason.style.display = "none"; // <-- هذا يخفي الحقل مباشرة لما نغير stage
                    }
                }


                // Events
                academicStage.forEach(input => input.addEventListener('change', toggleSections));
                academicStageDetails.forEach(input => input.addEventListener('change', toggleSections));
                reasonNotRegistering.forEach(input => input.addEventListener('change', toggleSections));

                // تشغيل التحقق عند التحميل
                toggleSections();
            });
        </script>

        {{-- for academic_class --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const academicStageInputs = document.getElementsByName('academic_stage');
                const academicStageDetailsInputs = document.getElementsByName('academic_stage_details');

                const classDiv = document.getElementById('academic_class');
                const classSelect = document.querySelector('select[name="class"]');

                const primaryGrades = ['الأول', 'الثاني', 'الثالث', 'الرابع', 'الخامس', 'السادس'];
                const preparatoryGrades = ['الأول', 'الثاني', 'الثالث'];

                function updateClassOptions(gradeType) {
                    classSelect.innerHTML = '<option value="">اختر الصف</option>'; // Reset options

                    let options = [];

                    if (gradeType === 'ابتدائي') {
                        options = primaryGrades;
                    } else if (gradeType === 'إعدادي') {
                        options = preparatoryGrades;
                    }else if (gradeType === 'ثانوي') {
                        options = preparatoryGrades;
                    }

                    options.forEach(grade => {
                        const option = document.createElement('option');
                        option.value = grade;
                        option.textContent = grade;
                        classSelect.appendChild(option);
                    });
                }

                function toggleClassSection() {
                    let selectedStage = document.querySelector('input[name="academic_stage"]:checked')?.value;
                    let selectedDetail = document.querySelector('input[name="academic_stage_details"]:checked')?.value;

                    // إخفاء الصف إذا المرحلة تحت السن أو غير مقيد
                    if (selectedStage === "تحت السن" || selectedStage === "غير مقيد(خارج التعليم)") {
                        classDiv.style.display = 'none';
                        return;
                    }

                    // إظهار الصف إذا ابتدائي أو إعدادي
                    if (selectedDetail === 'ابتدائي' || selectedDetail === 'إعدادي' || selectedDetail === 'ثانوي') {
                        classDiv.style.display = 'block';
                        updateClassOptions(selectedDetail);
                    } else {
                        classDiv.style.display = 'none';
                    }
                }

                // Attach listeners
                academicStageInputs.forEach(input => input.addEventListener('change', toggleClassSection));
                academicStageDetailsInputs.forEach(input => input.addEventListener('change', toggleClassSection));

                toggleClassSection(); // Run once on load
            });
        </script>


        {{-- for id="health_status" --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const healthSelect = document.getElementById('health_status');
                const diseaseField = document.getElementById('disease_description');
                const disabilityField = document.getElementById('disability_type');

                function toggleFields() {
                    const value = healthSelect.value;

                    // أخفِ الجميع أولاً
                    diseaseField.style.display = 'none';
                    disabilityField.style.display = 'none';

                    // ثم أظهر حسب الاختيار
                    if (value === 'مريض') {
                        diseaseField.style.display = 'block';
                    } else if (value === 'معاق') {
                        disabilityField.style.display = 'block';
                    }
                }

                // عند تحميل الصفحة
                toggleFields();

                // عند تغيير الخيار
                healthSelect.addEventListener('change', toggleFields);
            });
        </script>

        {{-- for date --}}
        <script>
            const dateFields = [
                "#research_date",
                "#mother_death_date",
                "#father_death_date",
                "#birth_date",
                "#registrar_date"
            ];
            
            dateFields.forEach(id => {
                flatpickr(id, {
                    dateFormat: "Y-m-d",
                    altInput: true,
                    altFormat: "d-m-Y",
                    allowInput: true
                });
            });

        </script>





    @endpush


</x-main-layout>
