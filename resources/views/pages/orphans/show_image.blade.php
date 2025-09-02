<x-main-layout>


    <x-alert name="success" />
    <x-alert name="danger" />

    {{-- <div class="d-flex justify-content-center mt-5">
        <img src="{{ asset('storage/' . $filePath) }}" alt="صورة" width="280px"  height="280px">
    </div> --}}

    <div class="d-flex justify-content-center mt-5">
        @php
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        @endphp

        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
            <img src="{{ asset('storage/' . $filePath) }}" alt="صورة" width="280px" height="280px">
        @elseif ($extension === 'pdf')
            <iframe src="{{ asset('storage/' . $filePath) }}" width="100%" height="600px" style="border: none;"></iframe>
        @else
            <p>الملف غير مدعوم للعرض المباشر. <a href="{{ asset('storage/' . $filePath) }}" target="_blank">تحميل الملف</a></p>
        @endif
    </div>

    <div class="d-flex justify-content-center mt-5">
        @php
            $downloadText = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])
                ? __('تنزيل الصورة')
                : ($extension === 'pdf'
                    ? __('تنزيل الملف PDF')
                    : __('تنزيل الملف'));
        @endphp

        <a href="{{ route('orphan.image.download', ['file' => encrypt($filePath)]) }}"
        type="button"
        class="add-button text-decoration-none pt-2 pb-2 text-center"
        style="width: 180px">
            {{ $downloadText }}
        </a>
    </div>




</x-main-layout>
