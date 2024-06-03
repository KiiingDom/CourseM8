<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class OnboardingController extends Controller
{
    public function show()
    {
        return view('onboarding');
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $user->update($request->only(['study_time', 'study_location']));

            // Assign tags based on the answers
            $tags = [];
            if ($request->study_time === 'Early Morning') {
                $tags[] = Tag::firstOrCreate(['name' => 'Early Morning'])->id;
            }
            if ($request->study_location === 'Library') {
                $tags[] = Tag::firstOrCreate(['name' => 'Library'])->id;
            }

            $user->tags()->sync($tags);

            $user->onboarding_completed = true;
            $user->save();

            return redirect('/home');
        } catch (\Exception $e) {
            // Handle the exception here
            // You can log the error, display a friendly error message, or perform any other necessary actions
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }
}
