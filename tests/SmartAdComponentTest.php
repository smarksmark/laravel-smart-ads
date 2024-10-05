<?php

namespace Smarksmark\LaravelSmartAds\Tests;

use Livewire\Livewire;
use Smarksmark\LaravelSmartAds\Models\SmartAd;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Smarksmark\LaravelSmartAds\Http\Livewire\SmartAdComponent;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Smarksmark\LaravelSmartAds\Tests\LaravelSmartAdsTestCase as TestCase;


class SmartAdComponentTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function it_asserts_component_renders_the_ad(){
        $smartAd = SmartAd::factory()->create(['name'=> 'test-ad', 'body' => 'Hello']);

        $view = $this->blade(
            '<x-smart-ad-component slug='.$smartAd->slug.'/>',
        );

        $view->assertSee($smartAd->body);

    }

    
}