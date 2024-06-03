<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MatchingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allUsers = User::where('id', '!=', $user->id)->get();
        $matchingResults = [];

        foreach ($allUsers as $potentialMatch) {
            $percentage = $this->calculateMatchingPercentage($user, $potentialMatch);
            $commonTags = $this->findCommonTags($user, $potentialMatch);
            $matchingResults[] = [
                'user' => $potentialMatch,
                'percentage' => $percentage,
                'commonTags' => $commonTags
            ];
        }

        return response()->json($matchingResults);
    }

    private function calculateMatchingPercentage($user, $potentialMatch)
    {
        $totalMatches = 0;
        $totalFields = 5; // Adjust based on the number of fields being matched

        // Study Preferences
        $userPreferences = explode(',', $user->study_preferences);
        $matchPreferences = explode(',', $potentialMatch->study_preferences);
        $totalMatches += count(array_intersect($userPreferences, $matchPreferences)) / count($userPreferences);

        // Study Locations
        $userLocations = explode(',', $user->study_location);
        $matchLocations = explode(',', $potentialMatch->study_location);
        $totalMatches += count(array_intersect($userLocations, $matchLocations)) / count($userLocations);

        // Note Taking
        $userNotes = explode(',', $user->note_taking);
        $matchNotes = explode(',', $potentialMatch->note_taking);
        $totalMatches += count(array_intersect($userNotes, $matchNotes)) / count($userNotes);

        // Review Methods
        $userReviews = explode(',', $user->review_method);
        $matchReviews = explode(',', $potentialMatch->review_method);
        $totalMatches += count(array_intersect($userReviews, $matchReviews)) / count($userReviews);

        // Collaboration Tools
        $userTools = explode(',', $user->collaboration_tools);
        $matchTools = explode(',', $potentialMatch->collaboration_tools);
        $totalMatches += count(array_intersect($userTools, $matchTools)) / count($userTools);

        // Calculate percentage match
        $percentage = ($totalMatches / $totalFields) * 100;

        return round($percentage);
    }

    private function findCommonTags($user, $potentialMatch)
    {
        return [
            'studyPreferences' => array_intersect(explode(',', $user->study_preferences), explode(',', $potentialMatch->study_preferences)),
            'studyLocations' => array_intersect(explode(',', $user->study_location), explode(',', $potentialMatch->study_location)),
            'noteTaking' => array_intersect(explode(',', $user->note_taking), explode(',', $potentialMatch->note_taking)),
            'reviewMethods' => array_intersect(explode(',', $user->review_method), explode(',', $potentialMatch->review_method)),
            'collaborationTools' => array_intersect(explode(',', $user->collaboration_tools), explode(',', $potentialMatch->collaboration_tools))
        ];
    }
}
