<x-main-layout>

    {{-- title & search --}}
    <div class="row mb-3" >

        <h2 class="col-3"> {{__('مدير الملفات')}}</h2>

        <x-alert name="success" />
        <x-alert name="danger" />

        {{-- search --}}
        {{-- <div class="search mb-3 col-9">

            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                </span>
                <input type="text" class="form-control" placeholder="البحث عن ملف"  aria-describedby="addon-wrapping">
            </div>

        </div> --}}

    </div>

    {{-- Statistics --}}

    <div class="d-flex justify-content-between mb-4">

        {{-- orphans --}}
        <div class="bg-white d-flex justify-content-between border rounded p-2" style="width: 23%">

            <div class="d-flex gap-2 align-items-center">
                <img class="mb-2" src="{{asset('image/orphans.svg')}}" alt="">

                <div>
                    <p class="fs-5 fw-semibold mb-1">{{__('الأيتام')}}</p>
                    <p class="title"> {{$orphan_count}} {{__('يتيم')}} </p>
                </div>

            </div>

            <div class="d-flex flex-end mt-2">
                <a href=""> <img src="{{asset('image/Arrow.svg')}}" alt=""> </a>
            </div>

        </div>

        {{-- project --}}
        <div class="bg-white d-flex justify-content-between border rounded p-2" style="width: 23%">

            <div class="d-flex gap-2 align-items-center">
                <img class="mb-2" src="{{asset('image/projects.svg')}}" alt="">

                <div>
                    <p class="fs-5 fw-semibold mb-1">{{__('المشاريع')}}</p>
                    <p class="title"> 20 {{__('مشروع')}} </p>
                </div>

            </div>

            <div class="d-flex flex-end mt-2">
                <a href=""> <img src="{{asset('image/Arrow.svg')}}" alt=""> </a>
            </div>

        </div>

        {{-- Associations --}}
        <div class="bg-white d-flex justify-content-between border rounded p-2 " style="width: 23%">

            <div class="d-flex gap-2 align-items-center">
                <img class="mb-2" src="{{asset('image/Associations.svg')}}" alt="">

                <div>
                    <p class="fs-5 fw-semibold mb-1">{{__('الجمعيات')}}</p>
                    <p class="title"> {{$supporter_count}} {{__('جمعية')}} </p>
                </div>

            </div>

            <div class="d-flex flex-end mt-2">
                <a href=""> <img src="{{asset('image/Arrow.svg')}}" alt=""> </a>
            </div>

        </div>

        {{-- volunteers --}}
        <div class="bg-white d-flex justify-content-between border rounded p-2 " style="width: 23%">

            <div class="d-flex gap-2 align-items-center">
                <img class="mb-2" src="{{asset('image/volunteer.svg')}}" alt="">

                <div>
                    <p class="fs-5 fw-semibold mb-1">{{__('المتطوعين')}}</p>
                    <p class="title"> {{$volunteer_count}} {{__('متطوع')}} </p>
                </div>

            </div>

            <div class="d-flex flex-end mt-2">
                <a href=""> <img src="{{asset('image/Arrow.svg')}}" alt=""> </a>
            </div>

        </div>

    </div>

    {{-- Upload file --}}
    <div>

        {{-- upload_file --}}
        <!-- زر رفع الملف -->
        <div class="col-12 mb-4">
            <label class="mb-3 title-color fs-5"> {{ __('رفع الملف') }} </label> <br>
            <label for="upload_file_modal" class="custom-file-upload w-100 text-center p-3" data-bs-toggle="modal" data-bs-target="#categoryModal">
                <img src="{{ asset('image/upload.png') }}" alt=""> <br>
                {{__('اضغط هنا لتحميل ملف')}}
            </label>
        </div>

        <form action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Modal لاختيار الفئة -->
            <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title title-color"> {{__('اختر علاقة الملف')}} </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                        </div>
                        <div class="modal-body pt-0">
                            <ul class="list-group">
                                <li class="list-group-item category-option border-bottom " data-category="orphan" style="border: none">{{__('الأيتام')}}</li>
                                <li class="list-group-item category-option border-bottom " data-category="project" style="border: none">{{__('المشاريع')}}</li>
                                <li class="list-group-item category-option border-bottom " data-category="supporter" style="border: none">{{__('الجمعيات')}}</li>
                                <li class="list-group-item category-option border-bottom " data-category="volunteer" style="border: none">{{__('المتطوعين')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal لاختيار الاسم -->
            <div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="nameModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title title-color">{{__('اختر الاسم')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="searchInput" class="form-control mb-2" placeholder="{{__('ابحث عن اسم')}}">
                            <ul class="list-group" id="nameList">
                                <!-- سيتم تحميل الأسماء ديناميكيًا هنا -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عرض الاختيارات -->
            <div class="mt-3">
                <input type="hidden" id="selectedCategory" name="type" value=""/>
                <input type="hidden"  id="selectedId"  name="owner_file" value="">
            </div>

            <!-- حقل رفع الملف (مخفي ولكن سيتم النقر عليه تلقائيًا عند اختيار الاسم) -->
            <input type="file" id="fileInput" name="file" style="display: none;">
            <button type="submit" style="display: none" id="submit_button"></button>
        </form>

    </div>

    @push('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let selectedCategory = "";
            let selectedName = "";
            let selectedId = "";

            // جلب البيانات من السيرفر
            fetch('/files/categories')
            .then(response => response.json())
            .then(data => {
                const categoriesData = data;

                const categoryModal = new bootstrap.Modal(document.getElementById("categoryModal"));
                const nameModal = new bootstrap.Modal(document.getElementById("nameModal"));

                // عند اختيار الفئة
                document.querySelectorAll(".category-option").forEach(item => {
                    item.addEventListener("click", function () {
                        selectedCategory = this.getAttribute("data-category"); // حفظ اسم الفئة
                        let categoryKey = this.dataset.category;

                        // تحديث الفئة المختارة
                        document.getElementById("selectedCategory").value = selectedCategory;

                        // ملء القائمة بالأسماء الخاصة بالفئة المختارة
                        let nameList = document.getElementById("nameList");
                        nameList.innerHTML = "";

                        // استخدام البيانات الحقيقية
                        categoriesData[selectedCategory].forEach(entry => {
                            let li = document.createElement("li");
                            li.classList.add("list-group-item", "name-option", "border-bottom");
                            li.textContent = entry.name;
                            li.setAttribute("data-id", entry.id); // إضافة ID داخل العنصر
                            nameList.appendChild(li);
                        });

                        // إغلاق المودال الأول وفتح الثاني
                        categoryModal.hide();
                        setTimeout(() => nameModal.show(), 500);
                    });
                });

                // عند اختيار الاسم
                document.getElementById("nameList").addEventListener("click", function (e) {
                    if (e.target.classList.contains("name-option")) {
                        selectedName = e.target.textContent;
                        selectedId = e.target.getAttribute("data-id"); // جلب الـ ID

                        // تحديث النصوص في الـ input
                        document.getElementById("selectedId").value = selectedId; // يخزن الـ ID

                        // إغلاق المودال الثاني
                        nameModal.hide();

                        // فتح نافذة اختيار الملف تلقائيًا
                        setTimeout(() => {
                            document.getElementById("fileInput").click();
                        }, 500);
                    }
                });

                // البحث في الأسماء
                document.getElementById("searchInput").addEventListener("keyup", function () {
                    let filter = this.value.toLowerCase();
                    document.querySelectorAll("#nameList .name-option").forEach(item => {
                        item.style.display = item.textContent.toLowerCase().includes(filter) ? "" : "none";
                    });
                });

                // // إرسال النموذج بعد اختيار الصورة
                document.getElementById("fileInput").addEventListener("change", function () {
                    document.getElementById("submit_button").click()
                });

            })
            .catch(error => console.log('Error loading categories data:', error));
            });

    </script>


    @endpush

</x-main-layout>
