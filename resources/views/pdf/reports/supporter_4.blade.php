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

        .image{
            width:50%; height:300px; margin:auto; text-align:center; padding:5px
        }


    </style>

</head>

<body>


    <div class="container">


        <div style="height: 297mm;background-color:#c9ede4;padding-top:80px">

            <div style="margin:auto;  text-align: center; font-size:18px; margin-bottom:200px">
                <img src="{{public_path('image/report/dubai.png')}}" alt="" width="360px" height="240px">

                <p style="background-color: #6DB6B44D ;margin:auto; width:360px; text-align:center"> الفاضل\ {{$report->orphan->name}} </p>
            </div>

            {{-- header --}}
            <div style="text-align: center; font-size:22px ;margin:auto; width:270px">

                إدارة الأيتام <br>
                تقرير حالة يتيم خارج الدولة <br>
                <span style="background-color: #6DB6B44D "> لعام {{ date('Y') }} </span> <br>
                يدوم الخيـــــر

            </div>

            <hr style="color:#2BB5CF; margin-top:130px">

            {{-- footer --}}
            <p style="text-align: center">
                دبي, الإمارات العربية المتحدة Dubai, United Arab Emirates
                <img src="{{public_path('image/report/Location.png')}}" alt="">
            </p>


            {{-- footer --}}
            <table style="width: 85%; margin-bottom: 15px;">
                <tr>

                    <td style="text-align: center;float:left;width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right'; font-size:25px">
                                    446088
                                </td>
                                <td style="width: 30px; text-align: left;">
                                    <img src="{{ public_path('image/report/mail.png') }}" alt="" width="30px" height="30px">
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="text-align: center; width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right; font-size:25px">
                                    {{ $report->supporter->fax }}
                                </td>
                                <td style="width: 30px; text-align: left;">
                                    <img src="{{ public_path('image/report/Vector (3).png') }}" alt="" width="30px" height="30px">
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="text-align: center; width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right; font-size:25px">
                                    {{ $report->supporter->phone }}
                                </td>
                                <td style="width: 30px; text-align: left;">
                                    <img src="{{ public_path('image/report/Call.png') }}" alt="" width="30px" height="30px">
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="text-align: center; float:right; width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right;font-size:25px">
                                    {{ $report->supporter->phone }}
                                </td>
                                <td style="width: 80px; text-align: left;">
                                    <img src="{{ public_path('image/report/Call.png') }}" alt="" width="30px">
                                    <img src="{{ public_path('image/report/whatapp.png') }}" alt="" width="35px">
                                </td>
                            </tr>
                        </table>
                    </td>


                </tr>
            </table>


            {{-- footer --}}
            <table style="width: 85%; margin-bottom: 15px;">
                <tr>


                    <td style="text-align: center; float:right; width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right;font-size:20px">
                                    {{ $report->supporter->phone }}
                                </td>
                                <td style="width: 150; text-align: left;">
                                    <img src="{{ public_path('image/report/group.png') }}" alt="" width="120px">
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="text-align: center;float:left;width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right'; font-size:20px">
                                    www.dubaicharity.org
                                </td>
                                <td style="width: 30px; text-align: left;">
                                    <img src="{{ public_path('image/report/Vector (4).png') }}" alt="" width="30px" height="30px">
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="text-align: center; width:50%">
                        <table>
                            <tr>
                                <td style="text-align: right; font-size:20px">
                                    info@dubaicharity.ae
                                </td>
                                <td style="width: 30px; text-align: left;">
                                    <img src="{{ public_path('image/report/Message.png') }}" alt="" width="30px" height="30px">
                                </td>
                            </tr>
                        </table>
                    </td>


                </tr>
            </table>



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

        {{-- بيانات اليتيم --}}
        <div class="border" style="margin-bottom: 5px; padding:2px">

            <div style="width: 100%;margin-top:15px">
                <div style="width:49%; float: right; overflow: hidden;">
                    <p style="float: right; width:29%;" class="cell"> رقم اليتيم </p>
                    <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->internal_code}} </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;" class="cell"> تاريخ التقرير </p>
                    <p style="float: left; width:67%;" class="cell border"> {{$report->fields['report_date']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">
                <div style="width:49%; float: right; overflow: hidden;">
                    <p style="float: right; width:29%;" class="cell"> اسم اليتيم </p>
                    <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->name}} </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:29%;" class="cell"> الجنسية </p>
                    <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->getFieldValueByDatabaseName('nationality')}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">
                <div style="width:33%; float: right; overflow: hidden;">
                    <p style="float: right; width:44%;" class="cell"> تاريخ الميلاد </p>
                    <p style="float: left; width:50%;" class="cell border"> {{$report->orphan->birth_date}} </p>
                </div>


                <div style="width: 33%;  text-align:center; float: right;">
                    <p style="float: right; width:44%;" class="cell"> مكان الميلاد </p>
                    <p style="float: left; width:50%;" class="cell border"> {{$report->orphan->birth_place}} </p>
                </div>

                <div style="width: 33%;  float: left; text-align:center;">
                    <p style="float: right; width:28%;" class="cell"> الجنس </p>
                    <p style="float: left; width:65%;" class="cell border"> {{$report->orphan->gender}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">

                <p style="float: right; width:27%;" class="cell"> اسم المسؤول عن اليتيم </p>
                <p style="float: left; width:69%;" class="cell border"> {{$report->orphan->guardian->guardian_name}} </p>

            </div>


            <div style="width: 100%;margin-top:15px">
                <div style="width:49%; float: right; overflow: hidden;">
                    <p style="float: right; width:29%;" class="cell"> اسم  الأم</p>
                    <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->profile->mother_name}} </p>
                </div>

                <div style="width: 49%;  float: left; text-align:center;">
                    <p style="float: right; width:34%;" class="cell"> تاريخ وفاة الأب </p>
                    <p style="float: left; width:60%;" class="cell border"> {{$report->orphan->profile->father_death_date}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-top:15px">

                <p style="float: right; width:25%;" class="cell"> الحالة الصحية</p>
                <p style="float: left; width:71%;" class="cell border"> {{$report->orphan->health_status}} </p>

            </div>

            <div style="width: 100%;margin-top:15px">

                <p style="float: right; width:27%;" class="cell"> ملاحظة على الحالة الصحية</p>
                <p style="float: left; width:69%;" class="cell border"> {{$report->fields['health_notes']}} </p>

            </div>

            <div style="width: 100%;margin-top:15px">

                <p style="float: right; width:25%;" class="cell"> المرحلة الدراسية </p>
                <p style="float: left; width:71%;" class="cell border"> {{$report->orphan->profile->academic_stage}} </p>

            </div>

        </div>

        {{-- ملاحظة ادارة الأيتام  --}}
        <div class="border" style="padding: 10px">

            <p style="margin-bottom: 5px; font-size:18px"> ملاحظة ادارة الأيتام </p>

            <p style="width: 100%;margin-top:15px; height:30px"  class="border">

                {{$report->fields['orphan_management_notes']}}

            </p>

        </div>

        <p style="margin-bottom: 15px; font-size:20px"> عنوان الجهة المشرفة </p>

        <p style="width: 100%;margin-top:15px; margin-bottom:10px"  class="cell border">

            {{$report->fields['address_supervising_authority']}}

        </p>

        {{-- ختم اللجنة المشرفة الالكتروني  and اعتماد جمعية دبي الخيرية  --}}
        <div  style="width: 100%;">

            <div style="width: 49%;float: right">
                <p style="" class="cell"> ختم اللجنة المشرفة الالكتروني </p>
                <p style="" class="cell">
                    <img src="{{ public_path('storage/' . $report->supporter_seal) }}" alt="صورة"  width="340px" height="200px">
                </p>
            </div>

            <div style="width: 49%;float:left">
                <p style="" class="cell"> اعتماد جمعية دبي الخيرية  </p>

                <p style="" class="cell">
                    <img src="{{ public_path('storage/' . $report->supporter_accreditation) }}" alt="صورة" width="340px" height="200px">
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
        <div class="border" style="margin-bottom: 5px">
            <p>صورة اليتيم </p>

            <div class="image">

                <img src="{{ public_path('storage/' . $report->orphan->image->orphan_image_4_6) }}" alt="صورة"  height="100%" width="100%" >

            </div>

        </div>

        {{-- صورة جماعية --}}
        <div class="border">
            <p> صورة جماعية  </p>

            <div class="image">

                <img src="{{ public_path('storage/' .$report->group_photo) }}" alt="صورة"  height="100%" width="100%" >
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
        <div class="border" style="margin-bottom: 5px">
            <p>رسالة اليتيم الى الكافل  </p>

            <div class="image">

                <img src="{{ public_path('storage/' . $report->thanks_letter) }}" alt="صورة"   height="80%" width="100%">

            </div>
        </div>


        {{-- شهادة اليتيم الدراسية --}}
        <div class="border">
            <p> شهادة اليتيم الدراسية </p>

            <div class="image">

                <img src="{{ public_path('storage/' .$report->academic_certificate) }}" alt="صورة"   height="80%" width="100%">

            </div>
        </div>

        {{-- footer --}}
        <div style="background-color: #221D50 ;margin-top:10px">

            <p style="text-align: center; color:white">
                دبي, الإمارات العربية المتحدة Dubai, United Arab Emirates
                <img src="{{public_path('image/report/Location.png')}}" alt="">
            </p>


            <div style="width: 100%;">

                {{-- data --}}
                <div style="float: left; width:80%; overflow:hidden">

                    <table style="width: 85%; margin-bottom: 10px;">
                        <tr>

                            <td style="text-align: center;float:left;width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right'; font-size:25px;color:white">
                                            446088
                                        </td>
                                        <td style="width: 30px; text-align: left;">
                                            <img src="{{ public_path('image/report/mail.png') }}" alt="" width="30px" height="30px">
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td style="text-align: center; width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right; font-size:25px;color:white">
                                            {{ $report->supporter->fax }}
                                        </td>
                                        <td style="width: 30px; text-align: left;">
                                            <img src="{{ public_path('image/report/Vector (3).png') }}" alt="" width="30px" height="30px">
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td style="text-align: center; width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right; font-size:25px;color:white">
                                            {{ $report->supporter->phone }}
                                        </td>
                                        <td style="width: 30px; text-align: left;">
                                            <img src="{{ public_path('image/report/Call.png') }}" alt="" width="30px" height="30px">
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td style="text-align: center; float:right; width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right;font-size:25px;color:white">
                                            {{ $report->supporter->phone }}
                                        </td>
                                        <td style="width: 80px; text-align: left;">
                                            <img src="{{ public_path('image/report/Call.png') }}" alt="" width="30px">
                                            <img src="{{ public_path('image/report/whatapp.png') }}" alt="" width="35px">
                                        </td>
                                    </tr>
                                </table>
                            </td>


                        </tr>
                    </table>


                    <table style="width: 85%; margin-bottom: 10px;">
                        <tr>


                            <td style="text-align: center; float:right; width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right;font-size:20px;color:white">
                                            {{ $report->supporter->phone }}
                                        </td>
                                        <td style="width: 150; text-align: left;">
                                            <img src="{{ public_path('image/report/group.png') }}" alt="" width="120px">
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td style="text-align: center;float:left;width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right'; font-size:20px;color:white">
                                            www.dubaicharity.org
                                        </td>
                                        <td style="width: 30px; text-align: left;">
                                            <img src="{{ public_path('image/report/Vector (4).png') }}" alt="" width="30px" height="30px">
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td style="text-align: center; width:50%">
                                <table>
                                    <tr>
                                        <td style="text-align: right; font-size:20px;color:white">
                                            info@dubaicharity.ae
                                        </td>
                                        <td style="width: 30px; text-align: left;">
                                            <img src="{{ public_path('image/report/Message.png') }}" alt="" width="30px" height="30px">
                                        </td>
                                    </tr>
                                </table>
                            </td>


                        </tr>
                    </table>

                </div>

                {{-- logo --}}
                <div style="float: right;width:14%; height:80px; text-align:center;">
                    <img src="{{public_path('image/report/footer-logo.png')}}" alt="" style="float: right" width="90%" height="50%">

                </div>

            </div>


        </div>

    </div>

</body>

</html>
