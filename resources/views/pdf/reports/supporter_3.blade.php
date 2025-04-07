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

        <table style="width: 100%; margin-bottom: 10px;">
            <tr >
                <td style="font-size: 17px; font-weight: 600; width:130px;">
                    <img src="{{ public_path('image/donor/dar_ber.png') }}" alt="شعار" width="132px" height="87px"> <br>

                </td>

                <td style="width:120px; height:70px; background-color: #BA3A37; text-align:center; vertical-align: middle;">
                    <div style="color:white; font-size:20px;">
                        التقرير الدوري لليتيم
                        <br>
                        لعام {{ date('Y') }}
                    </div>
                </td>


                <td style="width: 103px; text-align: left;">
                    <img src="{{ public_path('storage/' . $report->orphan->image->orphan_image_4_6) }}" alt="صورة" width="103px" height="116px">
                </td>
            </tr>
        </table>


        <div style="width: 100%; margin-top:25px">

            <p style="float: right; width:20%;" class="cell"> الجهة المشرفة </p>
            <p style="float: left; width:77%;" class="cell border"> {{$report->fields['supervising_authority']}} </p>

        </div>

        {{-- الدولة  and عنوان الجهة المشرفة--}}
        <div style="width: 100%;margin-top:15px">
            <div style="width: 49%; float:right; overflow: hidden;">
                <p style="float: right; width:20%;" class="cell"> الدولة </p>
                <p style="float: left; width:75%;" class="cell border"> {{$report->fields['country']}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:39%;" class="cell"> عنوان الجهة المشرفة </p>
                <p style="float: left; width:55%;" class="cell border"> {{$report->fields['supervising_authority_place']}} </p>
            </div>
        </div>

        {{-- اسم الكافل and رقم الكافل --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> اسم الكافل </p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->fields['sponsor_name']}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:29%;" class="cell"> رقم الكافل</p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->fields['sponsor_number']}} </p>
            </div>

        </div>

        {{--  اسم اليتيم and رقم اليتيم --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> اسم اليتيم</p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->name}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:29%;" class="cell"> رقم اليتيم</p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->internal_code}} </p>
            </div>

        </div>

        {{--  تاريخ الميلاد اليتيم and الجنس --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> الجنس </p>
                <p style="float: left; width:60%;" class="cell border"> {{$report->orphan->gender}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:34%;" class="cell"> تاريخ ميلاد اليتيم </p>
                <p style="float: left; width:60%;" class="cell border"> {{$report->orphan->birth_date}} </p>
            </div>

        </div>

        {{--  رقم التيلفون and العنوان --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> العنوان </p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->profile->full_address}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:29%;" class="cell"> رقم التيلفون </p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->profile->phone}} </p>
            </div>

        </div>

        {{--  تاريخ الميلاد اليتيم and العنوان --}}
        <div style="width: 100%;margin-top:15px">

            <p style="float: right; width:15%;" class="cell"> حالة اليتيم </p>
            <p style="float: left; width:82%;" class="cell border"> {{$report->orphan->case_type}} </p>

        </div>

        <p style="font-size: 22px"> حالة اليتيم </p>

        {{--  اسم الأم and الحالة الصحية --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> الحالة الصحية </p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->health_status}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:29%;" class="cell"> اسم الأم </p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->profile->mother_name}} </p>
            </div>

        </div>

        {{--  صلة القرابة and اسم المسؤول عن اليتيم--}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:44%;" class="cell"> اسم المسؤول عن اليتيم </p>
                <p style="float: left; width:52%;" class="cell border"> {{$report->orphan->guardian->guardian_name}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:29%;" class="cell"> صلة القرابة </p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->guardian->guardian_relationship}} </p>
            </div>

        </div>


        {{--  حفظه للقران and   السلوك الديني  --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> السلوك الديني</p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->fields['religious_behavior']}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:29%;" class="cell"> حفظه للقران</p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->fields['memorize_quran']}} </p>
            </div>

        </div>


        {{--  المستوى الدراسي and   الصف --}}
        <div style="width: 100%;margin-top:15px">
            <div style="width:49%; float: right; overflow: hidden;">
                <p style="float: right; width:29%;" class="cell"> الصف</p>
                <p style="float: left; width:67%;" class="cell border"> {{$report->orphan->profile->class}} </p>
            </div>

            <div style="width: 49%;  float: left; text-align:center;">
                <p style="float: right; width:34%;" class="cell"> المستوى الدراسي </p>
                <p style="float: left; width:60%;" class="cell border"> {{$report->fields['academic_level']}} </p>
            </div>

        </div>

        {{--  المستوى الدراسي and   الصف --}}
        <div style="width: 100%;margin-top:15px">
            <p style="width:100%; font-size:30px;text-align:right" class="cell"> رسالة شكر و تقدير من اليتيم </p>
            <p style=" width:100%; height:180px;text-align:right" class="cell border"> {{$report->fields['letter_thanks']}} </p>
        </div>


        <div style="page-break-after: always;"></div>

        <div>

            {{-- <table style="width: 100%; margin-bottom: 10px;">
                <tr >
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/donor/dar_ber.png') }}" alt="شعار" width="132px" height="87px"> <br>
                    </td>

                    <td style="width:80px; height:60px; background-color: #BA3A37; text-align:center; float: right;">
                        <div style="color:white; font-size:20px;">
                            التقرير الدوري لليتيم
                            <br>
                            لعام {{ date('Y') }}
                        </div>
                    </td>
                </tr>
            </table> --}}

            <div style="width:100%">

                <div style="float:right; width:250px">
                    <img src="{{ public_path('image/donor/dar_ber.png') }}" alt="شعار" width="132px" height="87px"> <br>
                </div>

                <div style="width:180px; height:60px; background-color: #BA3A37; text-align:center; float: right;margin-top:40px">
                    <div style="color:white; font-size:20px;">
                        التقرير الدوري لليتيم
                        <br>
                        لعام {{ date('Y') }}
                    </div>
                </div>

            </div>

            <p style="font-size: 18px"> شهادة ميلاد اليتيم </p>

            <img src="{{ public_path('storage/' . $report->orphan->image->birth_certificate) }}" alt="صورة" width="700px" height="650px">


        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <div style="width:100%">

                <div style="float:right; width:250px">
                    <img src="{{ public_path('image/donor/dar_ber.png') }}" alt="شعار" width="132px" height="87px"> <br>
                </div>

                <div style="width:180px; height:60px; background-color: #BA3A37; text-align:center; float: right;margin-top:40px">
                    <div style="color:white; font-size:20px;">
                        التقرير الدوري لليتيم
                        <br>
                        لعام {{ date('Y') }}
                    </div>
                </div>

            </div>


            <p style="font-size: 18px"> الشهادة الدراسية </p>

            <img src="{{ public_path('storage/' . $report->academic_certificate) }}" alt="صورة" width="700px" height="650px">


        </div>


    </div>

</body>

</html>
