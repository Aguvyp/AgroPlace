<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user)
    {
        $latestTweets = $user->tweets()->latest()->take(10)->get();
        $latestReplies = $user->replies()->latest()->take(10)->get();

        return view(('user.profile'), [
            'user' =>$user,
            'latestTweets' => $latestTweets,
            'latestReplies' => $latestReplies
        ]);
    }
}
