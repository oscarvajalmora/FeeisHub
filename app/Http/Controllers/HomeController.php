<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportedProfile;
use App\Models\ProfileSearch;
use App\Notifications\ProfileSearch as ProfileSearchNotify;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function searchProfile(Request $request){

        $validated = $request->validate([
            'url' => 'required|active_url|min:15'
            ]);
            
        $urlCleaned = rtrim($validated['url'], '/');

        
        // save search
        $profile_search = ProfileSearch::create([
            'url' => $urlCleaned
            ]);
        
        $profile_search->notify(new ProfileSearchNotify($urlCleaned));
            
        $reported_profile = ReportedProfile::where('url', $urlCleaned)->first();

        if($reported_profile){
            return redirect()->route('reported.details', $reported_profile->slug);
        }

        return back()->with('error', true);
    }
}
