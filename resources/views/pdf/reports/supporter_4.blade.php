<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جمعية دبي الخيرية </title>

    <style>
        body {
            direction: rtl;
            margin: 0 !important;
            margin-top: 2px !important;
            padding: 0 !important;
            /*box-sizing: border-box !important;*/
        }

        @page {
            margin: 0px;
        }



        .cell{
            text-align: center;
            margin: 0;
            color:#333;
            padding:4px 0px 4px 5px;
            font-size:18px;
        }

        .cell1{
            text-align: right;
            margin: 0;
            color:#7f879c;
            padding:4px 2x 4px 5px;

        }


        .border1{
            border:2px solid #555;
            background-color: #dee6fe;
        }

        .border{
            border:2px solid black;
        }

        .image{
            width:50%;
            height:300px;
            margin:auto;
            text-align:center;
            padding:5px;
        }




    </style>

</head>

<body>




     <div>

            <div>
                <img src="{{public_path('image/report/cover.png')}}" alt="" width="100%">
                <h3 style="margin:auto; padding-top:-50px; text-align:center"> {{$report->orphan->name}} </h3>
            </div>


            <div>
                <img src="{{public_path('image/report/cover1.png')}}" alt="" width="100%">
                <p style="padding-top:-280px ; padding-right:45%;font-weight:bold">  {{ date('Y') }} </p>
            </div>






        </div>




    <div style="page-break-after: always;"></div>

    <div style="margin:40px; padding-top:40px">

        {{-- header --}}
        <div style="font-size:18px; margin-bottom:15px">
            <div  style="float: right ;width:290px">
                <img src="{{public_path('image/report/logo1.png')}}" alt="" width="100%"  height="85px">
            </div>

            <div style="float: left ;text-align:center; width:25%">

                <img src="{{public_path('image/report/logo2.png')}}" alt="" width="100%"  height="55px">
                <p style="background-color: #9DCDCB ; margin:0px ">
                    لعام {{ date('Y') }}
                </p>

            </div>

        </div>

        {{-- بيانات اليتيم --}}
        <div class="border" style="margin-bottom: 5px; padding:2px">

            <div style="width: 100%;margin-top:15px">
                <div style="width:49%;hight float: right; overflow: hidden;">
                    <p style="float: right; width:29%;" class="cell"> رقم اليتيم: </p>
                    <p style="float: left; width:66%;height:31px;" class="cell1 border1">
                         {{-- {{$report->orphan->internal_code}} --}}
                        </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;" class="cell"> تاريخ التقرير: </p>
                    <p style="float: left; width:66%;height:31px;" class="cell1 border1">
                         {{-- {{$report->fields['report_date']}} --}}
                         </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">
                <div style="width:60%; float: right; overflow: hidden;">
                    <p style="float: right; width:24%;" class="cell"> اسم اليتيم: </p>
                    <p style="float: left; width:72%; height:31px;" class="cell1 border1">
                        {{-- {{$report->orphan->name}} --}}
                    </p>
                </div>

                <div style="width: 38%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;" class="cell"> الجنسية: </p>
                    <p style="float: left; width:65%; height:31px;" class="cell1 border1"> مصري/ة </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">
                <div style="width:33%; float: right; overflow: hidden;">
                    <p style="float: right; width:43%;" class="cell"> تاريخ الميلاد: </p>
                    <p style="float: left; width:50%; height:31px;" class="cell1 border1">
                          {{-- {{$report->orphan->birth_date ?? $report->fields['birth_date']}} --}}
                         </p>
                </div>


                <div style="width: 41%;  text-align:center; float: right;">
                    <p style="float: right; width:35%;" class="cell"> مكان الميلاد: </p>
                    <p style="float: left; width:58%;height:31px;" class="cell1 border1">
                     {{-- {{
                        ($report->orphan->profile->governorate ?? $report->fields['governorate'])
                        . '/' .
                        ($report->orphan->profile->center ?? $report->fields['center'])
                        }} --}}
                     </p>
                </div>

                <div style="width: 25%;  float: left; text-align:center;">
                    <p style="float: right; width:28%;" class="cell"> الجنس: </p>
                    <p style="float: left; width:58%;height:31px;" class="cell1 border1">
                         {{-- {{$report->orphan->gender ?? $report->fields['gender']}} --}}
                        </p>
                </div>

            </div>

            <div style="width: 74%;margin-top:15px">

                <p style="float: right; width:40%;" class="cell"> اسم المسؤول عن اليتيم: </p>
                <p style="float: left; width:55%;height:31px;" class="cell1 border1">
                     {{-- {{$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']}} --}}
                    </p>

            </div>

            <div style="width:45%;margin-top:15px">

                <p style="float: right; width:37%;" class="cell"> صلة القرابة: </p>
                <p style="float: left; width:57%;height:31px;" class="cell1 border1">
                     {{-- {{$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']}} --}}
                    </p>

            </div>


            <div style="width: 100%;margin-top:15px">
                <div style="width:55%; float: right; overflow: hidden;">
                    <p style="float: right; width:25%;" class="cell"> اسم  الأم: </p>
                    <p style="float: left; width:67%;height:31px;" class="cell1 border1">
                         {{-- {{$report->orphan->profile->mother_name ?? $report->fields['mother_name']}} --}}
                         </p>
                </div>

                <div style="width: 43%;  float: left; text-align:center;">
                    <p style="float: right; width:40%;" class="cell"> تاريخ وفاة الأب: </p>
                    <p style="float: left; width:54%;height:31px;" class="cell1 border1">
                        {{-- {{$report->orphan->profile->father_death_date ?? $report->fields['father_death_date']}} --}}
                     </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">

                <p style="float: right; width:15%;font-weight:bold;" class="cell"> الحالة الصحية: </p>
                <p style="float: left; width:80%;height:31px;" class="cell1 border1">
                     {{-- {{$report->orphan->health_status ?? $report->fields['health_status']}} --}}
                    </p>

            </div>

            <div style="width: 100%;margin-top:15px">

                <p style="float: right; width:33%;" class="cell"> ملاحظة على الحالة الصحية: </p>
                <p style="float: left; width:62%;height:31px;" class="cell1 border1">
                     {{-- {{$report->fields['health_notes']}} --}}
                     </p>

            </div>

            <div style="width: 100%;margin-top:15px; margin-bottom:22px">

                <p style="float: right; width:17%;" class="cell"> المرحلة الدراسية: </p>
                <p style="float: left; width:78%;height:31px;" class="cell1 border1">
                     {{-- {{$report->orphan->profile->academic_stage ?? $report->fields['academic_stage']}} --}}
                    </p>

            </div>

        </div>


        <div>
            <p style="margin-bottom: 15px; font-size:20px; margin:8px 30px 8px 2px;color:#333; font-size:18px"> ملاحظة إدارة الأيتام </p>

            <p style="width: 100%;height:31px; margin-top:15px; margin-bottom:10px; margin:0px;height:120px"  class="cell1 border1">
                {{-- {{$report->fields['orphan_management_notes']}} --}}
            </p>
        </div>


        <div>
            <p style="margin-bottom: 15px; font-size:20px; margin:8px 30px 8px 2px;color:#333; font-size:18px"> عنوان اللجنة المشرفة </p>

            <p style="width: 100%;height:31px; margin-top:15px; margin-bottom:10px; margin:0px;height:30px"  class="cell1 border1">

                {{-- {{$report->fields['address_supervising_authority']}} --}}

            </p>
        </div>

        {{-- ختم اللجنة المشرفة الالكتروني  and اعتماد جمعية دبي الخيرية  --}}
        <div  style="width: 100%;">

            <div style="width: 40%;float: right">
                <p style="" class="cell"> ختم اللجنة المشرفة الالكتروني </p>
                <p style="border:2px solid #555;width="250px"" class="cell">
                    <img src="{{ public_path('storage/' . $report->supporter_seal) }}" alt="صورة"  width="250px" height="150px">
                </p>
            </div>

            <div style="width: 40%;float:left">
                <p style="" class="cell"> اعتماد جمعية دبي الخيرية  </p>

                <p style="border:2px solid #555; width="250px"" class="cell">
                    <img src="{{ public_path('storage/' . $report->supporter_accreditation) }}" alt="صورة" width="250px" height="150px">
                </p>
            </div>

        </div>


        <div style="page-break-after: always;"></div>

        {{-- header --}}
        <div style="font-size:18px; margin-bottom:15px">
            <div  style="float: right ;width:290px">
                <img src="{{public_path('image/report/dubai-logo.png')}}" alt="" width="100%"  height="85px">
            </div>

            <div style="float: left ;text-align:center; width:25%">
                <span style="font-size: 22px"> إدارة الأيتام </span> <br>
                التقرير عن حالة اليتيم <br>

                <span style="background-color: #6DB6B44D ; ">
                    لعام {{ date('Y') }}
                </span>

            </div>

        </div>

        {{-- صورة اليتيم --}}
        <div class="border" style="margin-bottom:30px">
            <p style="border:1px solid #6DB6B44D ; padding:5px 35px 5px 5px; margin:5px; width:120px; background-color:#3e2d7b;color:white;"> صور اليتيم </p>

            <div class="image" style="border:1px solid #777 ; padding:20px 140px 30px; margin-bottom:20px;  border-radius: 5px ;height:285px">

                <img src="{{ public_path('storage/' . $report->orphan->image->orphan_image_4_6) }}" alt="صورة"  height="285px"  width="320px" >

            </div>

        </div>

        {{-- صورة جماعية --}}
        <div class="border">
            <p style="border:1px solid #6DB6B44D ; padding:5px 35px 5px 5px; margin:5px; width:120px; background-color:#3e2d7b;color:white;"> صورة جماعية  </p>

             <div class="image" style="border:1px solid #777 ; padding:20px 140px; margin-bottom:20px;  border-radius: 5px ;height:285px">

                <img src="{{ public_path('storage/' .$report->group_photo) }}" alt="صورة"   width="320px" height="285px" >
            </div>
        </div>

        <div style="page-break-after: always;"></div>

        {{-- header --}}
        <div style="font-size:18px; margin-bottom:15px">
            <div  style="float: right ;width:290px">
                <img src="{{public_path('image/report/dubai-logo.png')}}" alt="" width="100%"  height="85px">
            </div>

            <div style="float: left ;text-align:center; width:25%">
                <span style="font-size: 22px"> إدارة الأيتام </span> <br>
                التقرير عن حالة اليتيم <br>

                <span style="background-color: #6DB6B44D ; ">
                    لعام {{ date('Y') }}
                </span>

            </div>

        </div>

        {{-- رسالة اليتيم الى الكافل --}}
        <div class="border" style="margin-bottom: 5px" >
            <p style="border:1px solid #6DB6B44D ; padding:5px 35px 5px 5px; margin:5px; width:150px; background-color:#3e2d7b;color:white;"> رسالة اليتيم الى الكافل  </p>

            <div class="image" style="border:1px solid #777 ; padding:20px 140px 30px; margin-bottom:10px;  border-radius: 5px ;height:280px">

                <img src="{{ public_path('storage/' . $report->thanks_letter) }}" alt="صورة" height="280px" width:"320px">

            </div>
        </div>


        {{-- شهادة اليتيم الدراسية --}}
        <div class="border">
             <p style="border:1px solid #6DB6B44D ; padding:5px 35px 5px 5px; margin:5px; width:150px; background-color:#3e2d7b;color:white;"> شهادة اليتيم الدراسية </p>

            <div class="image" style="border:1px solid #777 ; padding:20px 140px 30px; margin-bottom:10px;  border-radius: 5px ;height:280px">

                <img src="{{ public_path('storage/' .$report->academic_certificate) }}" alt="صورة" width:"320px" height="280px">

            </div>
        </div>

    </div>

    {{-- footer --}}
    <div style="margin-top:20px">

        <img src="{{ public_path('image/report/footer.png') }}" width="100%" height="150px">

    </div>



</body>

</html>
