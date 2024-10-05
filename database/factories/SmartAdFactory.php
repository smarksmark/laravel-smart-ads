<?php

namespace Smarksmark\LaravelSmartAds\Database\Factories;

use Smarksmark\LaravelSmartAds\Models\SmartAd;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmartAdFactory extends Factory
{
    protected $model = SmartAd::class;

    public function definition()
    {
        $adname = fake()->word.' '.fake()->word;
        return [
            'name' => $adname,
            'body' => fake()->randomHtml(),
            'adType' => 'HTML',
            'slug' => implode('-', explode(' ', $adname))
        ];
    }
}