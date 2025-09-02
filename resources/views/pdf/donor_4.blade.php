<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">

    <title>قالب تسجيل يتيم</title>


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

        .border,
        .border-start,
        .border-end{
            border-color:#737373 !important;
        }

        /* d-inline-block bg-white border-start border-end fs-5 pe-2 */


        /* العنوان والشعارات */


        /* الجدول */
        .content {
            width: 100%;
            margin-bottom: 1.25rem
            /* border: 1px solid #000; */
            /* margin-bottom: 10mm; */
        }

        /* .header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        } */

        .name{
            /* display: flex; */
            border:1px solid #737373;
            width:100%;
            margin-bottom: 0.25rem;
        }

        .cell{
            width: 49%;
            padding: 0px;
            padding-right: 5px
            /* display: flex; */
            /* align-items: center */

        }

        /* border-bottom border-dark fs-5 */
        .textarea-title{
            border-bottom:1px solid black;
            font-size:18px

        }

        /* النص في الأسفل */
        .footer-text {
            text-align: center;
            font-size: 12pt;
            margin-top: 10mm;
        }

        .title{
            display: inline-block;
            background-color: white;
            border-left: 1px solid #737373;
            border-right: 1px solid #737373;
            width:30%;
            height:35px;
            font-size:1.25rem;
            padding-right: 0.5rem

        }

        /* d-inline-block   fs-5 pe-2 */
        .span-value{
            display: inline-block;
            font-size: 1.25rem;
            padding-right: 0.5rem;
            width:70%;
            height:35px;
            background-color:#FBFDFB
        }
    </style>

