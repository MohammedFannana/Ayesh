<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        * {
        page-break-inside: avoid !important;
        page-break-before: avoid !important;
        page-break-after: avoid !important;
    }


        body {
            font-family: 'Arial';
            direction: rtl;
            margin: auto !important;
            margin-top: 2px !important;
            padding: 0 !important;
            width: 210mm !important; /* عرض A4 */
            height: 297mm !important; /* ارتفاع A4 */
            box-sizing: border-box !important;
        }

        .container{
            width: 100%;
            height: 100%;
            margin-top: 25px;
        }

        .value{
            float:left;
            border:1px solid #ddd;
            font-size:17px;
            padding-right: 2px;
            height: 38px;
        }

        .cell{
            /* text-align: center; */
            margin: 0;
            /* padding: 5px; */
            padding:4px 0 4px 4px;
            color: #555;
            margin: 0px !important;


        }

        .cell1{
            border: 1px solid #3A8DDE;
            padding:4px 0 4px 4px;
            margin: 0px !important;
        }

        .border{
            border:1px solid #ddd;
        }

        .intro{
            background-color:#3A8DDE;
            color:white;
            margin-bottom:2px;
            padding: 4px
        }


    </style>

</head>

<body>


    <div class="container">


        <div style="width: 100%;">
            <div style="float: right;width:75%">

                {{-- introduction --}}
                <div style="width: 100%;">

                    <div style="width: 25%;  float: right; overflow: hidden;">
                        <img src="{{ public_path('image/donor/dar_ber.png') }}" alt="شعار" width="119px" height="110px">
                    </div>

                    <div style="width: 75%;  float: right; text-align:center;">
                        <p style="font-size: 25px;color:#4389C8">التقريــــر الــــدوري لليتيــــم</p>
                        <p style="font-size: 20px">
                            لعــــــــام
                            <span style="color: #4389C8"> {{ date('Y') }} </span>
                        </p>
                    </div>

                </div>

                {{-- معلومات الهيئة المشرفة --}}
                <div style="width: 100%">
                    <p class="intro"> معلومات الهيئة المشرفة </p>

                    <div style="width: 100%;margin-top:0px">

                        <div style="width: 100%; overflow: hidden;">
                            <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell1"> اسم الهيئة المشرفة </p>
                            <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell" > جمعية عايش </p>
                        </div>

                        <div style="width: 100%;  float: right; margin-top:2px">
                            <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell1"> الدولة </p>
                            <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> مصر </p>
                        </div>

                    </div>
                </div>

                {{-- بيانات الكافل --}}
                <div style="width: 100%;">

                    <p class="intro"> بيانات الكافل </p>


                    <div style="width: 100%; overflow: hidden;">
                        <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell1"> اسم الكافل </p>
                        <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> @if($report->data->sponsor_name) {{$report->data->sponsor_name}} @else {{$report->data->orphan->sponsor->sponsor_name}} @endif </p>
                    </div>

                    <div style="width: 100%;  float: right; margin-top:2px">
                        <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell1"> رقم ملف الكافل </p>
                        <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> @if($report->data->sponsor_number) {{$report->data->sponsor_number}} @else {{$report->data->orphan->sponsor->sponsor_number}} @endif </p>
                    </div>

                </div>

            </div>

            {{-- image --}}
            <div style="float: left; width:24%;">
                <img src="{{ public_path('storage/' . $report->orphan_image) }}" alt="صورة" width="100%" height="340px">
            </div>

        </div>



        {{-- بيانات اليتيم --}}
        <div style="width: 100%;">

            <p class="intro"> بيانات اليتيم </p>

            <div style="width: 100%;margin-top:2px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell1"> اسم اليتيم</p>
                    <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->data->orphan->name}} </p>
                </div>

                <div style="width: 49%;  float: left; ">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell1"> رقم ملف اليتيم</p>
                    <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->data->orphan->internal_code}} </p>
                </div>
            </div>

            <div style="width: 100%;margin-top:5px">
                <div style="width: 33%; float: right; overflow: hidden;">
                    <p style="float: right; width:39%;background-color:#F4F4F4;" class="cell1"> جنسية اليتيم </p>
                    <p style="float: left; width:55%; background-color:#DDE4FF;" class="cell"> مصري/ة </p>
                </div>

                <div style="width: 33%;  float: left; ">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell1"> عمر اليتيم</p>
                    <p style="float: left; width:65%; background-color:#DDE4FF;" class="cell"> @if($report->data->age) {{$report->data->age}} @else {{calculateAge($report->data->orphan->birth_date)}} @endif </p>
                </div>

                <div style="width: 33%;  float: left; ">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell1"> الجنس</p>
                    <p style="float: left; width:65%; background-color:#DDE4FF;" class="cell">  @if ($report->data->gender) {{$report->data->gender}} @else {{$report->data->orphan->gender}} @endif </p>
                </div>
            </div>

        </div>

        {{-- الحالة الصحية لليتيم --}}
        <div style="width: 100%;">

            <p class="intro"> الحالة الصحية لليتيم</p>

            <div style="width: 100%;margin-top:2px">
                <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell1"> الحالة الصحية لليتيم </p>
                <p style="float: left; width:69%;height:50px; background-color:#DDE4FF;" class="cell"> @if ($report->data->health_status) {{$report->data->health_status}} @else {{$report->data->orphan->health_status}} @endif </p>
            </div>

        </div>

        {{-- الحالة التعليمية لليتيم --}}
        <div style="width: 100%;">

            <p class="intro"> الحالة التعليمية لليتيم</p>

            <div style="width: 100%;margin-top:2px">
                <div style="width: 33%; float: right; overflow: hidden;">
                    <p style="float: right; width:49%;background-color:#F4F4F4;" class="cell1"> المرحلة الدراسية </p>
                    <p style="float: left; width:45%; background-color:#DDE4FF;" class="cell">@if ($report->data->academic_stage) {{$report->data->academic_stage}} @else {{$report->data->orphan->profile->academic_stage}} @endif </p>
                </div>

                <div style="width: 33%;  float: left; ">
                    <p style="float: right; width:21%;background-color:#F4F4F4;" class="cell1"> الصف </p>
                    <p style="float: left; width:72%; background-color:#DDE4FF;" class="cell">@if ($report->data->class) {{$report->data->class}} @else {{$report->data->orphan->profile->class}} @endif </p>
                </div>

                <div style="width: 33%;  float: left; ">
                    <p style="float: right; width:49%;background-color:#F4F4F4;" class="cell1"> المستوى الدراسي </p>
                    <p style="float: left; width:45%; background-color:#DDE4FF;" class="cell"> {{$report->data->academic_level}} </p>
                </div>
            </div>

            <div style="width: 100%;margin-top:5px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:55%;background-color:#F4F4F4;" class="cell1"> التزامات اليتيم بتعاليم الاسلام</p>
                    <p style="float: left; width:40%; background-color:#DDE4FF;" class="cell"> {{$report->data->orphan_obligations_islam}} </p>
                </div>

                <div style="width: 49%;  float: left; ">
                    <p style="float: right; width:55%;background-color:#F4F4F4;" class="cell1"> حفظ اليتيم من القران الكريم </p>
                    <p style="float: left; width:40%; background-color:#DDE4FF;" class="cell"> {{$report->data->save_orphan_quran}} </p>
                </div>
            </div>

        </div>

        {{-- الحالة الاجتماعيىة --}}
        <div style="width: 100%;">

            <p class="intro"> الحالة الاجتماعية </p>

            <div style="width: 100%;margin-top:2px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:49%;background-color:#F4F4F4;" class="cell1"> المسؤول المباشر عن اليتيم</p>
                    <p style="float: left; width:45%; background-color:#DDE4FF;" class="cell"> {{$report->data->orphan->guardian->guardian_name}} </p>
                </div>

                <div style="width: 49%;  float: left; ">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell1"> صلته باليتيم </p>
                    <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> @if ($report->data->guardian_relationship) {{$report->data->guardian_relationship}} @else {{$report->data->orphan->guardian->guardian_relationship}} @endif  </p>
                </div>
            </div>

            <div style="width: 100%; margin-top:5px">
                <p style="float: right; width:30%;background-color:#F4F4F4;text-align:center;" class="cell1">
                    أبرز التغيرات التي طرأت على اليتيم في هذه السنة
                </p>
                <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell">
                     {{$report->data->changes_orphan_year}} -
                     {{$report->data->other_changes_orphan_year}}
                </p>
            </div>


        </div>

        {{-- تعليق الهيئة على أثر الكفالة--}}
        <div style="width: 100%;">

            <p class="intro"> تعليق الهيئة على أثر الكفالة </p>

            <div style="width: 100%; margin-top:2px">
                <p style="width:100%; background-color:#DDE4FF;" class="cell">
                     {{$report->data->authority_comment_guarantee}} -
                     {{$report->data->other_authority_comment_guarantee}}
                 </p>
            </div>


        </div>

        {{-- رسالة اليتيم للكافل--}}
        <div style="width: 100%;">

            <p class="intro"> رسالة اليتيم للكافل </p>

            <div style="width: 100%; margin-top:2px">
                @if($report->data->orphan_message)
                <p style="width:100%; background-color:#DDE4FF;" class="cell"> {{$report->data->orphan_message}} </p>
                @elseif($report->data->orphan_image_message)
                    <img src="{{ public_path('storage/' . $report->data->orphan_image_message) }}" alt="صورة">

                @endif
            </div>


        </div>

        <p style="text-align: left; margin-top:10px">مكتب البرامج العلمية و الأيتام</p>
    </div>

</body>

</html>
