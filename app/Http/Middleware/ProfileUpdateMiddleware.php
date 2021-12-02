<?php

namespace App\Http\Middleware;

use Closure;

class ProfileUpdateMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (auth()->user()->name == null) {




            if (\Request::segment(1) == 'en') {

                if ($request->route()->getName() != 'en.quiz_profile') {
                    $request->session()->flash('error', "You must update your profile information before visiting other pages.");
                    return redirect()->route('en.quiz_profile');
                }
            } else {
                if ($request->route()->getName() != 'quiz_profile') {
                    $request->session()->flash('error', "অন‌্য মেনুতে যাবার আগে আপনি আপনার প্রোফাইল ডাটা আপডেট করুন।");
                    return redirect()->route('quiz_profile');
                }
            }
        }

        return $next($request);
    }

}
