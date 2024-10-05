<?php

namespace Smarksmark\LaravelSmartAds\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Smarksmark\LaravelSmartAds\Database\Factories\SmartAdFactory;


class SmartAd extends Model{
    
    use HasFactory;

    protected $table = 'smart_ads';

    protected $guarded = [];

    protected static function newFactory()
    {
        return SmartAdFactory::new();
    }


}