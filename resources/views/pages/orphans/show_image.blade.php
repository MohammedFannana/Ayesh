<x-main-layout>


    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="d-flex justify-content-center mt-5">
        <img src="{{ asset('storage/' . $filePath) }}" alt="صورة" width="280px"  height="440px">
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a href="{{route('orphan.image.download' , ['file' => encrypt($filePath)])}}" type="button"  class="add-button text-decoration-none pt-2 pb-2 text-center" style="width:180px"> {{__('تنزيل الصورة')}} </a>
    </div>

</x-main-layout>
