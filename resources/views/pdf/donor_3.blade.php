<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
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
    </style>

</head>

<body>

    <div class="container">


        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="font-size: 17px; font-weight: 600; width:130px;">
                    قال رسول الله صلى الله عليه و سلم:
                    <div>
                        “أنا و كافل اليتيم في الجنة كهاتين,<br>
                        وأشار بأصبعيه السبابة و الوسطى ”
                    </div>
                </td>
                <td style="width: 216px; text-align: center;">
                    {{-- <img src="{{ asset('image/logo.png') }}" alt="شعار" width="132px" height="87px"> <br> --}}
                    <img src="{{ public_path('image/logo.png') }}" alt="شعار" width="132px" height="87px"> <br>

                    <p style="font-size: 22px; color:#F95454; font-weight: 600;">ادارة رعاية الأيتام و الاسر</p>
                </td>
                <td style="width: 103px; text-align: left;">
                    {{-- <img src="{{ asset('storage/' . $orphan->image->orphan_image_4_6) }}" alt="صورة شخصية" width="103px" height="116px"> --}}
                    <img src="{{ public_path('storage/' . $orphan->image->orphan_image_4_6) }}" alt="صورة" width="103px" height="116px">

                </td>
            </tr>
        </table>


        <div>

            <div style="width: 100%; height:50px">
                <span style="font-size:19px;"> رقم اليتيم: </span>
                <span style="font-size:17px;"> {{$orphan->internal_code}} </span>
            </div>

            <div style="height:50px">

                <div style="width: 49%; float: right; ">
                    <span style="font-size:19px;"> اسم اليتيم: </span>
                    <span style="font-size:17px;"> {{$orphan->name}} </span>
                </div>

                <div style="width: 49%; float: left; ">
                    <span style="font-size:19px;"> تاريخ وجهة الميلاد:  </span>
                    <span style="font-size:17px;"> {{$orphan->birth_date}} , {{$orphan->birth_place}} </span>
                </div>

            </div>

            <div style="height:50px">

                <div style="width: 49%; float:right ">
                    <span style="width: 20%;font-size:19px;float: right;"> يتيم الأبوين: </span>
                    <span style="font-size:18px;float: right;">نعم ( @if($orphan->profile->parents_orphan == 'نعم') ✔ @endif  )</span>
                    <span style="font-size:18px;float: left">لا ( @if($orphan->profile->parents_orphan == 'لا') ✔ @endif )</span>
                </div>

                <div style="width: 49%; float: left; ">
                    <span style="font-size:19px;"> تاريخ وفاة الأب:  </span>
                    <span style="font-size:17px;"> {{$orphan->profile->father_death_date}} </span>
                </div>

            </div>

            <div style="height:50px">

                <div style="width: 49%; float:right; display:flex ">
                    <span style="width: 20%; font-size:19px"> عدد الأخوة: </span>
                    <span style="width:40%;font-size:18px;">ذكور ( {{$orphan->family->male_number}} )</span>
                    <span style="width:40%;font-size:18px;">اناث ( {{$orphan->family->female_number}} )</span>
                </div>

                <div style="float:left; width:49% ">

                    {{-- <div style="width: 48%; float:right"> --}}
                        <span style="font-size:19px;float:right"> المرحلة الدراسية:  </span>
                        <span style="font-size:17px;float:right;"> {{$orphan->profile->academic_stage}} </span>
                    {{-- </div> --}}

                    {{-- <div style="width:48%; float:left "> --}}
                        <span style="font-size:19px;float:left"> الصف:  </span>
                        <span style="font-size:17px;float:left"> {{$orphan->profile->class}} </span>
                    {{-- </div> --}}
                </div>

            </div>


            <div style="height:50px;">

                <div style="width: 49%; float:right ">
                    <span style="font-size:19px;"> الحالة الصحية: </span>
                    <span style="font-size:17px;"> {{$orphan->health_status}} </span>
                </div>

                <div style="width: 49%; font-size:19px;float:left ">
                    <span> العنوان:  </span>
                    <span style="font-size:17px;"> {{$orphan->family->address}} </span>
                </div>

            </div>


            <div style="height:50px;">

                <div style="width: 49%; float: right; ">
                    <span style="font-size:19px;"> اسم الأم:  </span>
                    <span style="font-size:17px;"> {{$orphan->profile->mother_name}} </span>
                </div>

                <div style="width: 49%; float:left ">
                    <span style="width:28%;font-size:19px"> هل تعمل الأم: </span>
                    <span style="font-size:18px;float: right;">نعم ( @if($orphan->profile->mother_work== 'نعم') ✔ @endif  )</span>
                    <span style="font-size:18px;float: left">لا ( @if($orphan->profile->mother_work== 'لا') ✔ @endif )</span>
                </div>

            </div>

            <div style="height:50px;">

                <div style="width: 49%; float:right ">
                    <span style="font-size:19px;"> المسؤول عن اليتيم: </span>
                    <span style="font-size:17px;"> {{$orphan->guardian->guardian_name}} </span>
                </div>

                <div style="width: 49%; float:left ">
                    <span style="font-size:19px;"> علاقته باليتيم:  </span>
                    <span style="font-size:17px;"> {{$orphan->guardian->guardian_relationship}} </span>
                </div>

            </div>

            <div style="width: 100%; height:50px">
                <span  style="font-size:19px;"> ملاحظات: </span>
                <span style="font-size:17px;"> {{ $orphan->getFieldValueByDatabaseName('notes')}} </span>
            </div>

            <div>

                <div style="width: 49%;float:right">
                    <span style="font-size:19px;"> التاريخ: </span>
                    <span style="font-size:17px;"> {{ $orphan->getFieldValueByDatabaseName('date')}} </span>
                </div>

                <div style="width: 49%;float: left;">
                    <span style="font-size:19px;"> توقيع المسؤول:  </span>
                    <span>
                        <img src="{{public_path('storage/' . $orphan->getFieldValueByDatabaseName('signature_official'))}}" alt="صورة شخصية" width="250px" height="50px">
                    </span>
                </div>

            </div>


        </div>


    </div>


</body>
</html>
