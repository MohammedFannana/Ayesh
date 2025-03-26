<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrphanReviewNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $reviewer; // اسم المراجع
    public $status; // حالة الطلب (مقبول / مرفوض)
    public $message; // الرسالة الموجهة للمستخدم

    public function __construct($reviewer, $status, $message)
    {
        $this->reviewer = $reviewer;
        $this->status = $status;
        $this->message = $message;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // return ['mail'];
        return ['database']; // سيتم تخزين الإشعار في قاعدة البيانات

    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase($notifiable)
    {
        return [
            'reviewer' => $this->reviewer, // اسم الشخص الذي قام بالمراجعة
            'status' => $this->status, // الحالة (approved / rejected)
            'message' => $this->message, // الرسالة الموجهة للمستخدم
            'time' => now()->format('Y-m-d H:i:s'), // وقت الإشعار
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
