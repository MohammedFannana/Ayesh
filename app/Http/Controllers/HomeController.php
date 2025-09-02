<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Donor;
use App\Models\Expense;
use App\Models\File;
use App\Models\FirstLineFamily;
use App\Models\Orphan;
use App\Models\Report;
use App\Models\Supporter;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Models\ExpenseOrphan;


class HomeController extends Controller
{
    public function index(){
        $orphan_count = Orphan::count();
        $supporter_count = Supporter::count();
        $donor_count = Donor::count();
        $volunteer_count = Volunteer::count();
        $first_line_family_count = FirstLineFamily::count();
        $file_count = File::count();
        $report_count = Report::count();
        $balance_amount = Balance::sum('amount');
        $expense_amount = ExpenseOrphan::sum('net_amount');

        //orphan
        $orphan_registered_count = Orphan::where('status' , 'registered')->count();
        $orphan_under_review_count = Orphan::where('status' , 'under_review')->count();
        $orphan_approved_count = Orphan::where('status' , 'approved')->count();
        $orphan_marketing_count = Orphan::where('status' , 'marketing_provider')->count();
        $orphan_waiting_count = Orphan::where('status' , 'waiting')->count();
        $orphan_sponsored_count = Orphan::where('status' , 'sponsored')->count();
        $orphan_archived_count = Orphan::where('status' , 'archived')->count();




        return view('pages.index' , compact([
            'orphan_count','supporter_count','donor_count','volunteer_count','first_line_family_count','file_count',
            'report_count','balance_amount','expense_amount','orphan_registered_count','orphan_under_review_count',
            'orphan_approved_count','orphan_marketing_count','orphan_waiting_count','orphan_sponsored_count',
            'orphan_archived_count'
        ]));
    }
}
