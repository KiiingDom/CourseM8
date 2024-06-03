<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();

    $formattedUsers = $users->map(function ($user) {
        return [
            'id' => $user->id,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' =>$user->email,
            'password' =>$user->password,
            'bio' => $user->bio,
            'age' => $user->age,
            'studyAreas' => $user->studyAreas,
        ];
    });

    return response()->json(['message' => 'Users retrieved successfully', 'users' => $formattedUsers]);
}


    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'bio' => 'required',
            'age' => 'required',
            'studyAreas' => 'required',
        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->bio = $request->bio;
        $user->age = $request->age;
        $user->studyAreas = $request->studyAreas;

        $user->save();

        return response()->json(['message' => 'User created successfully', 'data' => $user], 201);
    }
}