<?php

namespace App\Http\Controllers;

use App\Invite;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	//$invites = Invite::where('user_id', Auth::user()->id)->get();
    	$invites = DB::table('users')
    				->join('invites', 'users.id', '=' ,'invites.account_id')
    				->select('users.*')
    				->get();
    	return view('invite.index', compact('invites'));
    }

    public function store(Request $request)
    {
    	$data = request()->validate([
    		'email'	=> ['email','required','unique:users'],
    	]);

    	$user = User::create([
    		'email' => $data['email'],
    	]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);
        
    	Invite::create([
    		'user_id'	=> Auth::user()->id,
    		'account_id'	=> $user->id,
    	]);

    	return redirect('invite');
    }

    public function resend($user)
    {
        $user = User::find($user);
        
        if($user->verified == '0'){
            Mail::to($email)->send(new VerifyMail($user));
        }

        return redirect('invite');

    }
}
