<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReportedProfile;
use Illuminate\Support\Str;

class ReviewController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('send-review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reporter_name' => 'required|min:5',
            'reporter_profile_link' => 'active_url|required|min:10',
            'affected_name' => 'required|min:5',
            'affected_profile_link' => 'active_url|required|min:10',
            'fb_group_name' => 'nullable|min:5',
            'fb_group_link' => 'nullable|active_url|min:10',
            'fb_post_link' => 'active_url|required',
            'feedback' => 'required|integer',
            'commentary' => 'nullable|string|max:140',
        ]);
        
        do {
            $slug = 'R-' . Str::random(15);
            $resource = ReportedProfile::where('slug', $slug)->first();
            $slug_exist = $resource ? $resource->slug : '';
        } while ($slug_exist == $slug);

        $reported_profile = ReportedProfile::firstOrCreate(
            ['url' => $request->affected_profile_link],
            ['slug' => $slug]
        );

        $review = Review::create([
            'reporter_name' => $request->reporter_name,
            'reporter_profile_link' => $request->reporter_profile_link,
            'affected_name' => $request->affected_name,
            'fb_group_name' => $request->fb_group_name,
            'fb_group_link' => $request->fb_group_link,
            'fb_post_link' => $request->fb_post_link,
            'feedback' => $request->feedback,
            'commentary' => $request->commentary,
            'reported_profile_id' => $reported_profile->id
        ]);

        return redirect()->back()->with('success', 'Hemos publicado tu rebiiu. ¡Recuerda que puedes compartirla para ayudar a la comunidad!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $reported_profile = ReportedProfile::where('slug', $slug)->with('reviews')->firstOrFail();
        $feedback_positive = $reported_profile->reviews()->where('feedback', 1)->count();
        $feedback_negative = $reported_profile->reviews()->where('feedback', 0)->count();

        return view('reported-details', [
            'reported' => $reported_profile,
            'feedback_positive_count' => $feedback_positive,
            'feedback_negative_count' => $feedback_negative
        ]);
    }


}