</head>
<body>
    <div class="container">
        <!-- العنوان والشعارات -->

        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="width:132px;">
                    <img src="{{ public_path('image/logo.png') }}" alt="شعار" width="132px" height="87px">
                </td>

                <td style="width: 213px; text-align: center;">

                    <img src="{{public_path('image/donor/donor_4.png')}}"  height="43px"/>
                </td>

                <td style="width: 103px; text-align: left;">
                    <img src="{{public_path('storage/' . $orphan->image->orphan_image_4_6)}}" alt="صورة شخصية"  height="116px" >
                </td>

            </tr>
        </table>

        <!-- الجدول -->

        <div class="content">

            <div class="name">

                <div class="cell" style="float: right">
                    <span class="title"> اسم اليتيم : </span>
                    <span class="span-value"> {{$orphan->name}} </span>
                </div>

                <div class="cell" style="float: left">
                    <span class="title" style=" border-right: 1px solid #737373;">  الجنسية : </span>
                    <span class="span-value"> مصري/ة  </span>
                </div>

            </div>



            <div class="name">

                <div class="cell" style="float: right;">
                    <span class="title" style="float: right;"> تاريخ الميلاد : </span>
                    <span class="span-value" style="float: left;"> {{$orphan->birth_date}} </span>
                </div>

                <div class="cell" style="float: left;width:49%">

                    <p class="title" style="float: right; padding:0px; margin:0px; width:20%">  الجنس: </p>

                    <div style="float:left; margin-right:8px; margin-top:5px">

                        <div style="float: right; width:50%">

                            <span style="border: 2px solid #000;">
                                @if($orphan->gender === 'ذكر')
                                    ✔
                                @endif

                            </span>
                            <label for="ذكر">ذكر</label>
                        </div>

                        <div style="float: right; width:50%">
                            <span style="border: 2px solid #000;">
                                @if($orphan->gender == 'أنثى')
                                    ✔
                                @endif

                            </span>

                            <label for="أنثى">أنثى</label>
                        </div>
                    </div>

                </div>

                {{-- <div class="cell" style="float: left;width:49%">
                    <span class="title" style=" border-right: 1px solid #737373;">  الجنس: </span>
                    <span class="span-value">
                        <span style="">
                            <input type="radio" name="gender" @checked($orphan->gender === 'ذكر')>
                            <span> ذكر </span>
                        </span>

                        <span>
                            <input type="radio" name="gender" @checked($orphan->gender === 'أنثى')>
                            <span> أنثى </span>
                        </span>
                    </span>
                </div> --}}

            </div>

            <div class="name">
                <div class="cell" style="float: right">
                    <span class="title" >  اسم الأم : </span>
                    <span class="span-value"> {{$orphan->profile->mother_name}} </span>
                </div>

                <div class="cell" style="float: left; width:49%">
                    {{-- <div  style="float:right;font-size:1.25rem;width:49% ;border-left:none;border-right: 1px solid #737373;" >
                        <input type="radio" name="mother_status" @checked($orphan->profile->mother_status === 'متزوجة')>
                        <span> متزوجة </span>
                    </div> --}}

                    @if($orphan->profile->mother_status === 'متزوجة')
                        <div style="float: right; width:50%;font-size:1.25rem;border-right: 1px solid #737373;">

                                @if($orphan->profile->mother_status === 'متزوجة')
                                    <span style="border: 1px solid #000; width:5px; height:5px">
                                        ✔
                                    </span>
                                @else
                                    <input type="radio" name="mother_status" @checked($orphan->profile->mother_status === 'متزوجة')>
                                @endif

                            <label for="متزوجة">متزوجة</label>
                        </div>
                    @elseif ($orphan->profile->mother_status === 'أرملة')

                        <div style="float:left; width:49%;font-size:1.25rem;border-right: 1px solid #737373; height:5px">

                                @if($orphan->profile->mother_status === 'أرملة')
                                    <span style="border: 2px solid #000;">
                                        ✔
                                    </span>
                                @else
                                    <input type="radio" name="mother_status" @checked($orphan->profile->mother_status === 'أرملة')>
                                @endif

                            <label for="أرملة">أرملة</label>
                        </div>
                    @else

                        <div style="float: right; width:50%;font-size:1.25rem;border-right: 1px solid #737373;">

                                @if(is_null($orphan->profile->mother_work))
                                    <span style="border: 1px solid #000; width:5px; height:5px">
                                        ✔
                                    </span>
                                @else
                                    <input type="radio" name="mother_status" @checked(is_null($orphan->profile->mother_work))>
                                @endif

                            <label for="متوفاة">متوفاة</label>
                        </div>

                    @endif

                </div>
            </div>

            <div class="name">
                <div class="cell" style="float: right">
                    <span class="title ">  تاريخ وفاة الاب : </span>
                    <span class="span-value" > {{$orphan->profile->father_death_date}} </span>
                </div>

                <div class="cell" style="float: left">
                    <span class="title">  سبب الوفاة : </span>
                    <span class="span-value"> {{ $orphan->getFieldValueByDatabaseName('father_death_reason')}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell" style="float: right">
                    <span class="title" style="width:320px ">  ولي أمر اليتيم أو المسؤول عنه:  </span>
                    <span class="span-value"> {{$orphan->guardian->guardian_name}} </span>
                </div>

                <div class="cell" style="float: left">
                    <span class="title">  صلة القرابة : </span>
                    <span class="span-value"> {{$orphan->guardian->guardian_relationship}} </span>
                </div>
            </div>

            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 66%; vertical-align: top; border: none;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="width: 30%; text-align: right;">
                                    <span class="title"> عدد اخوان اليتيم : </span>
                                    <span class="span-value"> {{$orphan->family->family_number}} </span>
                                </td>
                                <td style="width: 17%; text-align: right;">
                                    <span class="title"> ذكور : </span>
                                    <span class="span-value"> {{$orphan->family->male_number}} </span>
                                </td>
                                <td style="width: 17%; text-align: left;">
                                    <span class="title"> اناث : </span>
                                    <span class="span-value"> {{$orphan->family->female_number}} </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 33%; text-align: left; vertical-align: top; border: none;">
                        <span class="title"> تاريخ الميلاد : </span>
                        <span class="span-value"> {{$orphan->birth_date}} </span>
                    </td>
                </tr>
            </table>


            <div class="name">
                <div class="cell" style="float: right">
                    <span class="title"> دخل الأسرة : </span>
                    <span class="span-value" > {{$orphan->family->income}} </span>
                </div>

                <div class="cell" style="float: left">
                    <span class="title"> نوع الدخل : </span>
                    <span class="span-value"> {{$orphan->family->income_source}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell" style="float: right">
                    <span class="title">  العنوان : </span>
                    <span class="span-value" >  {{ $orphan->profile->governorate . '/' . $orphan->profile->center . '/' . $orphan->profile->full_address }} </span>
                </div>

                <div class="cell" style="float: left">
                    <span class="title"> الهاتف : </span>
                    <span class="span-value"> {{$orphan->phones[0]->phone_number}} </span>
                </div>
            </div>

            <div class="name" style="height: 50px">
                <div class="cell" style="float: right">
                    <span class="title" style="float: right;margin-bottom:10px"> نوع السكن: </span>

                    <div style="float:left">

                        <div style="float: right; width:33%">
                            <span style="border: 2px solid #000; border-radius: 50%; padding: 10px; display: inline-block; text-align: center; width: 20px; height: 20px; line-height: 20px;">
                                @if($orphan->family->housing_type === 'ملك')
                                    ✔
                                @endif

                            </span>
                            <label for="ملك">ملك</label>
                        </div>

                        <div style="float: right; width:33%">
                            <span style="border: 2px solid #000; border-radius: 50%; padding: 10px; display: inline-block; text-align: center; width: 20px; height: 20px; line-height: 20px;">
                                @if($orphan->family->housing_type === 'ايجار')
                                    ✔
                                @endif

                            </span>

                            <label for="ايجار">ايجار</label>
                        </div>

                        <div style=" float: left; width:33%" >
                            <span style="border: 2px solid #000; border-radius: 50%; padding: 10px; display: inline-block; text-align: center; width: 20px; height: 20px; line-height: 20px;">
                                @if($orphan->family->housing_type === 'مشترك')
                                    ✔
                                @endif

                            </span>
                            <label for="مشترك">مشترك</label>
                        </div>

                    </div>
                </div>

                <div class="cell" style="float: left">
                    {{-- <p class="title" style="float: right;"> حالة السكن: </p> --}}
                    <span class="title" style="float: right;margin-bottom:10px"> حالة السكن: </span>


                    <div style="float:left">

                        <div style="float: right; width:33%">
                            <!-- إذا كانت حالة السكن 'جيد'، أضف دائرة وعلامة صح -->
                            <span style="border: 2px solid #000; border-radius: 50%; padding: 10px; display: inline-block; text-align: center; width: 20px; height: 20px; line-height: 20px;">
                                @if($orphan->family->housing_case === 'جيد')
                                    ✔
                                @endif

                            </span>
                            <label for="جيد">جيد</label>
                        </div>

                        <div style="float: right; width:33%">
                            <!-- إذا كانت حالة السكن 'متوسط'، أضف دائرة وعلامة صح -->
                            <span style="border: 2px solid #000; border-radius: 50%; padding: 10px; display: inline-block; text-align: center; width: 20px; height: 20px; line-height: 20px;">
                                @if($orphan->family->housing_case === 'متوسط')
                                    ✔
                                @endif

                            </span>

                            <label for="متوسط">متوسط</label>
                        </div>

                        <div style=" float: left; width:33%" >
                            <!-- إذا كانت حالة السكن 'سيء'، أضف دائرة وعلامة صح -->
                            <span style="border: 2px solid #000; border-radius: 50%; padding: 10px; display: inline-block; text-align: center; width: 20px; height: 20px; line-height: 20px;">
                                @if($orphan->family->housing_case === 'سيء')
                                    ✔
                                @endif

                            </span>
                            <label for="سيء">سيء</label>
                        </div>

                    </div>

                </div>
            </div>

            <div class="name">
                {{-- <div class="cell" style="float: right"> --}}
                    <span class="title" style="width: 42%;margin-right:8px"> الحالة الصحية لليتيم: </span>
                    <span class="span-value" > {{$orphan->health_status}} </span>
                {{-- </div> --}}
            </div>


            <div class="name">
                <div class="cell" style="float: right">
                    <span class="title" style="width: 37%; ;margin-right:8px">المرحلة الدراسية : </span>
                    <span class="span-value" >  {{ $orphan->profile->academic_stage	 . '/' . $orphan->profile->academic_stage_details . '/' . $orphan->profile->academic_secondary_details   }} </span>
                </div>

                @if ($orphan->profile->class)
                    <div class="cell" style="float: left">
                        <span class="title"> الصف : </span>
                        <span class="span-value"> {{$orphan->profile->class}} </span>
                    </div>
                @endif

            </div>

        </div>

        <div style="margin-top: 1.25rem">

            <p class="textarea-title" style="width:420px"> الحالة الاجتماعية لأسرة اليتيم (رأي المشرف الاجتماعي) </p>
            <p style="font-size: 18px">
                {{ $orphan->getFieldValueByDatabaseName('social_status_orphan')}}
            </p>

        </div>

        <div>

            <div style="width: 49%;float:right">
                <span style="font-size:19px;"> توقيع و ختم قسم الأيتام: </span>
                <span>
                    <img src="{{public_path('storage/' . $orphan->certified_orphan_extras->signature)}}" alt="صورة شخصية" width="250px" height="50px">
                </span>
            </div>

            <div style="width: 49%;float: left;">
                <span style="font-size:19px;">  اعتماد الجهة المشرفة:  </span>
                <span>
                    <img src="{{public_path('storage/' . $orphan->certified_orphan_extras->supervisory_accreditation)}}" alt="صورة شخصية" width="250px" height="50px">
                </span>
            </div>

        </div>



    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

</body>
</html>
