<x-main-layout>

    {{-- title & search --}}
    <div class="row mb-3" >

        <h2 class="col-3"> مدير الملفات </h2>

        {{-- search --}}
        <div class="search mb-3 col-9">

            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                </span>
                <input type="text" class="form-control" placeholder="البحث عن ملف"  aria-describedby="addon-wrapping">
            </div>

        </div>

    </div>

    {{-- Statistics --}}

    <div class="d-flex justify-content-between mb-4">

        {{-- orphans --}}
        <div class="bg-white d-flex justify-content-between border rounded p-2" style="width: 23%">

            <div class="d-flex gap-2 align-items-center">
                <img class="mb-2" src="{{asset('image/orphans.svg')}}" alt="">

                <div>
                    <p class="fs-5 fw-semibold mb-1">الأيتام</p>
                    <p class="title"> 20 يتيم </p>
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
                    <p class="fs-5 fw-semibold mb-1">المشاريع</p>
                    <p class="title"> 20 مشروع </p>
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
                    <p class="fs-5 fw-semibold mb-1">الجمعيات</p>
                    <p class="title"> 20 جمعية </p>
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
                    <p class="fs-5 fw-semibold mb-1">المتطوعين</p>
                    <p class="title"> 20 متطوع </p>
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
        <div class="col-12  mb-4">
            <label class="mb-3 title-color fs-5"> رفع الملف  </label> <br>
            <label for="upload_file" class="custom-file-upload w-100 text-center p-3">
                <img src="{{asset('image/upload.png')}}" alt=""> <br>
                اضغط هنا لتحميل ملف
            </label>
            <input class="hidden-file-style" name="upload_file" type="file" id="upload_file" style="display: none;">
        </div>


    </div>

</x-main-layout>
