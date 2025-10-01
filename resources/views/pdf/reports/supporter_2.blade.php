<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        /* body {
            font-family: 'Tajawal';
            direction: rtl;
            margin: auto !important;
            margin-top: 2px !important;
            padding: 0 !important;
            width: 210mm !important;
            height: 297mm !important;
            box-sizing: border-box !important;
        } */

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

        .background{
            background-image: url("{{ public_path('image/sharjah/background.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            /* padding: 15px 25px 0 25px; */
            box-sizing: border-box;
        }

    </style>

</head>

<body>


    <div class="container">

        {{-- 1 --}}
        <div>

            <div style="width:100%; height:568px; background: url('{{ public_path('image/sharjah/page1.png') }}') no-repeat center top; background-size: cover; text-align:center;">

                <p style="padding-top:50%;margin-right:-28% ;color:#1d1dfe;font-size:23px;font-weight:bold" class="cell"> {{$report->orphan->name}} </p>

                <p style="padding-top:5%;margin-right:-10%;color:#1d1dfe;font-size:23px;font-weight:bold" class="cell"> {{$report->orphan->sponsorship->external_code}} </p>

            </div>

            <div style="width:100%; height:550px; background: url('{{ public_path('image/sharjah/page2.png') }}') no-repeat center top; background-size: cover; text-align:center;">
                @php
                    use Carbon\Carbon;
                    $from = Carbon::parse($report->created_at);
                    $months = (int) $report->fields['month_number'];
                    $to = (clone $from)->addMonths($months);
                    $fromFormatted = $from->format('m-Y');
                    $toFormatted   = $to->format('m-Y');
                @endphp
                <p style="padding-top:13%;margin-right:-5% ;color:#fb0100;font-size:30px;font-weight:bold" class="cell"> {{$fromFormatted}} حتي {{$toFormatted}} </p>

            </div>

        </div>

        <div style="page-break-after: always;"></div>

        {{-- 2 --}}
        <div>

            <div>

                <div style="width:100%; height:590px; background: url('{{ public_path('image/sharjah/header.png') }}') no-repeat center top; background-size: cover; text-align:center;">

                    <p style="padding-top: 31.5%;margin-right:30% ;color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                         {{-- {{$report->fields['sponsor_code']}}  --}}
                    </p>

                    <div style="float">
                        <p style="float:right;width:75% ;padding-top: 3% ; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['sponsor_name']}} --}}
                        </p>
                        <p style="float:left;width:23%;margin-left:4.5% ;padding-top: 2.8%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['sponsor_phone']}}  --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:90% ;padding-top: 3.2% ; color:#1d1dfe;font-size:18px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['sponsor_email']}} --}}
                            </p>
                        <p style="float:left;width:26% ;padding-top: -3.5%; color:#1d1dfe;font-size:18px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['sponsor_mailbox']}} --}}
                            </p>
                    </div>

                    <p style="padding-top:3.5%;float:right;width:100%;color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                         {{-- {{$report->fields['sponsor_address']}} --}}
                        </p>

                </div>


                <div style="width:100%; height:527px; background: url('{{ public_path('image/sharjah/header1.png') }}') no-repeat center top; background-size: cover; text-align:center;">


                    <div style="float">
                        <p style="float:right;width:68% ;padding-top: 1.4% ; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->name}} --}}
                        </p>
                        <p style="float:left;width:29% ;padding-top: 1.7%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->case_type ?? $report->fields['case_type']}} --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:65% ;padding-top: 2.4% ; color:#1d1dfe;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->birth_place ?? $report->fields['birth_place']}} --}}
                            </p>
                        <p style="float:left;width:29% ;padding-top: 2.4%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->gender ?? $report->fields['gender']}} --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:58% ;padding-top: 2.8% ; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->birth_date ?? $report->fields['birth_date']}} --}}
                            </p>
                        <p style="float:right ;padding-right:-43%;padding-top: 2.3%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->age ?? $report->fields['age']}} --}}
                             </p>
                    </div>

                    <p style="padding-top:0.5%;float:right;width:100%;color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                         {{-- {{$report->orphan->getFieldValueByDatabaseName('reason_continuing_sponsorship') ?? $report->fields['reason_continuing_sponsorship']}} --}}
                        </p>

                    <div style="float">
                        <p style="float:right ;width:65% ;padding-top:3.7%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->profile->father_death_date ?? $report->fields['father_death_date']}} --}}
                            </p>
                        <p style="float:left ;padding-right:-34%;padding-top: 4.5%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->profile->mother_name ?? $report->fields['mother_name']}} --}}
                             </p>
                    </div>

                    <div style="float">
                        <p style="float:right;padding-top:2.3%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                             {{-- {{$report->orphan->profile->mother_death_date ?? 'غير متوفاة' }} --}}
                            </p>
                        <p style="float:left;padding-right:80%;padding-top: -4%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->family->family_number ?? $report->fields['family_number']}} --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:67% ;padding-top: 2.7% ; color:#1d1dfe;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']}} --}}
                            </p>
                        <p style="float:left;width:29% ;padding-top: 2.2%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']}} --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:58% ;padding-top: 2.7% ; color:#1d1dfe;font-weight:bold" class="cell">
                             {{-- {{$report->orphan->phones[0]->phone_number ?? $report->fields['phone_number']}} --}}
                            </p>
                        <p style="float:left;width:38% ;padding-top: 2.4%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                            {{-- {{$report->orphan->getFieldValueByDatabaseName('whatsapp_phone') ?? $report->fields['whatsapp_phone']}} --}}
                        </p>
                    </div>



                </div>

            </div>

        </div>

        <div style="page-break-after: always;"></div>

        {{-- 3 --}}
        <div>

            <div>

                <div style="width:100%; height:545x; background: url('{{ public_path('image/sharjah/page3.png') }}') no-repeat center top; background-size: cover; text-align:center;">


                    <div style="float">
                        <p style="margin-right:-35%;padding-top: 20.7% ; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['live_mother']}} --}}
                            </p>
                        <p style="float:left;width:68%;margin-right:-100%: left;padding-top: -4.5%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                             {{-- {{$report->fields['reason_live']}} --}}
                            </p>
                    </div>

                    <p style="padding-top:1%;float:right;width:100%;color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                        {{-- {{$report->orphan->family->housing_type ?? $report->fields['housing_type']}} --}}
                    </p>

                    <p style="padding-top:2.8%;margin-right:5%;color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                         {{-- {{$report->fields['conditions_orphan']}} --}}
                        </p>


                    <div style="float">
                        <p style="float:right;width:47% ;padding-top: 13% ; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->health_status ?? $report->fields['health_status']}} --}}
                            </p>
                        <p style="float:left;width:34% ;padding-top: 12.5%; color:#1d1dfe;font-size:16px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['chronic_disease']}} --}}
                            </p>
                    </div>

                    <p style="padding-top:1.8%;margin-right:-34%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                        {{-- {{$report->orphan->disease_description ?? $report->fields['disease_description']  ?? '-' }} --}}
                    </p>


                </div>

                <div style="width:100%; height:575px; background: url('{{ public_path('image/sharjah/page4.png') }}') no-repeat center top; background-size: cover; text-align:center;">


                    <div style="float">
                        <p style="float:right;width:65% ;padding-top: 1.2% ; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->orphan->profile->academic_stage ?? $report->fields['academic_stage']}} --}}
                            </p>
                        <p style="float:left;width:28% ;padding-top: 1%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['academic_level']}} --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:45%;margin-right:12.5% ;padding-top: 2% ; color:#1d1dfe;font-size:18px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['reason_notStudying']}} --}}
                            </p>
                        <p style="float:left;width:47% ;padding-top: -3%; color:#1d1dfe;font-size:18px;font-weight:bold" class="cell">
                             {{-- {{$report->fields['alternative_approach']}} --}}
                            </p>
                    </div>

                    <p style="padding-top: 2%;margin-right:13%;width:100%;color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                          {{-- {{$report->fields['actions_supervisor']}} --}}
                        </p>


                    <div style="float">
                        <p style="float:right;width:58% ;padding-top: 9.4% ; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['regular_praying']}} --}}
                            </p>
                        <p style="float:right ;padding-right:8%;padding-top: 10%; color:#1d1dfe;font-size:18px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['actions_supervisor_praying']}} --}}
                            </p>
                    </div>

                    <div style="float">
                        <p style="float:right;width:58% ;padding-top: 2.5% ; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['ramadan_fasting']}} --}}
                            </p>
                        <p style="float:right ;padding-right:8%;padding-top: 2.5%; color:#1d1dfe;font-size:18px;font-weight:bold" class="cell">
                              {{-- {{$report->fields['actions_supervisor_ramadan']}} --}}
                            </p>
                    </div>

                    <p style="padding-top:2%;padding-right:29%;color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                         {{-- {{$report->fields['quran_memorized']}} --}}
                         </p>


                    <div style="float">
                        <div style="float:right ;width:60%">
                            <p style="float:right ;width:100%; padding-right:15% ; padding-top:4.4%; color:#1d1dfe;font-size:20px;font-weight:bold" class="cell">
                                   {{-- {{$report->fields['orphan_supervisor']}} --}}
                                </p>
                            <p style="float:right ;width:100% ;padding-top:3.5%; color:#1d1dfe;font-size:23px;font-weight:bold" class="cell">
                                  {{-- {{$report->fields['date']}} --}}
                            </p>
                            <p style="padding-top:48%; margin-right:20%" class="cell">
                                <img src="{{ public_path('storage/' . $report->signature) }}" alt="صورة" width="160px" height="60px">
                            </p>
                        </div>

                        <p style="padding-top:26%;margin-right:30%" class="cell">
                            <img src="{{ public_path('storage/' . $report->supporter_seal) }}" alt="صورة" width="130px" height="135px">
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div style="page-break-after: always;"></div>

        {{-- 4 --}}
        <div>

            <div>

                <div>

                    <img src="{{ public_path('image/sharjah/header-page.png') }}" alt="صورة" width="100%" height="295px">
                    <div style="width:100%; height:670px; background: url('{{ public_path('image/sharjah/background1.png') }}') no-repeat center top; background-size: cover; text-align:center;">
                        <img src="{{ public_path('storage/' . $report->group_photo) }}" alt="صورة" width="650px" height="100%" style="padding:40px 110px">
                    </div>
                    <img src="{{ public_path('image/sharjah/footer-page.png') }}" alt="صورة" width="100%" height="150px">

                </div>



            </div>

        </div>

        <div style="page-break-after: always;"></div>


        <div>

            <div>

                <img src="{{ public_path('image/sharjah/header-page1.png') }}" alt="صورة" width="100%" height="340px">
                <div style="width:100%; height:380px; background: url('{{ public_path('image/sharjah/background1.png') }}') no-repeat center top; background-size: cover; text-align:center;">
                    <img src="{{ public_path('storage/' . $report->thanks_letter) }}" alt="صورة" width="600px" height="80%">
                </div>
                <img src="{{ public_path('image/sharjah/footer-page.png') }}" alt="صورة" width="100%" height="140px">

            </div>

        </div>

        <div style="page-break-after: always;"></div>


        <div>

            <div>

                    <img src="{{ public_path('image/sharjah/header-page2.png') }}" alt="صورة" width="100%" height="380px">
                    <div style="width:100%;  background: url('{{ public_path('image/sharjah/background1.png') }}') no-repeat center top; background-size: cover; text-align:center;">
                        <img src="{{ public_path('storage/' . $report->academic_certificate) }}" alt="صورة" width="600px" height="490px">
                    </div>
                    <img src="{{ public_path('image/sharjah/footer-page1.png') }}" alt="صورة" width="100%" height="250px">

            </div>

        </div>

        <div style="page-break-after: always;"></div>

        <div>

            <div>

                <img src="{{ public_path('image/sharjah/header-page3.png') }}" alt="صورة" width="100%" height="280px">
                <div style="width:100%;  background: url('{{ public_path('image/sharjah/background1.png') }}') no-repeat center top; background-size: cover; text-align:center;">
                    <img src="{{ public_path('storage/' . $report->orphan->image->medical_report) }}" alt="صورة" width="640px" height="700px" style="padding:40px 110px">
                </div>
                <img src="{{ public_path('image/sharjah/footer-page.png') }}" alt="صورة" width="100%" height="165px">

            </div>

        </div>


        <div style="page-break-after: always;"></div>

        <div>

            <div>

                <img src="{{ public_path('image/sharjah/header-page4.png') }}" alt="صورة" width="100%" height="280px">
                <div style="width:100%;height:670px ; background: url('{{ public_path('image/sharjah/background1.png') }}') no-repeat center top; background-size: cover; text-align:center;">
                    <img src="{{ public_path('storage/' . $report->sponsorship_transfer_receipt) }}" alt="صورة" width="645px" height="100%" style="padding:40px 110px">
                </div>
                <img src="{{ public_path('image/sharjah/footer-page2.png') }}" alt="صورة" width="100%" height="168px">

            </div>

        </div>


    </div>

</body>
</html>
