<?php

namespace Smarksmark\LaravelSmartAds\Database\Factories;

use Smarksmark\LaravelSmartAds\Models\SmartAd;
use Illuminate\Database\Eloquent\Factories\Factory;
use Smarksmark\LaravelSmartAds\Models\SmartAdTracking;

class SmartAdTrackingFactory extends Factory
{
    protected $model = SmartAdTracking::class;

    public function definition()
    {
        return [
            'ad_clicks' => json_encode(['test' => "6"]),
            'totalClicks' => 5,
        ];
    }
}