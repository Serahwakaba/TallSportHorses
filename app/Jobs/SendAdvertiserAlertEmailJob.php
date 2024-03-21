<?php

namespace App\Jobs;

use App\Mail\AlertMail;
use App\Models\HorseAd;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAdvertiserAlertEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }


    public function handle()
    {

        $advertisers = HorseAd::join('users', 'horse_ads.user_id', '=', 'users.id')
            ->where('horse_ads.publish_date', '<', now()->subDays(14))
            ->where('horse_ads.published', true)
            ->pluck('users.email')
            ->unique();



        foreach ($advertisers as $advertiser) {



            $data = [
                'subject' => 'This is a test subject for advertisers',
                'view' => 'emails.advertiser-upsell',
                'message' => 'This is a test message for advertiser.',
            ];

            Mail::to($advertiser->email)->send(new AlertMail($data));
        }
    }
}
