<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function user_profile($name){
		$user = User::where('username', '=', $name)->get()->first();
		$profile = Profile::where('user_id', '=', $user->id)->get()->first();

		return view('profile')->withProfile($profile)->withName($name);
    }

    public function update(Request $request, $id){
    	$profile = Profile::where('user_id', '=', $id)->get()->first();
	    $profile->about = $request->about;

	    $profile->save();
	    return redirect()->route('my_gigs');
    }
}
