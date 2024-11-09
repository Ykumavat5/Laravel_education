<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Enrollment;
use App\Notifications\CourseEndNotification;
use Carbon\Carbon;

class NotifyCourseEnd extends Command
{
    protected $signature = 'notify:courses-end';
    protected $description = 'Notify users when their enrollments are about to end';

    public function handle()
    {

        $currentDate = Carbon::now();
        $currentWeek = $currentDate->copy()->addWeek();
        $enrollments = Enrollment::with('course', 'user')
            ->whereNotNull('ends_at')
            ->whereBetween('ends_at', [$currentDate, $currentWeek])
            ->get();

        foreach ($enrollments as $enrollment) {
            $enrollment->user->user->notify(new CourseEndNotification($enrollment->course));
        }

        $this->info('Notifications sent for enrollments ending this week.');
    }
}
