<x-main-layout>
    @push('styles')

        <style>
            .card1{
                background-color: #F6F6F6;
                border-bottom:2px solid var( --title-color);
                border-right:4px solid var( --title-color);
            }


            .basic-information{
                position: relative;
            }

            .basic-information::after{
                position: absolute;
                content: "";
                width: 1px;
                height: 100%;
                background-color: #C1C1C1;
                top: 0px;
                left: 15%;
            }

        </style>

    @endpush

    <h2 class="mb-4"> الشكاوي </h2>

    <div class="card1 row d-flex rounded p-2 mb-4">

        <div class="col-2 basic-information">

            <p class="mb-1 fw-semibold">محمد أحمد</p>
            <p class="mb-1 fw-semibold"> #558525 </p>
            <p class="mb-1 title"> 3 أبريل 2024 </p>

        </div>

        <div class="col-10">

            لوريم إيبسومهو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامتوم لوريم إيبسومهو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامتوم

        </div>

    </div>


    <div class="card1 row d-flex rounded p-2 mb-4">

        <div class="col-2 basic-information">

            <p class="mb-1 fw-semibold">محمد أحمد</p>
            <p class="mb-1 fw-semibold"> #558525 </p>
            <p class="mb-1 title"> 3 أبريل 2024 </p>

        </div>

        <div class="col-10">

            لوريم إيبسومهو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان


        </div>

    </div>

</x-main-layout>
