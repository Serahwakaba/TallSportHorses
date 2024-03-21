<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\HorseAd;
use Illuminate\Console\Command;

class CheckExpiredAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-expired-ads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Task:CheckExpiredAds Starting...');

        HorseAd::where('expired', 0)->where('published', 1)->get()->map(function ($ad) {
            $diff = now()->diffInDays(Carbon::parse($ad->publish_date));

            if ($diff > 180) {
                $ad->expired = true;

                return $ad->save();
            }

            return;
        });
    }
}
