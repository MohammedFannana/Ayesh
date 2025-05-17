<x-main-layout>

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const yesRadio = document.getElementById('both_yes');
            const noRadio = document.getElementById('both_no');
            const motherDeath = document.getElementById('mother-death');
            const motherStatus = document.getElementById('mother-status');

            const motherDeathCertificate = document.getElementById('div_mother_death_certificate');
            const notOrphanField = document.getElementById('not-orphan-field');

            function toggleFields() {
                if (yesRadio.checked) {
                    motherDeath.style.display = 'block';
                    motherDeathCertificate.style.display = 'block';
                    notOrphanField.style.display = 'none';
                    motherStatus.style.display = 'none';

                } else if (noRadio.checked) {
                    motherStatus.style.display = 'block';
                    motherDeath.style.display = 'none';
                    motherDeathCertificate.style.display = 'none';
                    notOrphanField.style.display = 'block';
                }
            }

            yesRadio.addEventListener('change', toggleFields);
            noRadio.addEventListener('change', toggleFields);

            // تأكد من ضبط العرض عند التحميل
            toggleFields();
        });
    </script>

</x-main-layout>
