<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class QuestionnaireController extends Controller
{
    public function show($id)
    {
        // Ensure the user has access to this questionnaire
        $user = Auth::user();
        if ($user->id != $id) {
            // Handle unauthorized access
            return redirect('/home');
        }

        return view('questionnaire');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
    
        $user->update([
            'course' => $request->input('course'),
            'year_of_study' => $request->input('year_of_study'),
            'major' => $request->input('major'),
            'career_aspirations' => $request->input('career_aspirations'),
            'study_preferences' => implode(',', $request->input('study_preferences')),
            'study_location' => implode(',', $request->input('study_location')),
            'study_method' => $request->input('study_method'),
            'learning_style' => $request->input('learning_style'),
            'note_taking' => implode(',', $request->input('note_taking')),
            'review_method' => implode(',', $request->input('review_method')),
            'group_size' => $request->input('group_size'),
            'study_frequency' => $request->input('study_frequency'),
            'collaboration_tools' => implode(',', $request->input('collaboration_tools')),
        ]);
    
        return redirect()->route('matching-results')->with('success', 'Questionnaire submitted successfully.');
    }
}
