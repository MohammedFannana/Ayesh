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


        <div>
            <table style="width: 100%; margin-bottom: 20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 220px; text-align: center;">
                        <img src="{{ public_path('image/report/UAE.png') }}" alt="شعار" width="119px" height="100px">
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <p style="color:#F95454;font-size:26px;text-align:center;margin-bottom:25px"> التقارير الدورية للأيتام </p>

            <div style="margin-bottom: 25px">


                <table style="width: 400px; margin: auto; border-collapse: collapse;">
                    <tr>
                        <td style="font-size: 18px; width: 30%; text-align: right;"> اسم اليتيم </td>
                        <td style="border: 1px solid #ddd; width: 60%; text-align: center; padding: 5px;"> {{$report->orphan->name}} </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="font-size: 18px; width: 30%; text-align: right;"> كود اليتيم </td>
                        <td style="border: 1px solid #ddd; width: 60%; text-align: center; padding: 5px;"> {{$report->orphan->sponsorship->external_code}} </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="font-size: 18px; width: 30%; text-align: right;">عن عدد الأشهر</td>
                        <td style="border: 1px solid #ddd; width: 60%; text-align: center; padding: 5px;"> {{$report->fields['month_number']}} </td>
                    </tr>
                </table>

            </div>


            <div style="font-size: 25px;margin-bottom:10px;margin-top:20px; text-align:center">
                <span>تنفيذ:</span>
                <span style="color: #3B9E29">جمعية عايش</span>
            </div>

            <div style="font-size: 25px;margin-bottom:28px; text-align:center">
                <span >إشراف:</span>
                <span style="color: #3B9E29"> جمعية الشارقة الخيرية </span>
            </div>

            <p style="color:#F95454;font-size: 24px; text-align:center">قال رسول الله صلى الله عليه و سلم:</p>
            <p style="font-size: 24px; text-align:center">“أنا و كافل اليتيم في الجنة كهاتين”</p>
            <p style="font-size: 20px; text-align:center;margin-bottom:28px">رواه البخاري</p>

            <p  style="color:#F95454;font-size: 24px; text-align:center">اكفلني و لك اجري</p>

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <table style="width: 100%; margin-bottom: 20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        معلومات الكافل و اليتيم
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <p style="color:#3B9E29;margin-bottom:15px;font-size:26px;text-align:center;"> بيانات الكافل (ة) </p>

            <div style="width: 100%">
                <div style="width:36%;float: right;">
                    <span style="color:#F95454;font-size:18px"> خاص بادارة الجمعية: </span>
                    كود الكافل(ة)
                </div>

                <div style="width:63%;" class="value">
                    {{$report->fields['sponsor_code']}}
                </div>
            </div>

            <div style="width: 100%;margin-bottom:10px;margin-top:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:32%" class="cell"> اسم الكافل(ة)</p>
                    <p style="float: left; width:63%" class="cell border"> {{$report->fields['sponsor_name']}} </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:15%" class="cell"> الهاتف </p>
                    <p style="float: left; width:80%" class="cell border"> {{$report->fields['sponsor_phone']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:32%" class="cell"> البريد الإلكتروني</p>
                    <p style="float: left; width:63%" class="cell border"> {{$report->fields['sponsor_email']}} </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:35%" class="cell">  ص.ب </p>
                    <p style="float: left; width:60%" class="cell border"> {{$report->fields['sponsor_mailbox']}} </p>
                </div>

            </div>


            <div style="width: 100%;margin-bottom:10px">

                <p style="float: right; width:15%" class="cell"> العنوان</p>
                <p style="float: left; width:80%" class="cell border"> {{$report->fields['sponsor_address']}} </p>

            </div>


            <p style="color:#3B9E29;margin-bottom:15px;margin-top:15px;font-size:26px;text-align:center;"> بيانات اليتيم (ة) </p>


            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:35%" class="cell"> الاسم الكامل لليتيم </p>
                    <p style="float: left; width:60%" class="cell border"> {{$report->orphan->name}} </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:25%" class="cell"> نوع اليتم  </p>
                    <p style="float: left; width:70%" class="cell border"> {{$report->orphan->gender ?? $report->fields['gender']}}  </p>
                </div>

            </div>


            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> مكان الميلاد </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->birth_place ?? $report->fields['birth_place']}} </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:25%" class="cell"> الجنسية </p>
                    <p style="float: left; width:70%" class="cell border"> مصري/ة </p>
                </div>

            </div>


            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> تاريخ الميلاد </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->birth_date ?? $report->fields['birth_date']}} </p>
                </div>

                <div style="width: 49%;  float: right;text-align:center;">
                    <p style="float: right; width:15%" class="cell"> السن </p>
                    <p style="float: left; width:80%" class="cell border"> {{$report->orphan->age ?? $report->fields['age']}} </p>
                </div>

            </div>


            <div style="width: 100%;margin-bottom:10px">

                <p style="float: right; width:32%" class="cell"> سبب استمرار الكفالة بعد البلوغ </p>
                <p style="float: left; width:64%" class="cell border"> {{$report->orphan->getFieldValueByDatabaseName('reason_continuing_sponsorship') ?? $report->fields['reason_continuing_sponsorship']}}  </p>

            </div>

            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> تاريخ وفاة الاب </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->profile->father_death_date ?? $report->fields['father_death_date']}}  </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:20%" class="cell"> اسم الام  </p>
                    <p style="float: left; width:75%" class="cell border"> {{$report->orphan->profile->mother_name ?? $report->fields['mother_name']}}</p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:50%" class="cell"> تاريخ وفاة الام في حال وفاتها </p>
                    <p style="float: left; width:45%" class="cell border"> {{$report->orphan->profile->mother_death_date ?? غير متوفاة}} </p>
                </div>

                <div style="width: 49%;  float: right;text-align:center;">
                    <p style="float: right; width:30%" class="cell">عدد أفراد الاسرة  </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->family->family_number ?? $report->fields['family_number']}} </p>
                </div>

            </div>


            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell">اسم ولي الامر </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']}} </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:25%" class="cell"> صلة القرابة  </p>
                    <p style="float: left; width:70%" class="cell border"> {{$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']}} </p>
                </div>

            </div>


            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> الهاتف </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->phones[0]->phone_number ?? $report->fields['phone_number']}} </p>
                </div>

                <div style="width: 49%;  float: right; text-align:center;">
                    <p style="float: right; width:30%" class="cell"> هاتف واتس أب  </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->getFieldValueByDatabaseName('whatsapp_phone') ?? $report->fields['whatsapp_phone']}} </p>
                </div>

            </div>


        </div>

        <div style="page-break-after: always;"></div>

        <div>
            <table style="width: 100%; margin-bottom:10px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        تقرير متابعة اليتيم الدوري
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <p style="color:#3B9E29;margin-bottom:10px;font-size:26px;text-align:center;"> رعاية اليتيم  (ة) </p>

            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 40%;  float: right; overflow: hidden;">
                    <p style="float: right; width:45%" class="cell"> هل يعيش مع امه </p>
                    <p style="float: left; width:45%" class="cell border"> {{$report->fields['live_mother']}} </p>
                </div>

                <div style="width: 58%;  float: right; overflow: hidden;">
                    <p style="float: right; width:15%" class="cell"> السبب </p>
                    <p style="float: left; width:80%" class="cell border"> {{$report->fields['reason_live']}} </p>
                </div>

            </div>



            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 100%;  float: right; overflow: hidden;">
                    <p style="float: right; width:15%" class="cell"> نوع السكن</p>
                    <p style="float: left; width:80%" class="cell border"> {{$report->orphan->family->housing_type ?? $report->fields['housing_type']}}  </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 100%;  float: right; overflow: hidden;">
                    <p style="float: right; width:45%" class="cell"> الأحوال التي مر بها اليتيم و اسرته مؤخرا </p>
                    <p style="float: left; width:50%" class="cell border"> {{$report->fields['conditions_orphan']}} </p>
                </div>

            </div>


            <p style="color:#3B9E29;margin-bottom:10px;font-size:26px;text-align:center;"> الحالة الصحية لليتيم (ة) </p>


            <div style="width: 100%;margin-bottom:10px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> الحالة الصحية</p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->orphan->health_status ?? $report->fields['health_status']}} </p>
                </div>

                <div style="width: 49%; float: left; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> مرض مزمن </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->fields['chronic_disease']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 100%;  float: right; overflow: hidden;">
                    <p style="float: right; width:20%" class="cell">نوع المرض و أسبابه </p>
                    <p style="float: left; width:75%" class="cell border"> {{$report->orphan->disease_description ?? $report->fields['disease_description']}} </p>
                </div>

            </div>

            <p style="color:#3B9E29;margin-bottom:15px;font-size:26px;text-align:center;"> الحالة الدراسية لليتيم (ة) </p>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> المرحلة الدراسية </p>
                    <p style="float: left; width:65%" class="cell border">{{$report->orphan->profile->academic_stage ?? $report->fields['academic_stage']}}</p>
                </div>

                <div style="width: 49%; float: left; overflow: hidden;">
                    <p style="float: right; width:35%" class="cell"> المستوى الدراسي </p>
                    <p style="float: left; width:60%" class="cell border"> {{$report->fields['academic_level']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:40%" class="cell"> سبب عدم الدراسة</p>
                    <p style="float: left; width:55%" class="cell border"> {{$report->fields['reason_notStudying']}} </p>
                </div>

                <div style="width: 49%; float: left; text-align: center;">
                    <p style="float: right; width:30%" class="cell"> التوجه البديل </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->fields['alternative_approach']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 100%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell">  الاجراءات التي اتخذها المشرف</p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->fields['actions_supervisor']}} </p>
                </div>

            </div>


            <p style="color:#3B9E29;margin-bottom:15px;font-size:26px;text-align:center;"> الحالة الدينية لليتيم (ة) </p>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 40%;  float: right; overflow: hidden;">
                    <p style="float: right; width:40%" class="cell"> يواظب على الصلاة </p>
                    <p style="float: left; width:55%" class="cell border"> {{$report->fields['regular_praying']}} </p>
                </div>

                <div style="width: 59%; float: left; text-align: center;">
                    <p style="float: right; width:45%" class="cell"> الاجراءات التي اتخذها المشرف </p>
                    <p style="float: left; width:50%" class="cell border"> {{$report->fields['actions_supervisor_praying']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 40%;  float: right; overflow: hidden;">
                    <p style="float: right; width:40%" class="cell"> يصوم رمضان </p>
                    <p style="float: left; width:55%" class="cell border"> {{$report->fields['ramadan_fasting']}} </p>
                </div>

                <div style="width: 59%; float: left; text-align: center;">
                    <p style="float: right; width:45%" class="cell"> الاجراءات التي اتخذها المشرف</p>
                    <p style="float: left; width:50%" class="cell border"> {{$report->fields['actions_supervisor_ramadan']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width:50%;  float: right; overflow: hidden;">
                    <p style="float: right; width:50%" class="cell"> كم يحفظ من القرآن الكريم </p>
                    <p style="float: left; width:40%" class="cell border"> {{$report->fields['quran_memorized']}} </p>
                </div>

            </div>

            <div style="page-break-after: always;"></div>

             <table style="width: 100%; margin-bottom: 20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        معلومات الكافل و اليتيم
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>


            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 49%;  float: right; overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> مشرف الأيتام </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->fields['orphan_supervisor']}} </p>
                </div>

            </div>

            <div style="width: 100%;margin-bottom:15px">

                <div style="width: 49%; float: right;  overflow: hidden;">
                    <p style="float: right; width:30%" class="cell"> التاريخ </p>
                    <p style="float: left; width:65%" class="cell border"> {{$report->fields['date']}} </p>
                </div>

            </div>

            <div  style="width: 100%;">

                <div style="width: 49%;float: right">
                    <p style="" class="cell"> التوقيع </p>
                    <p style="" class="cell" style="border:1px solid #ddd;border-radius: 5px;padding:2px ">
                        <img src="{{ public_path('storage/' . $report->signature) }}" alt="صورة" width="180px" height="102px">
                    </p>
                </div>

                <div style="width: 49%;float:left">
                    <p style="" class="cell"> ختم الجمعية المشرفة  </p>

                    <p style="" class="cell" style="border:1px solid #ddd;border-radius: 5px; padding:2px">
                        <img src="{{ public_path('storage/' . $report->supporter_seal) }}" alt="صورة" width="180px" height="102px">
                    </p>
                </div>

            </div>

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <table style="width: 100%; margin-bottom:20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        <img src="{{ public_path('image/report/UAE.png') }}" alt="شعار" width="119px" height="100px"  style="margin-bottom:5px"> <br>
                        صورة اليتيم مع لوحة الدفعة
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <img src="{{ public_path('storage/' . $report->group_photo) }}" alt="صورة" width="700px" height="650px">

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <table style="width: 100%; margin-bottom:20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        <img src="{{ public_path('image/report/UAE.png') }}" alt="شعار" width="119px" height="100px" style="margin-bottom:5px"> <br>
                        رسالة شكر من اليتيم للكافل
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <div>
                <p style="text-align: center"> السلام عليكم ورحمة الله وبركاته </p>
                <p> عناية كافلي الفريد </p>
            </div>
            <img src="{{ public_path('storage/' . $report->thanks_letter) }}" alt="صورة" width="700px" height="650px">

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <table style="width: 100%; margin-bottom:20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        <img src="{{ public_path('image/report/UAE.png') }}" alt="شعار" width="119px" height="100px"  style="margin-bottom:5px"> <br>
                        اخر شهادة حصل عليها التيم و اخر درجات
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <img src="{{ public_path('storage/' . $report->academic_certificate) }}" alt="صورة" width="700px" height="700px">

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <table style="width: 100%; margin-bottom:20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        <img src="{{ public_path('image/report/UAE.png') }}" alt="شعار" width="119px" height="100px"  style="margin-bottom:5px"> <br>
                        التقرير الطبي
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <img src="{{ public_path('storage/' . $report->orphan->image->medical_report) }}" alt="صورة" width="700px" height="650px">

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <table style="width: 100%; margin-bottom:20px;">
                <tr>
                    <td style="font-size: 17px; font-weight: 600; width:130px;">
                        <img src="{{ public_path('image/report/sharjah.png') }}" alt="شعار" width="119px" height="110px"> <br>
                    </td>

                    <td style="width: 216px; text-align: center;color:#F95454;font-size:26px">
                        <img src="{{ public_path('image/report/UAE.png') }}" alt="شعار" width="119px" height="100px"  style="margin-bottom:5px"> <br>
                        ايصال تحويل مبلغ الكفالة الى حساب اليتيم
                    </td>

                    <td style="width: 103px; text-align: left;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="صورة" width="119px" height="110px">
                    </td>
                </tr>
            </table>

            <img src="{{ public_path('storage/' . $report->sponsorship_transfer_receipt) }}" alt="صورة" width="700px" height="650px">

            <p style="text-align: center"> تم بحمد الله </p>

        </div>


    </div>

</body>
</html>
