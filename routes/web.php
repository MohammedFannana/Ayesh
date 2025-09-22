<?php

use App\Models\FirstLineFamily;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\DashboardAccess;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\ApplyUserLanguage;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\ReviewOrphanController;
use App\Http\Controllers\WaitingOrphanController;
use App\Http\Controllers\ArchivedOrphanController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\CertifiedOrphanController;
use App\Http\Controllers\FirstLineFamilyController;
use App\Http\Controllers\MarketingOrphanController;


use App\Http\Controllers\SponsoredOrphanController;
use App\Http\Controllers\OrphanAttachmentController;
use App\Http\Controllers\RegisteredOrphanController;
use App\Http\Controllers\AlbarFollowReportController;


use App\Http\Controllers\AccreditationOrphanController;
use App\Http\Controllers\OrphanSupporterFieldValueController;
use App\Http\Controllers\UploadExcel\UploadExcelController;



Route::middleware(ApplyUserLanguage::class)->group(function(){

    Route::get('/' , [HomeController::class , 'index'])->name('home');
    Route::get('/complaint/create' , [ComplaintController::class , 'create'])->name('complaint.create');
    Route::post('/complaint' , [ComplaintController::class , 'store'])->name('complaint.store');

});


// 'verified'
Route::middleware(['auth' , ApplyUserLanguage::class])->group(function(){

    Route::middleware('can:access-admin')->group(function(){

        Route::resource('/supporter' , SupporterController::class);
        Route::get('/supporter/incoming/statements/{supporter}' , [SupporterController::class , 'incomingStatements'])->name('supporter.income.statement');
        Route::get('/supporter/list/sponsored/{supporter}' , [SupporterController::class , 'ListSponsored'])->name('supporter.list.sponsored');

        Route::resource('/donor' , DonorController::class);
        Route::get('/donor/incoming/statements/{donor}' , [DonorController::class , 'incomingStatements'])->name('donor.income.statement');
        Route::get('/donor/list/sponsored/{donor}' , [DonorController::class , 'ListSponsored'])->name('donor.list.sponsored');

        Route::get('/orphans/import', [UploadExcelController::class, 'index'])->name('orphans.excel.index');
        Route::post('/orphans/import', [UploadExcelController::class, 'import'])->name('orphans.excel.import');


        Route::resource('/volunteer' , VolunteerController::class);


        Route::prefix('orphans')->name('orphan.')->group(function(){


            // CertifiedOrphanController الحالات المعتمدة
            Route::resource('/certified' , CertifiedOrphanController::class);
            Route::get('/certified/details/{details}' , [CertifiedOrphanController::class , 'details'])->name('certified.details');
            Route::post('/convert/marketing' , [CertifiedOrphanController::class , 'convertToMarketing'])->name('convert.marketing');


            // MarketingOrphanController الحالات المقدمة للتسويق
            Route::resource('/marketing' , MarketingOrphanController::class);
            Route::get('/marketing/{supporterId}/complete/{orphanId}' , [MarketingOrphanController::class , 'create'])->name('marketing.create');
            Route::get('/generate-pdf', [MarketingOrphanController::class, 'generatePDF'])->name('generate.pdf');
            // Route::get('/marketing' , [MarketingOrphanController::class , 'index'])->name('marketing.index');
            // Route::get('/marketing/{marketing}' , [MarketingOrphanController::class , 'show'])->name('marketing.show');
            // Route::delete('/marketing/{marketing}' , [MarketingOrphanController::class , 'destroy'])->name('marketing.destroy');

            // OrphanSupporterFieldValueController  تخزين بيانات اليتيم الخاصة بالجمعية
            //follow for MarketingOrphanController
            Route::post('marketing/alBer/store' , [OrphanSupporterFieldValueController::class , 'alBerStore'])->name('marketing.alBer.store');
            Route::post('marketing/sharjah/store' , [OrphanSupporterFieldValueController::class , 'sharjahStore'])->name('marketing.sharjah.store');
            Route::post('marketing/group/store' , [OrphanSupporterFieldValueController::class , 'groupStore'])->name('marketing.group.store');


            //WaitingOrphanController
            Route::get('/waiting', [WaitingOrphanController::class, 'index'])->name('waiting.index');
            Route::post('/waiting/{orphanId}', [WaitingOrphanController::class, 'store'])->name('waiting.store');
            Route::get('/waiting/{waiting}', [WaitingOrphanController::class, 'show'])->name('waiting.show');
            Route::delete('/waiting/{waiting}', [WaitingOrphanController::class, 'destroy'])->name('waiting.destroy');

            //SponsoredOrphanController  الايتام المكفولين
            Route::get('/sponsored', [SponsoredOrphanController::class, 'index'])->name('sponsored.index');
            Route::get('/sponsored/{sponsored}', [SponsoredOrphanController::class, 'show'])->name('sponsored.show');
            Route::get('/sponsored/transfer/{transfer}' , [SponsoredOrphanController::class ,'transfers'])->name('transfer.show');
            Route::delete('/sponsored/{sponsored}', [SponsoredOrphanController::class, 'destroy'])->name('sponsored.destroy');
            Route::get('/convert/archived/{orphanId}', [SponsoredOrphanController::class, 'convertArchived'])->name('convert.archived');


            //ArchivedOrphanController الحالات المؤرشفة
            Route::get('/archived', [ArchivedOrphanController::class, 'index'])->name('archived.index');
            Route::get('/archived/{archived}', [ArchivedOrphanController::class, 'show'])->name('archived.show');
            Route::delete('/archived/{archived}', [ArchivedOrphanController::class, 'destroy'])->name('archived.destroy');

        });

        Route::resource('/family' , FirstLineFamilyController::class);

        // BalanceController المبالغ المقبوضة
        Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');
        Route::get('/balance/create', [BalanceController::class, 'create'])->name('balance.create');
        Route::post('/balance', [BalanceController::class, 'store'])->name('balance.store');
        Route::delete('/balance/{balance}', [BalanceController::class, 'destroy'])->name('balance.destroy');


        // ReportController التقارير
        // Route::get('/report/{report}', [ReportController::class, 'index'])->name('report.index'); //index route
        Route::get('/report/{report}/create', [ReportController::class, 'create'])->name('report.create'); //create route
        Route::post('Albar/report', [ReportController::class, 'AlbarStore'])->name('report.Albar.store'); //Albar store route
        Route::post('sharjah/report', [ReportController::class, 'SharjahStore'])->name('report.sharjah.store'); //sharjah store route
        Route::post('maryam/report', [ReportController::class, 'MaryamStore'])->name('report.maryam.store'); //maryam store route
        Route::post('dubai/report', [ReportController::class, 'DubaiStore'])->name('report.dubai.store'); //dubai store route
        // Route::put('/report/{report}/{supporter_id}' , [ReportController::class , 'update'])->name('report.update'); //update route
        // Route::get('/download-report/{report}', [ReportController::class, 'DownloadReport'])->name('download.report');



        Route::get('alber/follow/report/create' , [AlbarFollowReportController::class , 'create'])->name('report.follow.albar.create');
        Route::post('alber/follow/report' , [AlbarFollowReportController::class , 'store'])->name('report.follow.albar.store');
        Route::delete('alber/follow/report/{id}' , [AlbarFollowReportController::class , 'destroy'])->name('report.follow.albar.delete');
        // Route::get('uplode/sponsor/file' , [AlbarFollowReportController::class , 'uploadeFile'])->name('uplode.sponsor.file');



        Route::get('files' , [FileController::class , 'index'])->name('file.index');
        Route::get('/files/categories', [FileController::class, 'getCategories']);
        Route::post('files' , [FileController::class , 'store'])->name('file.store');

        Route::middleware(DashboardAccess::class)->as('dashboard.')->prefix('dashboard')->group(function () {

            Route::resource('/user' , UserController::class);

        });


    });

    Route::resource('/report' , ReportController::class)->except('create');
    Route::get('/report/{report}', [ReportController::class, 'index'])->name('report.index'); //index route
    Route::put('/report/{report}/{supporter_id}' , [ReportController::class , 'update'])->name('report.update'); //update route
    Route::get('/download-report/{report}', [ReportController::class, 'DownloadReport'])->name('download.report');
    Route::get('alber/follow/report' , [AlbarFollowReportController::class , 'index'])->name('report.follow.albar.index');
    Route::get('download/alber/follow/report/{id}' , [AlbarFollowReportController::class , 'createReport'])->name('report.follow.albar.download');

    Route::prefix('orphans')->name('orphan.')->group(function(){
        //image Controller
        Route::get('/image/show' , [ImageController::class , 'index'])->name('image');
        Route::get('/download-image/{file}', [ImageController::class, 'download'])->name('image.download');
        // Route::get('/download/visa/{file}', [ImageController::class, 'visaDownload'])->name('visa.download');

    });



    // registered صلاحيات
    Route::prefix('orphans')->name('orphan.')->middleware(['can:access-registrations'])->group(function(){
        Route::resource('/registered', RegisteredOrphanController::class);
        Route::get('/registered/details/{registered}', [RegisteredOrphanController::class, 'details'])->name('registered.details');
    });

    // review صلاحيات
    Route::prefix('orphans')->name('orphan.')->middleware(['can:access-review'])->group(function(){
        // Review Controller
        Route::get('/review', [ReviewOrphanController::class, 'index'])->name('review.index');
        Route::post('/review/{orphanId}', [ReviewOrphanController::class, 'store'])->name('review.store');
        Route::get('/review/{review}', [ReviewOrphanController::class, 'show'])->name('review.show');
        Route::delete('/review/{review}', [ReviewOrphanController::class, 'destroy'])->name('review.destroy');
    });

    // Marketer صلاحيات
    Route::prefix('orphans')->name('orphan.')->middleware(['can:access-marketer'])->group(function(){
        // Review Controller
            Route::resource('/marketing' , MarketingOrphanController::class);
            Route::get('/marketing/{supporterId}/complete/{orphanId}' , [MarketingOrphanController::class , 'create'])->name('marketing.create');
            Route::get('/generate-pdf', [MarketingOrphanController::class, 'generatePDF'])->name('generate.pdf');
            // Route::get('/marketing' , [MarketingOrphanController::class , 'index'])->name('marketing.index');
            // Route::get('/marketing/{marketing}' , [MarketingOrphanController::class , 'show'])->name('marketing.show');
            // Route::delete('/marketing/{marketing}' , [MarketingOrphanController::class , 'destroy'])->name('marketing.destroy');

            // OrphanSupporterFieldValueController  تخزين بيانات اليتيم الخاصة بالجمعية
            //follow for MarketingOrphanController
            Route::post('marketing/alBer/store' , [OrphanSupporterFieldValueController::class , 'alBerStore'])->name('marketing.alBer.store');
            Route::post('marketing/sharjah/store' , [OrphanSupporterFieldValueController::class , 'sharjahStore'])->name('marketing.sharjah.store');
            Route::post('marketing/group/store' , [OrphanSupporterFieldValueController::class , 'groupStore'])->name('marketing.group.store');

    });


    // certified صلاحيات
    Route::prefix('orphans')->name('orphan.')->middleware(['can:access-certified'])->group(function(){
        //  Accreditation Controller قيد الاعتماد
        Route::get('/accreditation', [AccreditationOrphanController::class, 'index'])->name('accreditation.index');
        Route::post('/accreditation/{orphanId}', [AccreditationOrphanController::class, 'store'])->name('accreditation.store');
        Route::get('/accreditation/{accreditation}', [AccreditationOrphanController::class, 'show'])->name('accreditation.show');
        Route::delete('/accreditation/{accreditation}', [AccreditationOrphanController::class, 'destroy'])->name('accreditation.destroy');

    });


    // financial صلاحيات
    Route::middleware(['can:access-financial'])->group(function(){
        // ExpenseController المبالغ المدفوعة
        Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
        Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
        Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
        Route::delete('/expenses/{expenses}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    });

    Route::post('locale/{locale}' , [LocaleController::class, 'changeLocale'])->name('locale.change');

    Route::get('/orphans/{orphan}/attachments/download-all', [OrphanAttachmentController::class, 'downloadAll'])
    ->name('attachments.download.all');

    // Route::get('/orphans/{orphan}/attachments/list', [OrphanAttachmentController::class, 'listAttachments'])->name('attachments.download.list');


    Route::get('/complaint' , [ComplaintController::class , 'index'])->name('complaint.index');

    Route::get('/notification' , [notificationController::class , 'index'])->name('notification.index');

    Route::get('/mark-as-read/{id}', function ($id) {
        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    })->name('markAsRead');


    Route::post('/send-email', [EmailController::class, 'send'])->name('send.email');


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/clear-all', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return 'All caches cleared!';
});

Route::get('/cache-all', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');


    return 'All caches cached!';
});


Route::get('/create/link', function () {

    symlink(base_path('storage/app/public'), base_path('public/storage'));
});


Route::get('/unzip-orphan', function () {
    $zipPath = storage_path('app/public/orphans/دار البر البرنامج القديم 3.zip');
    $extractTo = storage_path('app/public/orphans');

    if (!file_exists($zipPath)) {
        return "الملف غير موجود.";
    }

    $zip = new ZipArchive;

    if ($zip->open($zipPath) === TRUE) {
        $zip->extractTo($extractTo);
        $zip->close();
        return "تم فك الضغط بنجاح.";
    } else {
        return "فشل في فتح الملف.";
    }
});




require __DIR__.'/auth.php';
