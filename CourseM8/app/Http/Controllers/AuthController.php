<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
 * Get a JWT via given credentials.
 *
 * @return \Illuminate\Http\JsonResponse
 */

 public function signup() 
 {
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

 }

 
 public function login()
 {
 $credentials = request(['email', 'password']);
 if (! $token = auth()->attempt($credentials)) {
 return response()->json(['error' => 'Unauthorized'], 401);
 }
 return response()->json([
 'message' => 'Login Successful!',
 'access_token' => $token,
 ]);
}
/**
* Log the user out (Invalidate the token).
*
* @return \Illuminate\Http\JsonResponse
*/
public function logout()
{
auth()->logout();
return response()->json(['message' => 'Successfully logged out']);
 }
}
