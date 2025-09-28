<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        body {
            direction: rtl;
            margin:0 auto !important;
            padding: 0 !important;
            width: 210mm !important; /* عرض A4 */
            height: 297mm !important; /* ارتفاع A4 */
            box-sizing: border-box !important;
        }

        .container{
            width: 100%;
            height: 100%;
        }

        .value{
            float:left;
            border:1px solid #ddd;
            font-size:17px;
            padding-right: 2px;
            height: 24px;
        }

        .cell{
            text-align: right;
            margin: 0;
            padding:2px 3px 2px 5px;
        }

        .center{
            text-align: center;
        }

        .border{
            border:1px solid #777;
        }

        .border2{
            border : 1px solid #3A8DDE;
        }



        p {
            margin-top: 3px !important;
            line-height: 1.4; /* يقلل التباعد العمودي */
        }

        div {
            margin: 0 !important;
            padding: 0 !important;
        }

        .container > div {
            margin-bottom: 1px; /* لو بدك مسافة صغيرة جداً بين الأقسام */
        }

    </style>

</head>

<body>


    <div class="container">


        <div style="width: 100%;">
            <div style="float: right;width:70%">

                {{-- introduction --}}
                <div style="width: 100%;">

                    <div style="width: 30%;  float: right; overflow: hidden; ">
                        <img src="{{ public_path('image/donor/ber.png') }}" alt="شعار" width="160px" height="170px">
                        <!--<p style="font-size:16px; padding:0px;margin:0px"> الإمارات العربية المتحدة </p>-->
                    </div>

                    <div style="width: 70%;  float: right; text-align:center ; padding-top:55px">
                        <p style="font-size: 27px;color:#4389C8;margin-bottom:6px;padding-bottom:6px;font-weight: bold;">التقريــــر الــــدوري لليتيــــم</p>
                        <p style="font-size: 23px;margin-top:0px;padding-top:0px;font-weight: bold; ">
                            لعـــــــــــــــــــــــــــــــــام :
                            <span style="color: #4389C8 ; background-color:#DDE4FF; " class="border"> {{ date('Y') }} </span>
                        </p>
                    </div>

                </div>

                {{-- معلومات الهيئة المشرفة --}}
                <div style="width: 100% ;">
                    <p style="background-color:#3A8DDE;color:white;margin-bottom:2px ; padding:0px 3px"> معلومات الهيئة المشرفة </p>

                    <div style="width: 100%;margin-top:0px">

                        <div style="width: 100%; overflow: hidden;margin-bottom:2px">
                            <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell center border2"> اسم الهيئة المشرفة </p>
                            <p style="float: left; width:66%; background-color:#DDE4FF;" class="cell border"> جمعية عايش </p>
                        </div>

                        <div style="width: 100%;  float: right; text-align:center;margin-top:1px">
                            <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell center border2"> الدولة </p>
                            <p style="float: left; width:66%; background-color:#DDE4FF;text-align:right;" class="cell border"> مصر </p>
                        </div>

                    </div>
                </div>

                {{-- بيانات الكافل --}}
                <div style="width: 100%;">

                    <p style="background-color:#3A8DDE;color:white;margin-bottom:2px ;padding:0px 3px"> بيانات الكافل </p>


                    <div style="width: 100%; overflow: hidden;margin-bottom:2px">
                        <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell center border2"> اسم الكافل </p>
                        <p style="float: left; width:66%;height:28px;  background-color:#DDE4FF;" class="cell border">
                             {{-- {{$report->fields['sponsor_name']}} --}}
                            </p>
                    </div>

                    <div style="width: 100%;  float: right; text-align:center;margin-top:1px">
                        <p style="float: right; width:30%;background-color:#F4F4F4;" class="cell center border2"> رقم ملف الكافل </p>
                        <p style="float: left; width:66%;height:28px; background-color:#DDE4FF;text-align:right;" class="cell border">
                            {{-- {{$report->fields['sponsor_number']}} </p> --}}
                    </div>

                </div>

            </div>

            {{-- image --}}
            <div style="float: left; width:29%;" class="border">
                <img src="{{ public_path('storage/' . $report->profile_image) }}" alt="صورة" width="100%" height="390px">
            </div>

        </div>

        {{-- بيانات اليتيم --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:1px;padding:0px 3px"> بيانات اليتيم </p>

            <div style="width: 100%;margin-top:1px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:28%;background-color:#F4F4F4;" class="cell center border2"> اسم اليتيم</p>
                    <p style="float: left; width:66%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->name}} --}}
                        </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell center border2"> رقم ملف اليتيم</p>
                    <p style="float: left; width:65%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->internal_code}} --}}
                        </p>
                </div>
            </div>

            <div style="width: 100%;margin-top:1px">
                <div style="width: 33%; float: right; overflow: hidden;">
                    <p style="float: right; width:39%;background-color:#F4F4F4;" class="cell center border2"> جنسية اليتيم </p>
                    <p style="float: left; width:52%;height:28px; background-color:#DDE4FF;" class="cell border"> مصري/ة </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;background-color:#F4F4F4;" class="cell center border2"> الجنس</p>
                    <p style="float: left; width:62%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->gender ?? $report->fields['gender']}} --}}
                         </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;height:28px;background-color:#F4F4F4;" class="cell center border2"> عمر اليتيم</p>
                    <p style="float: left; width:62%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->age ?? $report->fields['age']}} --}}
                         {{-- سنوات --}}
                        </p>
                </div>


            </div>

        </div>

        {{-- الحالة الصحية لليتيم --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:1px ;padding:0px 3px"> الحالة الصحية لليتيم</p>

            <div style="width: 100%;">
                <p style="float: right; width:29%;height:28px;background-color:#F4F4F4;" class="cell center border2"> الحالة الصحية لليتيم </p>
                <p style="float: left; width:67%;height:28px; background-color:#DDE4FF;" class="cell border">
                    {{-- {{$report->orphan->health_status ?? $report->fields['health_status']}} --}}
                 </p>
            </div>

            <div style="width: 100%;">
                <!--<p style="float: right; width:29%;height:30px;background-color:#F4F4F4;" class="cell center border2">  تفاصيل المرض  </p>-->

                <p style="float: left; width:98.5%;height:28px; background-color:#DDE4FF;" class="cell border">
                {{-- {{ $report->orphan->disease_description
                    ?? $report->orphan->disability_type
                    ?? $report->fields['disease_description'] ?? '' }} --}}
                     </p>
            </div>

        </div>

        {{-- الحالة التعليمية لليتيم --}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:1px;padding:0px 3px"> الحالة التعليمية لليتيم</p>

            <?php
                $academic_stage = collect([
                    optional($report->orphan->profile)->academic_stage,
                    optional($report->orphan->profile)->academic_stage_details,
                    optional($report->orphan->profile)->academic_secondary_details,
                ])->filter()->implode(' / ');
            ?>

            <div style="width: 100%;margin-top:1px">
                <div style="width: 33%; float: right; overflow: hidden;">
                    <p style="float: right; width:47%;background-color:#F4F4F4;" class="cell center border2"> المرحلة الدراسية </p>
                    <p style="float: left; width:44%;height:28px; background-color:#DDE4FF;" class="cell border">
                        {{-- {{$report->orphan->profile->academic_stage ?: $report->fields['academic_stage']}} --}}
                    </p>
                </div>



                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:47%;background-color:#F4F4F4;" class="cell center border2"> المستوى الدراسي </p>
                    <p style="float: left; width:44%;height:28px; background-color:#DDE4FF;" class="cell border">
                        {{-- {{$report->fields['academic_level']}}  --}}
                    </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:21%;background-color:#F4F4F4;" class="cell center border2"> الصف </p>
                    <p style="float: left; width:70%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->profile->class ?? $report->fields['class']}} --}}
                        </p>
                </div>
            </div>

            <div style="width: 100%;margin-top:3px">

                <div style="width: 100%;height:28px; float:right; overflow: hidden; background-color:#DDE4FF;" class="cell border">
                     {{-- {{$report->fields['academic_stage_detailes']}} --}}
                </div>
            </div>

            <div style="width: 100%;margin-top:3px">
                <div style="width: 49%; float:right; overflow: hidden;">
                    <p style="float: right; width:55%;background-color:#F4F4F4;" class="cell center border2"> التزم اليتيم بتعاليم الاسلام</p>
                    <p style="float: left; width:39%;height:28px; background-color:#DDE4FF;" class="cell border">
                        {{-- {{$report->fields['orphan_obligations_islam']}} --}}
                    </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:55%;background-color:#F4F4F4;" class="cell center border2"> حفظ اليتيم من القرآن الكريم </p>
                    <p style="float: left; width:39%;height:28px; background-color:#DDE4FF;" class="cell border">
                        {{-- {{$report->fields['save_orphan_quran']}} جزء --}}
                    </p>
                </div>
            </div>

        </div>

        {{-- الحالة الاجتماعيىة --}}
        <div style="width: 100%; ">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:1px ; padding:0px 3px"> الحالة الاجتماعية </p>

            <div style="width: 100%;margin-top:1px">
                <div style="width: 65%; float:right; overflow: hidden;">
                    <p style="float: right; width:48%;background-color:#F4F4F4;" class="cell center border2"> المسؤول المباشر عن اليتيم</p>
                    <p style="float: left; width:47%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']}} --}}
                        </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:35%;background-color:#F4F4F4;" class="cell center border2"> صلته باليتيم </p>
                    <p style="float: left; width:55%;height:28px; background-color:#DDE4FF;" class="cell border">
                         {{-- {{$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']}} --}}
                         </p>
                </div>
            </div>

            <div style="width: 100%; margin-top:3px">
                <p style="float: right; width:30%;height:45px;background-color:#F4F4F4;" class="cell center border2">
                    أبرز التغيرات التي طرأت على اليتيم في هذه السنة
                </p>
                <p style="float: left; width:67%; height:55px; background-color:#DDE4FF;" class="cell border">
                     {{-- {{$report->fields['changes_orphan_year']}} --}}
                    </p>
            </div>


        </div>

        {{-- تعليق الهيئة على أثر الكفالة--}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px; padding:0px 3px" class="border2"> تعليق الهيئة على أثر الكفالة </p>

            <div style="width: 100%; margin-top:2px">
                <p style="width:100%;height:31px; background-color:#DDE4FF;" class="cell border">
                     {{-- {{$report->fields['authority_comment_guarantee']}} --}}
                    </p>
            </div>


        </div>

        {{-- رسالة اليتيم للكافل--}}
        <div style="width: 100%;">

            <p style="background-color:#3A8DDE;color:white;margin-bottom:2px ; padding:0px 3px"> رسالة اليتيم للكافل </p>

            <div style="width: 100%; margin-top:2px">
                <p style="width:100%;height:31px; background-color:#DDE4FF;" class="cell">
                     {{-- {{$report->fields['orphan_message']}} --}}
                    </p>
            </div>


        </div>

        <p style="text-align: left; margin-top:10px"> مكتب البرامج العلميه والايتام </p>
    </div>

</body>

</html>
