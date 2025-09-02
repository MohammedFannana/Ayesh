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
                    <img src="{{ public_path('image/donor/dar_ber.png') }}" alt="شعار" width="132px" height="87px"> <br>

                </td>
                <td style="width: 216px; text-align: center;">
                    <img src="{{ public_path('image/dat_ber1.png') }}" alt="شعار" width="132px" height="87px"> <br>
                    <p style="font-size: 22px; color:#556223; font-weight: 600;"> استمارة كفالة يتيم  </p>
                    <p>
                        <span style="color: #556223"> رقم اليتيم: </span>
                        <span> {{$orphan->internal_code}} </span>
                    </p>
                </td>
                <td style="width: 103px; text-align: left;">
                    <img src="{{ public_path('storage/' . $orphan->image->orphan_image_4_6) }}" alt="صورة" width="103px" height="116px">

                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="width:49%;">
                    <span style="font-size: 19px;"> اسم الهيئة: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('organization_name')}} </span>
                </td>
                <td style=" width:49%;">
                    <span style="font-size: 19px;"> رقم الهيئة: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('organization_number')}} </span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="width:25%;">
                    <span style="font-size: 19px;">  اسم اليتيم: </span>
                    <span style="font-size: 17px;"> {{$orphan->name}} </span>
                </td>

                <td style="width:25%;">
                    <span style="font-size: 19px;">  اسم الأب: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('father_name')}} </span>
                </td>

                <td style="width:25%;">
                    <span style="font-size: 19px;">  اسم الجد: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('grandfather_name')}} </span>
                </td>

                <td style=" width:25%;">
                    <span style="font-size: 19px;">  اسم العائلة: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('last_name')}} </span>
                </td>
            </tr>
        </table>


        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="width:25%;">
                    <span style="font-size: 19px;">  الجنسية: </span>
                    <span style="font-size: 17px;"> مصري/ة </span>
                </td>

                <td style="width:25%;">
                    <span style="font-size: 19px;">  الجنس: </span>
                    <span style="font-size: 17px;"> {{$orphan->gender}} </span>
                </td>

                <td style="width:25%;">
                    <span style="font-size: 19px;">  يتيم الأبوين: </span>
                    <span style="font-size: 17px;"> @if ($orphan->case_type === 'يتيم الأبوين') نعم  @else لا @endif  </span>
                </td>

                <td style=" width:25%;">
                    <span style="font-size: 19px;"> يتيم الأب: </span>
                    <span style="font-size: 17px;"> نعم </span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <td style="width:49%;">
                    <span style="font-size: 19px;"> تاريخ ميلاد اليتيم: </span>
                    <span style="font-size: 17px;"> {{$orphan->birth_date}} </span>
                </td>
                <td style=" width:49%;">
                    <span style="font-size: 19px;"> مكان الميلاد: </span>
                    <span style="font-size: 17px;"> {{$orphan->birth_place}} </span>
                </td>
            </tr>
        </table>


        <div style="border:1px solid #C1C1C1">

            <table style="width: 100%; margin-bottom: 10px;">
                <tr>
                    <td style="width:34%;">
                        <span style="font-size: 19px;">  تاريخ وفاة الأب: </span>
                        <span style="font-size: 17px;"> {{$orphan->profile->father_death_date}} </span>
                    </td>

                    <td style="width:22%;">
                        <span style="font-size: 19px;"> الديانة: </span>
                        <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('father_religion')}} </span>
                    </td>

                    <td style="width:22%;">
                        <span style="font-size: 19px;">  اسم الأم: </span>
                        <span style="font-size: 17px;"> {{$orphan->profile->mother_name}} </span>
                    </td>

                    <td style="width:22%;">
                        <span style="font-size: 19px;"> الديانة: </span>
                        <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('mother_religion')}} </span>
                    </td>
                </tr>
            </table>


            <table style="width: 100%; margin-bottom: 10px;">
                <tr>
                    <td style="width:25%;">
                        <span style="font-size: 19px;">  تعمل في: </span>
                        <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('mother_work')}} </span>
                    </td>

                    <td style="width:25%;">
                        <span style="font-size: 19px;"> دخلها الشهري: </span>
                        <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('mother_salary')}} </span>
                    </td>

                    <td style="width:25%;">
                        <span style="font-size: 19px;">  متزوجة: </span>
                        <span style="font-size: 17px;"> @if($orphan->profile->mother_status === "متزوجة") نعم @else لا  @endif</span>
                    </td>

                    <td style=" width:25%;">
                        <span style="font-size: 19px;"> اعانات أخرى: </span>
                        <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('other_subsidies')}} </span>
                    </td>
                </tr>
            </table>

        </div>

        <table style="width: 100%; margin-bottom: 20px; margin-top: 20px;">
            <tr>
                <td style="width:24%;">
                    <span style="font-size: 19px;">  عدد الأشقاء: </span>
                    <span style="font-size: 17px;"> {{$orphan->family->family_number}} </span>
                </td>

                <td style="width:24%;">
                    <span style="font-size: 19px;">  ذكور: </span>
                    <span style="font-size: 17px;"> {{$orphan->family->male_number}} </span>
                </td>

                <td style="width:24%;">
                    <span style="font-size: 19px;">  اناث: </span>
                    <span style="font-size: 17px;"> {{$orphan->family->female_number}} </span>
                </td>

                <td style=" width:28%;">
                    <span style="font-size: 19px;"> عدد المكفولين منهم: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('sponsored_number')}} </span>
                </td>
            </tr>
        </table>


        <div style="border:1px solid #C1C1C1">
            <table style="width: 100%; margin-bottom: 10px;">
                <tr>
                    <td style="width:33%;">
                        <span style="font-size: 19px;">  حالة اليتيم الصحية: </span>
                        <span style="font-size: 17px;"> {{$orphan->health_status}} </span>
                    </td>

                    <td style="width:33%;">
                        <span style="font-size: 19px;">  المرحلة الدراسية: </span>
                        <span style="font-size: 17px;"> {{$orphan->profile->academic_stage}} </span>
                    </td>
                    
                    @if($orphan->profile->class)
                    <td style="width:33%;">
                        <span style="font-size: 19px;"> الصف: </span>
                        <span style="font-size: 17px;"> {{$orphan->profile->class}} </span>
                    </td>
                    @endif

                </tr>
            </table>

            <table style="width: 100%; margin-bottom: 10px;">
                <tr>
                    <td style="width:49%;">
                        <span style="font-size: 19px;">  المسؤول المباشر عن اليتيم: </span>
                        <span style="font-size: 17px;"> {{$orphan->guardian->guardian_name}} </span>
                    </td>

                    <td style="width:49%;">
                        <span style="font-size: 19px;"> صلته باليتيم: </span>
                        <span style="font-size: 17px;"> {{$orphan->guardian->guardian_relationship}} </span>
                    </td>

                </tr>
            </table>


            <table style="width: 100%; margin-bottom: 10px;">
                <tr>
                    <td style="width:49%;">
                        <span style="font-size: 19px;">  عنوان اليتيم بالكامل: </span>
                        <span style="font-size: 17px;">
                            {{ $orphan->profile->governorate . '/' . $orphan->profile->center . '/' . $orphan->profile->full_address }}
                        </span>

                    </td>

                    <td style="width:49%;">
                        <span style="font-size: 19px;"> هاتف: </span>
                        <span style="font-size: 17px;"> {{$orphan->phones[0]->phone_number}} </span>
                    </td>

                </tr>
            </table>
        </div>

        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="width:33%;height:50px ">
                    <span style="font-size: 19px;">  المسؤول عن الهيئة: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('authority_official')}} </span>
                </td>

                <td style="width:33%;height:50px">
                    <span style="font-size: 19px;">  تاريخ الاصدار: </span>
                    <span style="font-size: 17px;"> {{$orphan->getFieldValueByDatabaseName('release_date')}}</span>
                </td>

                <td style="width:33%;height:50px">
                    <span style="font-size: 19px;"> التوقيع و الختم:: </span>
                    {{-- <br> --}}
                    <img src="{{ public_path('storage/' . $orphan->getFieldValueByDatabaseName('signature_seal')) }}" alt="" width="100px" height="50px">
                </td>


            </tr>
        </table>


    </div>

</body>
</html>
