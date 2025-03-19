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

        .container1 {
            width: 100%;
            height: 100%;
        }

        .border,
        .border-start,
        .border-end{
            border-color:#737373 !important;
        }

        /* d-inline-block bg-white border-start border-end fs-5 pe-2 */
        .title{
            display: inline-block;
            background-color: white;
            border-left: 1px solid #737373;
            border-right: 1px solid #737373;

            min-width:31%;
            height:35px;
            font-size:1.25rem;
            padding-right: 0.5rem

        }

        /* d-inline-block   fs-5 pe-2 */
        .span-value{
            display: inline-block;
            font-size: 1.25rem;
            padding-right: 0.5rem;
            width:272px;
            height:35px;
            background-color:#FBFDFB
        }

        /* العنوان والشعارات */


        /* الجدول */
        .content {
            width: 100%;
            margin-bottom: 1.25rem
            /* border: 1px solid #000; */
            /* margin-bottom: 10mm; */
        }

        .header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .name{
            display: flex;
            border:1px solid #737373;
            width:100%;
            margin-bottom: 0.25rem;
        }

        .cell{
            width: 50%;
            padding: 0px;
            display: flex;
            align-items: center

        }

        border-bottom border-dark fs-5
        .textarea-title{
            border-bottom:1px solid black;
            font-size: 1.25px

        }

        /* النص في الأسفل */
        .footer-text {
            text-align: center;
            font-size: 12pt;
            margin-top: 10mm;
        }
    </style>
