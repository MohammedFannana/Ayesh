<x-main-layout>

    @push('styles')

        <style>
            .multi-select-wrapper {
            position: relative;
            }

            .multi-select-label {
                /* font-size: 14px; */
                /* margin-bottom: 5px; */
                display: block;
                /* color: #333; */
            }

            .selected-options {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin-bottom: 10px;
            }

            .selected-option {
                display: flex;
                align-items: center;
                background-color: #e0e0e0;
                padding: 5px 10px;
                border-radius: 15px;
                font-size: 12px;
                color: #333;
            }

            .selected-option .remove-option,
            .selected-option .remove-language-option {
                margin-right: 5px;
                color: red;
                cursor: pointer;
                font-weight: bold;
            }

            .multi-select {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                cursor: pointer;
                position: relative;
            }

            .multi-select::after {
                content: '▼';
                position: absolute;
                top: 50%;
                left: 10px;
                transform: translateY(-50%);
                font-size: 12px;
                color: #666;
                pointer-events: none;
            }

            .multi-select-options {
                display: none;
                position: absolute;
                top: 100%;
                right: 3%;
                width: 94%;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                z-index: 1000;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .multi-select-options.show {
                display: block;
            }

            .select-language-option,
            .select-area-option {
                padding: 10px;
                font-size: 14px;
                cursor: pointer;
            }

            .select-language-option:hover,
            .select-area-option:hover {
                background-color: #f0f0f0;
            }
        </style>

    @endpush

    <h2 class="mb-4"> {{__('المتطوعين')}} </h2>
    <h4 class="mb-4 title-color"> {{__('إضافة متطوع ')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="volunteers">

        <form action="{{route('volunteer.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded shadow-sm p-3 mb-4">
                <p style="color:var(--text-color)" class="mb-3">{{__('المعلومات الأساسية')}}</p>

                <div class="row volunteers-form" style="justify-content:between;">

                    <!-- name -->
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" class="border" type="text" label="{{__('الاسم')}}" placeholder="أدخل الاسم"/>
                    </div>

                    <!-- country -->
                    <div class="col-12 col-md-6">
                        <x-form.input name="country" class="border" type="text" label="{{__('الدولة')}}" placeholder="أدخل الدولة"/>
                    </div>

                    <!-- phone -->
                    <div class="mt-4 col-12 col-md-6">
                        <x-form.input name="phone" class="border" type="text" label="{{__('رقم الجوال')}}" autocomplete="" placeholder="أدخل رقم الجوال"/>
                    </div>

                    <!-- email -->
                    <div class="mt-4 col-12 col-md-6">
                        <x-form.input name="email" class="border" type="email" label="{{__('البريد الالكتروني')}} " autocomplete="" placeholder="أدخل البريد الالكتروني"/>
                    </div>

                    <!-- address -->
                    <div class="mt-4 col-12">
                        <x-form.input name="address" class="border" type="text" label="{{__('العنوان')}} " autocomplete="" placeholder="أدخل العنوان"/>
                    </div>

                    <!-- area (regions) -->
                    <div class="multi-select-wrapper mt-4 col-12 col-md-6">
                        <label class="multi-select-label mb-2">{{__('المناطق التي ستقوم بتغطيتها')}}</label>
                        <div class="selected-options" id="selected-area-options"></div>
                        <div class="multi-select" id="multi-area-select">
                            <span class="selected-text count">اختر</span>
                        </div>
                        <div class="multi-select-options" id="multi-select-area-options">
                            <div class="select-area-option" data-value="القاهرة"> القاهرة </div>
                            <div class="select-area-option" data-value="الجيزة"> الجيزة </div>
                            <div class="select-area-option" data-value="الاسماعيلي"> الاسماعيلي </div>
                            <div class="select-area-option" data-value="area4">المنطقة 4</div>
                        </div>
                        <input type="hidden" name="area" id="area-input">
                    </div>

                    <!-- language -->
                    <div class="multi-select-wrapper mt-4 col-12 col-md-6">
                        <label class="multi-select-label mb-2">{{__('اللغة')}}</label>
                        <div class="selected-options" id="selected-language-options"></div>
                        <div class="multi-select" id="multi-language-select">
                            <span class="selected-text count">اختر</span>
                        </div>
                        <div class="multi-select-options" id="multi-select-language-options">
                            <div class="select-language-option" data-value="العربية"> العربية </div>
                            <div class="select-language-option" data-value="الانجليزية"> الانجليزية </div>
                            <div class="select-language-option" data-value="التركية"> التركية </div>
                            <div class="select-language-option" data-value="language4">لغة 4</div>
                        </div>
                        <input type="hidden" name="languages" id="language-input">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow-sm p-3">
                <p style="color:var(--text-color)" class="mb-3">{{__('الصور والملفات المطلوبة')}}</p>

                <label for="image" class="mb-3">{{__('صورة تحقق شخصية')}}</label> <br>
                <label for="selfie_image" class="custom-file-upload text-center" style="width:30%">{{__('ارفق صورة تحقق شخصية')}}</label>
                <input class="hidden-file-style" name="selfie_image" type="file" id="selfie_image" style="display: none;">
            </div>

            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn text-white mb-4" style="background-color: var(--title-color);padding-right: 30px; padding-left: 30px;" type="submit">{{__('حفظ')}}</button>
            </div>
        </form>




    </div>

    @push('scripts')

    <script>
        // منطق multi-select للمناطق
        const multiAreaSelect = document.getElementById('multi-area-select');
        const multiSelectAreaOptions = document.getElementById('multi-select-area-options');
        const selectedAreaOptionsDiv = document.getElementById('selected-area-options');
        const areaInput = document.getElementById('area-input');
        let selectedAreas = [];

        multiAreaSelect.addEventListener('click', (e) => {
            e.stopPropagation();
            multiSelectAreaOptions.classList.toggle('show');
        });

        multiSelectAreaOptions.querySelectorAll('.select-area-option').forEach(option => {
            option.addEventListener('click', () => {
                const value = option.getAttribute('data-value');
                const text = option.textContent.trim();

                if (!selectedAreas.includes(value)) {
                    selectedAreas.push(value);
                    const selectedOptionDiv = document.createElement('div');
                    selectedOptionDiv.className = 'selected-option';
                    selectedOptionDiv.setAttribute('data-value', value);
                    selectedOptionDiv.innerHTML = `${text} <span class="remove-option" data-value="${value}">✘</span>`;
                    selectedAreaOptionsDiv.appendChild(selectedOptionDiv);

                    areaInput.value = JSON.stringify(selectedAreas);
                }

                multiSelectAreaOptions.classList.remove('show');
            });
        });

        selectedAreaOptionsDiv.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-option')) {
                const value = e.target.getAttribute('data-value');
                selectedAreas = selectedAreas.filter(area => area !== value);
                e.target.parentElement.remove();
                areaInput.value = JSON.stringify(selectedAreas);
            }
        });

        document.addEventListener('click', (e) => {
            if (!multiAreaSelect.contains(e.target) && !multiSelectAreaOptions.contains(e.target)) {
                multiSelectAreaOptions.classList.remove('show');
            }
        });

        // منطق multi-select للغة
        const multiLanguageSelect = document.getElementById('multi-language-select');
        const multiSelectLanguageOptions = document.getElementById('multi-select-language-options');
        const selectedLanguageOptionsDiv = document.getElementById('selected-language-options');
        const languageInput = document.getElementById('language-input');
        let selectedLanguages = [];

        multiLanguageSelect.addEventListener('click', (e) => {
            e.stopPropagation();
            multiSelectLanguageOptions.classList.toggle('show');
        });

        multiSelectLanguageOptions.querySelectorAll('.select-language-option').forEach(option => {
            option.addEventListener('click', () => {
                const value = option.getAttribute('data-value');
                const text = option.textContent.trim();

                if (!selectedLanguages.includes(value)) {
                    selectedLanguages.push(value);
                    const selectedOptionDiv = document.createElement('div');
                    selectedOptionDiv.className = 'selected-option';
                    selectedOptionDiv.setAttribute('data-value', value);
                    selectedOptionDiv.innerHTML = `${text} <span class="remove-option" data-value="${value}">✘</span>`;
                    selectedLanguageOptionsDiv.appendChild(selectedOptionDiv);

                    languageInput.value = JSON.stringify(selectedLanguages);
                }

                multiSelectLanguageOptions.classList.remove('show');
            });
        });

        selectedLanguageOptionsDiv.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-option')) {
                const value = e.target.getAttribute('data-value');
                selectedLanguages = selectedLanguages.filter(languages => languages !== value);
                e.target.parentElement.remove();
                languageInput.value = JSON.stringify(selectedLanguages);
            }
        });

        document.addEventListener('click', (e) => {
            if (!multiLanguageSelect.contains(e.target) && !multiSelectLanguageOptions.contains(e.target)) {
                multiSelectLanguageOptions.classList.remove('show');
            }
        });
    </script>

    @endpush

</x-main-layout>
