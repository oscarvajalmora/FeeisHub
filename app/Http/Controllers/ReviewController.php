<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReportedProfile;
use App\Models\FacebookGroup;
use Illuminate\Support\Str;
use App\Notifications\NewReview;

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

        // TODO: VERIFICAR QUE EL URL DEL PERFIL SEA EL MISMO DEL POST QUE COMPARTE

        $validated = $request->validate([
            'reporter_name' => 'required|min:5',
            'reporter_profile_link' => 'active_url|required|min:10',
            'affected_name' => 'required|min:5',
            'reported_profile_link' => 'active_url|required|min:10',
            'fb_post_link' => 'active_url|required',
            'feedback' => 'required|integer',
            'commentary' => 'nullable|string|max:140',
        ]);

        // remove all slash at the end of the string
        $request->reporter_profile_link = rtrim($request->reporter_profile_link, '/');
        $request->reported_profile_link = rtrim($request->reported_profile_link, '/');
        $request->fb_post_link = rtrim($request->fb_post_link, '/');

        do {
            $slug = 'R-' . Str::random(15);
            $resource = ReportedProfile::where('slug', $slug)->first();
            $slug_exist = $resource ? $resource->slug : '';
        } while ($slug_exist == $slug);

        $reported_profile = ReportedProfile::firstOrCreate(
            ['url' => $request->reported_profile_link],
            ['slug' => $slug]
        );

        $facebook_group = null;
        if($request->fb_group_name){
            $facebook_group = FacebookGroup::firstOrCreate(['name' => $request->fb_group_name]);
        }

        $review = Review::create([
            'reporter_name' => $request->reporter_name,
            'reporter_profile_link' => $request->reporter_profile_link,
            'affected_name' => $request->affected_name,
            'fb_post_link' => $request->fb_post_link,
            'feedback' => $request->feedback,
            'commentary' => $request->commentary,
            'reported_profile_id' => $reported_profile->id,
            'facebook_group_id' => $facebook_group ? $facebook_group->id : null
        ]);  

        $notification_data = $review->toArray();
        $notification_data['detail_url'] = route('reported.details', $reported_profile->slug);

        $review->notify(new NewReview($notification_data));
        return redirect()->back()->with('success', '¡Hemos publicado tu feedback! <a href="' . route('reported.details', $reported_profile->slug) . '" class="alert-link">Revísalo aquí<a/>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $reported_profile = ReportedProfile::where('slug', $slug)->with(['reviews', 'reviews.facebookGroup'])->firstOrFail();
        $feedback_positive = $reported_profile->reviews()->where('feedback', 1)->count();
        $feedback_negative = $reported_profile->reviews()->where('feedback', 0)->count();

        return view('reported-details', [
            'reported' => $reported_profile,
            'feedback_positive_count' => $feedback_positive,
            'feedback_negative_count' => $feedback_negative
        ]);
    }


}
