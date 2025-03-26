<?php

namespace App\Listeners;

use App\Events\OrphanReviewed;
use App\Models\User;
use App\Notifications\OrphanReviewNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrphanReviewNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrphanReviewed $event)
    {
        $review = $event->review;
        $orphan = $event->orphan;

        // إرسال إشعار للمُعتمد عند مراجعة المراجع الأول
        if ($review->review_number === 'first') {
            $approver = User::where('type', 'certified')->first();
            $registrar = User::where('type', 'registered')->first();

            if($review->status === 'approved'){
                if ($approver) {
                    $approver->notify(new OrphanReviewNotification(
                        "المراجع الأول",
                        "طلب بحاجة للموافقة النهائية",
                        "يرجى مراجعة طلب اليتيم: {$orphan->name}"
                    ));
                }
            }

            if ($registrar) {
                $statusMessage = $review->status === 'approved'
                    ? " تم مراجعة طلب اليتيم مراجعة أولية وقبوله{$orphan->name}."
                    : "تم رفض طلب اليتيم {$orphan->name}. سبب الرفض: {$review->rejected_reason}";

                $registrar->notify(new OrphanReviewNotification(
                    "المعتمد",
                    $review->status,
                    $statusMessage
                ));
            }
        }

        // إرسال إشعار للمُسجل عند القبول أو الرفض النهائي
        if ($review->review_number === 'final') {
            // $registrar = User::find($orphan->registrar_id);
            $registrar = User::where('type', 'registered')->first();

            if ($registrar) {
                $statusMessage = $review->status === 'approved'
                    ? "تم قبول طلب اليتيم {$orphan->name}. الرجاء التوجه لأقرب فرع بأصول الأوراق."
                    : "تم رفض طلب اليتيم {$orphan->name}. سبب الرفض: {$review->rejected_reason}";

                $registrar->notify(new OrphanReviewNotification(
                    "المعتمد",
                    $review->status,
                    $statusMessage
                ));
            }
        }
    }
}
