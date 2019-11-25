<?php

namespace App\Http\Controllers;

use Calender;
use App\User;
use App\Schedule;
use App\Classes\CPanelClass;
use App\Events\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        broadcast(new Chat('some data'));

        $schedules = [];
        $data = Schedule::get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $schedules[] = \Calendar::event(
                    $value->schedule,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    null,
                    
                );
            }
        }

        $calendar = \Calendar::addEvents($schedules);
        return view('home', compact('calendar'));
    }
    public function account()
    {
        return view('auth/account');
    }
    public function update(User $user)
    {
        $validated = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name'  => ['required', 'min:3'],
            'username'   => ['required', 'min:3', 'unique:users'],
            'password'   => ['required', 'min:6'],
        ]);
        
        $user->update([
            'first_name'    => $validated['first_name'],
            'last_name'     => $validated['last_name'],
            'username'      => $validated['username'],
            'password'      => Hash::make($validated['password']),
            'database_name' => 'etax_user_'.$user->id.'',
            'user_type'     => 'regular',
        ]);

        DB::statement("CREATE DATABASE `etax_user_".$user->id."`");

        return redirect('/home');
    }

    public function regular(User $user)
    {
        
        $user->update([
            'user_type'     => 'regular',
            'status'     => 'Active',
        ]);

        return redirect('/home');
    }
    


}
