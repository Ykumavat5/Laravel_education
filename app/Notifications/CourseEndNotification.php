<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CourseEndNotification extends Notification
{
    use Queueable;

    protected $course;

    public function __construct($course)
    {
        $this->course = $course;
    }

    public function via($notifiable)
    {
        return ['mail']; // Choose notification channels
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Your course "' . $this->course->title . '" is ending soon on ,if you wish to continue linkdly buy the subscription')
            ->action('View Course', route('courses.view', $this->course->id))
            ->line('Thank you for being with us!');
    }

    public function toArray($notifiable)
    {
        return [
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'ends_at' => $this->course->ends_at,
        ];
    }
}