</head>
<body>
    <div class="container1">
        <!-- العنوان والشعارات -->
        <div class="header" >
            <img src="{{asset('image/logo.png')}}" alt="شعار" class="logo" width="132px" height="87px">
            <img src="{{asset('image/donor/donor_4.png')}} " width="213px" height="43px"/>
            <img src="{{asset('storage/' . $orphan->image->orphan_image_4_6)}}" alt="صورة شخصية" class="profile-pic" width="103px" height="116px">

        </div>

        <!-- الجدول -->

        <div class="content">

            <div class="name">

                <div class="cell">
                    <span class="title"> اسم اليتيم : </span>
                    <span class="span-value"> {{$orphan->name}} </span>
                </div>



                {{-- <div class="cell">
                    <span class="title" style=" border-right: 1px solid #737373;">  الجنسية : </span>
                    <span class="span-value"> {{ $orphan->getFieldValueByDatabaseName('nationality')}} </span>
                </div> --}}
            </div>
{{--
            <div class="name">
                <div class="cell">
                    <span class="title"> تاريخ الميلاد : </span>
                    <span class="span-value"> {{$orphan->birth_date}} </span>
                </div>

                <div class="cell">
                    <span class="title" style=" border-right: 1px solid #737373;">  الجنس: </span>
                    <span class="span-value">
                        <span style="margin-left: 55px">
                            <input type="radio" name="gender" @checked($orphan->gender === 'ذكر')>
                            <span> ذكر </span>
                        </span>

                        <span>
                            <input type="radio" name="gender" @checked($orphan->gender === 'أنثى')>
                            <span> أنثى </span>
                        </span>
                    </span>
                </div>
            </div>

            <div class="name">
                <div class="cell">
                    <span class="title">  اسم الأم : </span>
                    <span class="span-value"> {{$orphan->profile->mother_name}} </span>
                </div>

                <div class="cell">
                    <span class="title" style="width:50%; height:35px; border-left:none;" >
                        <input type="radio" name="mother_status" @checked($orphan->profile->mother_status === 'متزوجة')>
                        <span> متزوجة </span>
                    </span>

                    <span class="title" style="width:50%; height:35px;" >
                        <input type="radio" name="mother_status" @checked($orphan->profile->mother_status === 'أرملة')>
                        <span> أرملة </span>
                    </span>


                </div>
            </div>

            <div class="name">
                <div class="cell">
                    <span class="title ">  تاريخ وفاة الاب : </span>
                    <span class="span-value" > {{$orphan->profile->father_death_date}} </span>
                </div>

                <div class="cell">
                    <span class="title">  سبب الوفاة : </span>
                    <span class="span-value"> {{ $orphan->getFieldValueByDatabaseName('father_death_reason')}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell">
                    <span class="title" style="width:320px ">  ولي أمر اليتيم أو المسؤول عنه:  </span>
                    <span class="span-value"> {{$orphan->guardian->guardian_name}} </span>
                </div>

                <div class="cell">
                    <span class="title">  صلة القرابة : </span>
                    <span class="span-value"> {{$orphan->guardian->guardian_relationship}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell" style="width:25%">
                    <span class="title" style="width:240%!important"> عدد اخوان اليتيم : </span>
                    <span class="span-value"> {{$orphan->family->family_number}} </span>
                </div>

                <div class="cell" style="width: 20%">
                    <span class="title" style="width:100%!important"> ذكور : </span>
                    <span class="span-value"> {{$orphan->family->male_number}} </span>
                </div>

                <div class="cell" style="width: 20%">
                    <span class="title"  style="width:100%!important"> اناث : </span>
                    <span class="span-value"> {{$orphan->family->female_number}} </span>
                </div>

                <div class="cell" style="width: 35%">
                    <span class="title"  style="width:60%!important">  تاريخ الميلاد : </span>
                    <span class="span-value" > {{$orphan->birth_date}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell">
                    <span class="title"> دخل الأسرة : </span>
                    <span class="span-value" > {{$orphan->family->income}} </span>
                </div>

                <div class="cell">
                    <span class="title"> نوع الدخل : </span>
                    <span class="span-value"> {{$orphan->family->income_source}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell">
                    <span class="title">  العنوان : </span>
                    <span class="span-value" > {{$orphan->profile->full_address}} </span>
                </div>

                <div class="cell">
                    <span class="title"> الهاتف : </span>
                    <span class="span-value"> {{$orphan->profile->phone}} </span>
                </div>
            </div>

            <div class="name">
                <div class="cell">
                    <span class="title"> نوع السكن: </span>
                    <span class="span-value " >

                        <span>
                            <input type="radio" id="ملك" value="ملك" name="housing_type" @checked($orphan->family->housing_type === 'ملك') disabled/>
                            <span> ملك </span>
                        </span>

                        <span>
                            <input type="radio" name="housing_type" id="ايجار" value="ايجار" @checked($orphan->family->housing_type === 'ايجار') disabled/>
                            <span> ايجار </span>
                        </span>

                        <span>
                            <input type="radio" name="housing_type" value="مشترك" id="مشترك" @checked($orphan->family->housing_type === 'مشترك') disabled/>
                            <span> مشترك </span>
                        </span>
                    </span>
                </div>

                <div class="cell">
                    <span class="title"> حالة السكن: </span>
                    <span class="span-value" style="display:flex; justify-content: space-between">
                        <span>
                            <input type="radio" name="housing_case" value="جيد" id="جيد" @checked($orphan->family->housing_case === 'جيد') disabled>
                            <span> جيد </span>
                        </span>

                        <span>
                            <input type="radio" name="housing_case" value="متوسط" id="متوسط" @checked($orphan->family->housing_case === 'متوسط') disabled>
                            <span> متوسط </span>
                        </span>

                        <span>
                            <input type="radio" name="housing_case" value="سيء" id="سيء" @checked($orphan->family->housing_case === 'سيء') disabled>
                            <span> سيء </span>
                        </span>
                    </span>
                </div>

            </div>

            <div class="name">
                <div class="cell">
                    <span class="title" style="width: 40%"> الحالة الصحية لليتيم: </span>
                    <span class="span-value" > {{$orphan->health_status}} </span>
                </div>

                <div class="cell">
                    <span class="title">  </span>
                </div>
            </div>


            <div class="name">
                <div class="cell">
                    <span class="title" style="width: 35%">المرحلة الدراسية : </span>
                    <span class="span-value" > {{$orphan->profile->academic_stage}} </span>
                </div>

                <div class="cell">
                    <span class="title"> الصف : </span>
                    <span class="span-value"> {{$orphan->profile->class}} </span>
                </div>
            </div> --}}

        </div>

        <div style="margin-top: 1.25rem">
            <p class="textarea-title" style="width:fit-content"> الحالة الاجتماعية لأسرة اليتيم (رأي المشرف الاجتماعي) </p>
            <p style="font-size: 18px">
                {{ $orphan->getFieldValueByDatabaseName('social_status_orphan')}}
            </p>

        </div>

        {{-- <div  style="display: flex; justify-content-between">
            <div  style="width:50%">
                <p class="fw-bold fs-5"> توقيع و ختم قسم الأيتام </p>
            </div>

            <div style="width:50%">
                <p class="fw-bold fs-5"> اعتماد الجهة المشرفة </p>
            </div>
        </div> --}}



    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

</body>
</html>