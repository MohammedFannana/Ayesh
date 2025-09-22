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
            /*margin-top: 2px !important;*/
            padding: 0 !important;
            width: 210mm !important; /* عرض A4 */
            height: 297mm !important; /* ارتفاع A4 */
            box-sizing: border-box !important;
        }

        .container{
            width: 100%;
            height: 100%;
            /*margin-top: 5px;*/
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

        /* .border{
            border:1px solid #BA3A37;
        } */

        .font{
            font-weight:bold;
            text-align:start;
        }

        .border {
            font-size: 18px;
            border: 1px double red;
            box-shadow: 4px 4px 0px black;
            direction: rtl;
            font-family: 'Arial', sans-serif;
        }


    </style>

</head>

<body>


    <div class="container">


        <div style="width: 100%; margin-bottom: 15px; overflow: hidden;">
            <!-- الشعار على اليمين -->
            <div style="width: 72%;float: right;">
                <div style="float: right; width: 235px;">
                    <img src="{{ public_path('image/report/Picture1.jpg') }}" alt="شعار" width="70%" height="185px">
                     <div style="margin-top:5px">
                        <p style="float: right; width:110px;" class="cell font"> الجهة المشرفة </p>
                        <p style="float: left;" class="cell border"> جمعية عايش </p>
                    </div>
                </div>



                <!-- العنوان في المنتصف -->
                <div style="padding-top: 30px;padding-right: 5px;">
                    <div style="float: right; width: 270px;margin-top:50px; background-color: #BA3A37; text-align: center; vertical-align: middle;  border: 2px solid #8B2321;  box-shadow: 0 2px 8px rgba(0,0,0,0.12);">
                        <div  style="display: table-cell; vertical-align: middle; color: white; font-size: 30px; font-weight:bold;">
                            <p style="margin-bottom:20px;margin-top:1px"> التقرير الدوري لليتيم  </p>
                            لعام {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- صورة اليتيم على اليسار -->
            <div style="float: left; width: 170px; height:220px; border:3px solid #BA3A37; border-radius:20px">
                <img src="{{ public_path('storage/' . $report->profile_image) }}" alt="صورة" width="100%" height="220px">
            </div>

        </div>

        {{-- الدولة  and عنوان الجهة المشرفة--}}
        <div style="width: 100%;margin-top:8px">
            <div style="width: 48%; float:right; overflow: hidden;">
                <p style="float: right; width:21%;" class="cell font"> الدولــــــة </p>
                <p style="float: left; width:75%;" class="cell border"> {{$report->fields['country']}} </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:43%;" class="cell font"> عنوان الجهة المشرفة </p>
                <p style="float: left; width:52%;" class="cell border"> {{$report->fields['supervising_authority_place']}} </p>
            </div>
        </div>

        {{-- اسم الكافل and رقم الكافل --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:21%;" class="cell font"> اسم الكافل </p>
                <p style="float: left; width:75%;" class="cell border"> {{$report->fields['sponsor_name']}} </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:21%;" class="cell font"> رقم الكافل</p>
                <p style="float: left; width:75%;" class="cell border"> {{$report->fields['sponsor_number']}} </p>
            </div>

        </div>

        {{--  اسم اليتيم and رقم اليتيم --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:21%;" class="cell font"> اسم اليتيم</p>
                <p style="float: left; width:75%;" class="cell border"> {{$report->orphan->name}} </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:21%;" class="cell font"> رقم اليتيم</p>
                <p style="float: left; width:75%;" class="cell border"> {{$report->orphan->internal_code}} </p>
            </div>

        </div>

        {{--  تاريخ الميلاد اليتيم and الجنس --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:21%;" class="cell font"> الجنس </p>
                <p style="float: left; width:75%;" class="cell border">  {{$report->orphan->gender ?? $report->fields['gender']}}  </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:33%;" class="cell font"> تاريخ ميلاد اليتيم </p>
                <p style="float: left; width:61%;" class="cell border"> {{$report->orphan->birth_date ?? $report->fields['birth_date']}} </p>
            </div>

        </div>

        {{--  رقم التيلفون and العنوان --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:21%;" class="cell font"> العنوان </p>
                    @php
                        $address = $report->orphan->profile->governorate . '/' . $report->orphan->profile->center . '/' . $report->orphan->profile->full_address;
                    @endphp

                <p style="float: left; width:75%;" class="cell border"> {{$address ?? $report->fields['address']}} </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:21%;" class="cell font"> العمر </p>
                @php
                    $birthDate = \Carbon\Carbon::parse($report->orphan->birth_date);
                    $years = $birthDate->age;
                    $months = $birthDate->diffInMonths(now());
                @endphp
                
                

                <p style="float: left; width:75%;" class="cell border">
                    @if($years >= 1)
                        {{ $years }} سنة
                    @else
                        {{ $months }} شهر
                    @endif
                </p>
            </div>

        </div>

        <div style="width: 100%;margin-top:8px">
            <div style="width: 48%; float: right; overflow: hidden;">

                <p style="float: right; width:21%;" class="cell font"> حالة اليتم </p>
                <p style="float: left; width:75%;" class="cell border">  {{$report->orphan->case_type ?? $report->fields['case_type']}}   </p>

            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:24%;" class="cell font"> رقم التيلفون </p>
                <p style="float: left; width:72%;" class="cell border"> {{$report->orphan->phones[0]->phone_number}} </p>
            </div>
        </div>

        <p style="font-size: 25px;font-weight:bold;margin:auto;margin-top:18px;border-bottom:3px solid black;width:90px;padding-right:12px"> حالة اليتيم </p>

        {{--  اسم الأم and الحالة الصحية --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:27%;" class="cell font"> الحالة الصحية </p>
                <p style="float: left; width:68%;" class="cell border"> {{$report->orphan->health_status ?? $report->fields['health_status']}}  </p>
            </div>

            {{-- @if($report->orphan->health_status == "مريض" || $report->fields['health_status'] == "مريض")
                <div style="width:48%; float: left; overflow: hidden; text-align:center;">
                    <p style="float: right; width:27%;" class="cell font"> وصف المرض </p>
                    <p style="float: left; width:68%;" class="cell border">  {{$report->orphan->disease_description ?? $report->fields['disease_description']}}  </p>
                </div>
            @endif --}}
            
            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:24%;" class="cell font"> اسم الأم </p>
                <p style="float: left; width:71%;" class="cell border"> {{$report->orphan->profile->mother_name ?? $report->fields['mother_name']}}  </p>
            </div>

        </div>

        {{-- <div style="width: 100%;margin-top:8px">
            
        </div> --}}

        {{--  صلة القرابة and اسم المسؤول عن اليتيم--}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:44%;" class="cell font"> اسم المسؤول عن اليتيم </p>
                <p style="float: left; width:52%;" class="cell border"> {{$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']}}   </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:24%;" class="cell font"> صلة القرابة </p>
                <p style="float: left; width:71%;" class="cell border"> {{$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']}} </p>
            </div>

        </div>


        {{--  حفظه للقران and   السلوك الديني  --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:27%;" class="cell font"> السلوك الديني</p>
                <p style="float: left; width:68%;" class="cell border"> {{$report->fields['religious_behavior']}} </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:24%;" class="cell font"> حفظه للقران</p>
                <p style="float: left; width:71%;" class="cell border"> {{$report->fields['memorize_quran']}} جزء</p>
            </div>

        </div>


        {{--  المستوى الدراسي and   الصف --}}
        <div style="width: 100%;margin-top:8px">
            <div style="width:48%; float: right; overflow: hidden;">
                <p style="float: right; width:32%;" class="cell font"> الصف </p>
                <p style="float: left; width:64%;" class="cell border">  {{$report->orphan->profile->academic_stage ?? $report->fields['class']}} </p>
            </div>

            <div style="width: 48%;  float: left; text-align:center;">
                <p style="float: right; width:35%;" class="cell font"> المستوى الدراسي </p>
                <p style="float: left; width:60%;" class="cell border"> {{$report->fields['academic_level']}} </p>
            </div>

        </div>

        {{--  المستوى الدراسي and   الصف --}}
        <div style="width: 100%;margin-bottom:50px">
            <p style="font-size: 25px;font-weight:bold;margin:auto;margin-top:18px;border-bottom:3px solid black;width:250px;padding-right:12px"> رسالة شكر و تقدير من اليتيم </p>
            <p style="margin-top:5px; width:100%; height:100px;border:2px solid #BA3A37;border-radius:20px" class="cell border"> {{$report->fields['letter_thanks']}} </p>
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




        <div>

            <div style="width:100%">

                <p style="font-size: 25px;font-weight:bold;margin:30 auto;border-bottom:3px solid black;width:200px;padding-right:12px;">  شهادة ميـــــــلاد اليتيم  </p>

                <img src="{{ public_path('storage/' . $report->orphan->image->birth_certificate) }}" alt="صورة" width="650px" height="850px">

                <div style="margin-top:60px;border-top: 2px solid #BA3A37; border-bottom: 2px solid #BA3A37; padding: 5px 0; font-size: 12px; color: #d48d8d; font-family: arial; direction: rtl;">

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




        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <p style="font-size: 25px;font-weight:bold;margin:30 auto;border-bottom:3px solid black;width:220px;padding-right:12px">  الشهادة الدراســــــــــــــــية  </p>

            <img src="{{ public_path('storage/' . $report->academic_certificate) }}" alt="صورة" width="650px" height="850px">

            <div style="margin-top:60px;border-top: 2px solid #BA3A37; border-bottom: 2px solid #BA3A37; padding: 5px 0; font-size: 12px; color: #d48d8d; font-family: arial; direction: rtl;">

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

        @if($report->orphan->health_status == "مريض" || $report->fields['health_status'] == "مريض")
            <div style="page-break-after: always;"></div>

            <div>

                <p style="font-size: 25px;font-weight:bold;margin:20 auto;border-bottom:3px solid black;width:130px;padding-right:12px">   التقرير الطبي  </p>

                <img src="{{ public_path('storage/' . $report->orphan->image->medical_report) }}" alt="صورة" width="650px" height="850px">

                <div style="margin-top:40px;border-top: 2px solid #BA3A37; border-bottom: 2px solid #BA3A37; padding: 5px 0; font-size: 12px; color: #d48d8d; font-family: arial; direction: rtl;">

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
        @endif

        @if($report->payment_receipt)
            <div style="page-break-after: always;"></div>

            <div>

                <p style="font-size: 25px;font-weight:bold;margin:30 auto;border-bottom:3px solid black;width:350px;padding-right:12px"> إيصال تحويل مبلغ الكفالة الي حساب اليتيم </p>

                <img src="{{ public_path('storage/' . $report->payment_receipt) }}" alt="صورة" width="650px" height="850px">

                <div style="margin-top:60px;border-top: 2px solid #BA3A37; border-bottom: 2px solid #BA3A37; padding: 5px 0; font-size: 12px; color: #d48d8d; font-family: arial; direction: rtl;">

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
        @endif


    </div>

</body>

</html>
