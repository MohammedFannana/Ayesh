<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        body {
            font-family: 'Tajawal';
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
            height: 40px;
        }

        .cell{
            text-align: center;
            margin: 0;
            /* padding: 5px; */
            padding:5px 0 5px 5px;
        }

        .border{
            border:1px solid #ddd;
        }


    </style>

</head>

<body>


    <div class="container">


        <div style="width: 100%;">
            <div style="float: right;width:79%">

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
                    <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> معلومات الهيئة المشرفة </p>

                    <div style="width: 100%;margin-top:0px">

                        <div style="width: 100%; overflow: hidden;">
                            <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell"> اسم الجهة المشرفة </p>
                            <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->fields['supervising_authority']}} </p>
                        </div>

                        <div style="width: 100%;  float: right; text-align:center;margin-top:2px">
                            <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell"> الدولة </p>
                            <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->fields['supervising_authority_country']}} </p>
                        </div>

                    </div>
                </div>

            </div>

            {{-- image --}}
            <div style="float: left; width:20%;">
                <img src="{{ public_path('storage/' . $report->orphan->image->orphan_image_4_6) }}" alt="صورة" height="1500px">
            </div>

        </div>

        {{-- بيانات الكافل --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> بيانات الكافل </p>


            <div style="width: 100%; overflow: hidden;">
                <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell"> اسم الكافل </p>
                <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->fields['sponsor_name']}} </p>
            </div>

            <div style="width: 100%;  float: right; text-align:center;margin-top:2px">
                <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell"> رقم ملف الكافل </p>
                <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->fields['sponsor_number']}} </p>
            </div>

        </div>

        {{-- بيانات اليتيم --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> بيانات اليتيم </p>

            <div style="width: 100%;margin-top:2px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell"> اسم اليتيم</p>
                    <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->name}} </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell"> رقم ملف اليتيم</p>
                    <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->internal_code}} </p>
                </div>
            </div>

            <div style="width: 100%;margin-top:5px">
                <div style="width: 33%; float: right; overflow: hidden;">
                    <p style="float: right; width:39%;background-color:#F4F4F4;" class="cell"> جنسية اليتيم </p>
                    <p style="float: left; width:55%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->getFieldValueByDatabaseName('nationality')}} </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell"> عمر اليتيم</p>
                    <p style="float: left; width:65%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->age}} </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell"> الجنس</p>
                    <p style="float: left; width:65%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->gender}} </p>
                </div>
            </div>

        </div>

        {{-- الحالة الصحية لليتيم --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> الحالة الصحية لليتيم</p>

            <div style="width: 100%;margin-top:2px">
                <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell"> الحالة الصحية لليتيم </p>
                <p style="float: left; width:67%;height:50px; background-color:#DDE4FF;" class="cell"> {{$report->orphan->health_status}} </p>
            </div>

        </div>

        {{-- الحالة التعليمية لليتيم --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> الحالة التعليمية لليتيم</p>

            <div style="width: 100%;margin-top:2px">
                <div style="width: 33%; float: right; overflow: hidden;">
                    <p style="float: right; width:49%;background-color:#F4F4F4;" class="cell"> المرحلة الدراسية </p>
                    <p style="float: left; width:45%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->profile->academic_stage}} </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:21%;background-color:#F4F4F4;" class="cell"> الصف </p>
                    <p style="float: left; width:74%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->profile->class}} </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:49%;background-color:#F4F4F4;" class="cell"> المستوى الدراسي </p>
                    <p style="float: left; width:45%; background-color:#DDE4FF;" class="cell"> {{$report->fields['academic_level']}} </p>
                </div>
            </div>

            <div style="width: 100%;margin-top:5px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:55%;background-color:#F4F4F4;" class="cell"> التزامات اليتيم بتعاليم الاسلام</p>
                    <p style="float: left; width:40%; background-color:#DDE4FF;" class="cell"> {{$report->fields['orphan_obligations_islam']}} </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:55%;background-color:#F4F4F4;" class="cell"> حفظ اليتيم من القران الكريم </p>
                    <p style="float: left; width:40%; background-color:#DDE4FF;" class="cell"> {{$report->fields['save_orphan_quran']}} </p>
                </div>
            </div>

        </div>

        {{-- الحالة الاجتماعيىة --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> الحالة الاجتماعية </p>

            <div style="width: 100%;margin-top:2px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:49%;background-color:#F4F4F4;" class="cell"> المسؤول المباشر عن اليتيم</p>
                    <p style="float: left; width:45%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->guardian->guardian_name}} </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell"> صلته باليتيم </p>
                    <p style="float: left; width:67%; background-color:#DDE4FF;" class="cell"> {{$report->orphan->guardian->guardian_relationship}} </p>
                </div>
            </div>

            <div style="width: 100%; margin-top:5px">
                <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell">
                    أبرز التغيرات التي طرأت على اليتيم في هذه السنة
                </p>
                <p style="float: left; width:65%; background-color:#DDE4FF;" class="cell"> {{$report->fields['changes_orphan_year']}} </p>
            </div>


        </div>

        {{-- تعليق الهيئة على أثر الكفالة--}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> تعليق الهيئة على أثر الكفالة </p>

            <div style="width: 100%; margin-top:2px">
                <p style="width:100%; background-color:#DDE4FF;" class="cell"> {{$report->fields['authority_comment_guarantee']}} </p>
            </div>


        </div>

        {{-- رسالة اليتيم للكافل--}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px"> رسالة اليتيم للكافل </p>

            <div style="width: 100%; margin-top:2px">
                <p style="width:100%; background-color:#DDE4FF;" class="cell"> {{$report->fields['orphan_message']}} </p>
            </div>


        </div>

        <p style="text-align: left; margin-top:50px">مكتب البرامج العلمية و الأيتام</p>
    </div>

</body>

</html>
