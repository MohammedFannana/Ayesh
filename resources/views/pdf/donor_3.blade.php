<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        body {
            font-family: 'arialarabic';
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

        .color-red {
            color: #F95454;
        }

        .line{
            width: 100%;
            height: 1px;
            background-color: #F95454;
            color: #F95454;
            margin: 0px 0px 2px 0px;
            padding: 0px;
        }

        .font{
            font-weight: bold;
            font-size: 20px
        }
    </style>

</head>

<body>

    <div class="container">

        <div style="width: 100%;overflow: hidden;">

            <div style="float: right;width:25%;text-align: center; vertical-align: middle;" class="color-red">
                <p style="margin-bottom: 1px;padding-bottom:1px"> جمهورية مصر العربية </p>
                 جمعية عايش
            </div>

            <div style="float: left;width:27%;text-align:end" class="color-red">
                مشهرة برقم (1100/2022)
            </div>

        </div>


        <div style="width: 100%; overflow: hidden; text-align: center;">

            <div style="width:38%; float: right; height: 70px;padding-top: 40px;">
                <p class="line" style="line-height: 45px;"></p>
                <p class="line" style="line-height: 45px;"></p>
                <div style="font-size: 14px;font-weight: bold;width: 85%;">
                    <p style="text-align: center">قال رَسُولُ اللَّه ﷺ</p>
                    <p style="text-align: center;"> أنا وَكافلُ اليتيمِ في الجنَّةِ كَهاتين، وأشارَ بأصبُعَيْهِ السَّبَّابةَ والوسطى </p>

                </div>

                <div style="margin-top:15px;float: right; width: 100%; text-align: start;">
                    <span class="font"> رقم اليتيم: </span>
                    <span style="font-size:17px;"> {{$orphan->internal_code}} </span>
                </div>

                <div style="margin-top:12px;float: right; width: 100%; text-align: start;">
                    <span class="font"> اسم اليتيم: </span>
                    <span style="font-size:17px;"> {{$orphan->name}} </span>
                </div>

                <div style="margin-top:35px; float:right ; text-align: start; ">
                    <span class="font" style="width: 20%;float: right;"> يتيم الأبوين: </span>
                    <span class="font" style="float: right;">نعم ( @if($orphan->case_type == 'يتيم الأبوين') ✔ @endif  )</span>
                    <span class="font" style="float: left">لا ( @if($orphan->case_type == 'يتيم') ✔ @endif )</span>
                </div>

            </div>

            <div style="float: left; width:62%">

                <div style="width: 100%">
                    <div style="width: 40%; float: right; height: 120px;">
                        <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="شعار" style="vertical-align: middle; max-height: 120px; width: 100%; ">
                        <p style="color:red;font-weight:bold;width:100%;margin:0; padding:0"> ادارة رعاية الايتام والاسر </p>

                    </div>

                    <div style="width: 60%; float: left; height: 70px;padding-top: 40px;">
                        <div style="width: 100%">
                            <p class="line" style="line-height: 45px;"></p>
                            <p class="line" style="line-height: 45px;"></p>
                        </div>

                        <div style="width:60%;float:left;">
                            <div style="height:220px; border:3px solid #BA3A37; border-radius:20px;margin-top:20px;float: left">
                                <img src="{{ public_path('storage/' . $orphan->image->orphan_image_4_6) }}" alt="صورة" width="100%">
                            </div>
                        </div>
                    </div>

                </div>


                <div style=" margin-top: -87px;text-align:start;">
                    <span class="font" style="float: right"> تاريخ وجهة الميلاد:  </span>
                    <span style="font-size:17px;float: left"> {{$orphan->birth_date}} <br> {{$orphan->birth_place}} </span>
                </div>



                <div style="text-align:start; width:100% ; margin-top:-25px">
                    <span class="font" style="float: right"> تاريخ وفاة الأب:  </span>
                    <span style="font-size:17px;float: left"> {{$orphan->profile->father_death_date}} </span>
                </div>


            </div>

        </div>


        <div style="margin-top:30px">

            <div style="width: 36%; float:right;text-align:start; ">
                <span class="font" style="width: 20%; font-size:19px"> عدد الأخوة: </span>
                <span class="font" style="width:40%;font-size:18px;">ذكور ( {{$orphan->family->male_number}} )</span>
                <span class="font" style="width:40%;font-size:18px;">اناث ( {{$orphan->family->female_number}} )</span>
            </div>

            <div style="float:left; width:62%;text-align:start;">

                {{-- <div style="width: 48%; float:right"> --}}
                    <span class="font"> المرحلة الدراسية:  </span>
                    <span style="font-size:17px;float:right;"> {{$orphan->profile->academic_stage}} </span>
                {{-- </div> --}}

                {{-- <div style="width:48%; float:left "> --}}
                    @if ($orphan->profile->class)
                        <span class="font"> الصف:  </span>
                        <span style="font-size:17px;float:left"> {{$orphan->profile->class}} </span>
                    @endif

                {{-- </div> --}}
            </div>

        </div>


        <div style="margin-top:30px">

            <div style="width: 36%; text-align:start;float:right; ">
                <span class="font"> الحالة الصحية: </span>
                <span style="font-size:17px;"> {{$orphan->health_status}} </span>
            </div>

            <div style="width: 62%; font-size:19px;text-align:start; float:left">
                <span class="font"> العنوان:  </span>
                <span style="font-size: 17px;">
                    {{ $orphan->profile->governorate . '/' . $orphan->profile->center . '/' . $orphan->profile->full_address }}
                </span>

            </div>

        </div>


        <div style="margin-top:30px">

            <div style="width: 36%; float: right;text-align:start; ">
                <span class="font"> اسم الأم:  </span>
                <span style="font-size:17px;"> {{$orphan->profile->mother_name}} </span>
            </div>

            <div style="width: 62%; float:left;text-align:start ">
                <span class="font"> هل تعمل الأم: </span>
                <span class="font" style="font-size:18px;float: right;">نعم ( @if($orphan->profile->mother_work== 'نعم') ✔ @endif  )</span>
                <span class="font" style="font-size:18px; float: left;">
                    لا (
                    @if($orphan->profile->mother_work === 'لا' || is_null($orphan->profile->mother_work))
                        ✔
                    @endif
                    )
                </span>
            </div>

        </div>

        <div style="margin-top:30px">

            <div style="width: 36%; float:right;text-align:start ">
                <span class="font"> المسؤول عن اليتيم: </span>
                <span style="font-size:17px;"> {{$orphan->guardian->guardian_name}} </span>
            </div>

            <div style="width: 62%; float:left;text-align:start ">
                <span class="font"> علاقته باليتيم:  </span>
                <span style="font-size:17px;"> {{$orphan->guardian->guardian_relationship}} </span>
            </div>

        </div>

        <div style="width: 100%; margin-top:30px">
            <span  class="font"> ملاحظات: </span>
            <span style="font-size:17px;"> {{ $orphan->getFieldValueByDatabaseName('notes')}} </span>
        </div>

        <div style="margin-top:30px; margin-bottom:280px">

            <div style="width: 36%;float:right;text-align:start">
                <span class="font"> التاريخ: </span>
                <span style="font-size:17px;"> {{ $orphan->getFieldValueByDatabaseName('date')}} </span>
            </div>

            <div style="width: 62%;float: left; text-align:start">
                <span class="font"> توقيع المسؤول:  </span>
                <br>
                <p style="margin:-30px 100px 0px 0px">
                    <img src="{{public_path('storage/' . $orphan->getFieldValueByDatabaseName('signature_official'))}}" alt="صورة شخصية" width="250px" height="50px">
                </p>
            </div>

        </div>

        <div style="border-top: 2px solid #BA3A37; border-bottom: 2px solid #BA3A37; padding: 5px 0; font-size: 12px; color: #d48d8d; font-family: arial; direction: rtl;">
            <div style="width: 100%; overflow: hidden;">
                <!-- الشعار الأيمن -->
                <div style="float: right; width: 17%; text-align: left;">
                    <img src="{{ public_path('image/report/Picture4.jpg') }}" style="width: 100px;">
                </div>

                <!-- البيانات الوسط -->
                <div style="float: right; width: 65%; text-align: center; line-height: 1.8;padding-top: 10px;">
                    هاتف: +20503513226 · فاكس: +20503513225 · إيميل: <span style="color:#d48d8d;">info@aisheg.com</span>
                </div>

                <!-- شهادة اليسار -->
                <div style="float: left; width: 17%; text-align: right;">
                    <img src="{{ public_path('image/report/Picture5.jpg') }}" style="width: 100px;">
                </div>
            </div>
        </div>




    </div>


</body>
</html>
