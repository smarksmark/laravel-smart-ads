<?php

namespace Smarksmark\LaravelSmartAds\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Smarksmark\LaravelSmartAds\Models\SmartAd;
use Smarksmark\LaravelSmartAds\LaravelSmartAdsFacade;
use Smarksmark\LaravelSmartAds\Http\Requests\StoreSmartAdRequest;

class SmartAdManagerController extends Controller
{

    public function dashboard()
    {
        return view('smart-ads::smart-ad-manager.dashboard');
    }

    public function index()
    {
        $smartAds = SmartAd::orderBy('enabled', 'DESC')->orderBy('name')->paginate(10);
        $totalClicks = SmartAd::sum('clicks');
        return view('smart-ads::smart-ad-manager.index', compact('smartAds', 'totalClicks'));
    }

    public function show(SmartAd $smartAd)
    {
        return view('smart-ads::smart-ad-manager.show', compact('smartAd'));
    }

    public function create()
    {
        return view('smart-ads::smart-ad-manager.create');
    }

    public function store(StoreSmartAdRequest $request)
    {

        if (isset($request->image)) {
            $imagePath = $request->file('image')->store('image', 'public');
        }

//        dd( $request->placements );
        $smartAd = SmartAd::create([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'adType' => $request->adType,
            'body' => isset($request->body) ? $request->body : null,
            'image' => isset($imagePath) ? $imagePath : null,
            'imageUrl' => $request->imageUrl,
            'imageAlt' => $request->imageAlt,
            'enabled' => true,
            'placements' => !empty(json_decode($request->placements)[0]->selector) ? $request->placements : null,
        ]);

        return redirect(route('smart-ads-show', $smartAd->id))->with(['message' => 'Ad Created', 'color' => 'green']);

//        return redirect("/smart-ad-manager/ads/{$smartAd->id}")->with(['message' => 'Ad Created', 'color' => 'green']);
    }

    public function edit(SmartAd $smartAd)
    {
        return view('smart-ads::smart-ad-manager.edit', compact('smartAd'));
    }

    public function update(StoreSmartAdRequest $request, SmartAd $smartAd)
    {

        $smartAd->name = $request->name;
        $smartAd->placements = $request->placements;
        if ($request->adType == 'HTML') {
            $smartAd->image = null;
            $smartAd->imageUrl = null;
            $smartAd->imageAlt = null;
            $smartAd->body = $request->body;
        } elseif ($request->adType == 'IMAGE') {
            if (isset($request->image)) {
                $imagePath = $request->file('image')->store('image', 'public');
                $smartAd->image = $imagePath;
            }

            $smartAd->imageUrl = isset($request->imageUrl) ? $request->imageUrl : null;
            $smartAd->imageAlt = isset($request->imageAlt) ? $request->imageAlt : null;
        }
        $smartAd->adType = $request->adType;

        $smartAd->save();
        return redirect(route('smart-ads-show', $smartAd->id))->with(['message' => 'Ad Edited', 'color' => 'green']);
    }

    public function delete(SmartAd $smartAd)
    {
        $smartAd->delete();
        return redirect(route('smart-ads-index'))->with(['message' => 'Ad Deleted', 'color' => 'green']);
    }

    public function autoAds()
    {
        $ads = SmartAd::whereNotNull('placements')->get();
        return $ads;
    }

    /**
     * Adds click count to the add
     */
    public function updateClicks(Request $request)
    {
        $slug = $request->get('slug');
        LaravelSmartAdsFacade::updateClicks($slug);
    }

    //*Enable the Ad */
    public function enable(SmartAd $smartAd)
    {
        $smartAd->enabled = true;
        $smartAd->save();
        return redirect(route('smart-ads-index'))->with(['message' => 'Ad Enabled', 'color' => 'green']);
    }

    //*Disable the Ad */
    public function disable(SmartAd $smartAd)
    {
        $smartAd->enabled = false;
        $smartAd->save();
        return redirect(route('smart-ads-index'))->with(['message' => 'Ad Disabled', 'color' => 'green']);
    }

    protected function slug($data)
    {
        $ex = explode(' ', $data);
        return implode('-', $ex);
    }
}

