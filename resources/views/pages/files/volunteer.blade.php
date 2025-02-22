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



    {{-- Upload file --}}
    <div>

        {{-- upload_file --}}
        <div class="col-12  mb-4">
            <label class="mb-3 title-color fs-5"> المتطوعين  </label> <br>
            <label for="upload_file" class="custom-file-upload w-100 text-center p-3">
                <img src="{{asset('image/upload.png')}}" alt=""> <br>
                اضغط هنا لتحميل ملف
            </label>
            <input class="hidden-file-style" name="upload_file" type="file" id="upload_file" style="display: none;">
        </div>


    </div>

    {{-- file --}}

    {{-- title --}}
    <div class="d-flex gap-4">
        <p class="mb-3 title-color fs-5 fw-semibold"> الملفات  </p>

        {{-- filter --}}
        <div style="position: relative;">

            <div class="show-action">
                <img  src="{{asset('image/Filter.svg')}}" alt="">
                <span class="title-color">فلتر</span>
            </div>

            <div class="action" style="width:220px">
                <form action="">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <input type="radio" name="filter" id="">
                        <label for="" class="count"> محمد أحمد _ #557678</label>
                    </div>


                    <div class="d-flex align-items-center gap-2 mb-1">
                        <input type="radio" name="filter" id="">
                        <label for="" class="count"> محمد أحمد _ #557678</label>
                    </div>

                </form>
            </div>

        </div>

    </div>


    {{-- pdf file --}}
    <div class="bg-white d-flex justify-content-between border rounded p-2" style="width: 35%">

        <div class="d-flex gap-3 align-items-center">
            <img class="mb-2" src="{{asset('image/pdf.png')}}" alt="">

            <div>
                <p class="fs-5 fw-semibold mb-2"> شهادة الميلاد. pdf </p>
                <p class="title mb-1"> محمد أحمد _ #557678 </p>
                <p style="color: #C1C1C1"> 3 مارس 2025 </p>
            </div>

        </div>

        {{-- action --}}
        <div class="d-flex flex-end mt-2" style="position: relative; ">

            <img class="show-action" src="{{asset('image/point.svg')}}" alt="" width="20px" height="18px">

            <div class="action" style="top:18px">
                <a href="" class="text-decoration-none">
                    <img src="{{asset('image/Downlaod.png')}}" alt="">
                    <span style="color: var(--text-color);"> تحميل الملف </span>
                </a>

                <br>
                <a href="" class="text-decoration-none">
                    <img src="{{asset('image/transfer.png')}}" alt="">
                    <span style="color: var(--text-color);"> نقل لمجلد اخر </span>
                </a>

                <form action="" method="post" style="margin-right: -5px">
                    @csrf
                    @method('delete')
                    <button class="submit border-0 bg-transparent">
                        <img src="{{asset('image/Delete.svg')}}" alt="">
                        <span style="color: var(--text-color);">حذف</span>
                    </button>
                </form>
            </div>

        </div>


    </div>

</x-main-layout>
