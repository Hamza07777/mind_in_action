<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashborad_home()
    {
        $male=User::where('gender', 1)->count();
        $female=User::where('gender', 2)->count();
        $user_count=User::all()->count();

        $male_perc=intval(($male/$user_count)*100);
        $female_perc=intval(($female/$user_count)*100);

        $male_employee=employee::where('gender', 'male')->count();
        $female_employee=employee::where('gender', 'female')->count();
        $user_count_employee=employee::all()->count();

        $male_perc_employee=intval(($male_employee/$user_count_employee)*100);
        $female_perc_employee=intval(($female_employee/$user_count_employee)*100);
        return view('dashborad')->with('male',$male_perc)->with('female',$female_perc)->with('user_count',$user_count)
        ->with('male_perc_employee',$male_perc_employee)->with('female_perc_employee',$female_perc_employee)->with('user_count_employee',$user_count_employee);
    }
    public function performance($id)
    {
        $sum_quiz = subject::where('uid',$id)->sum('quiz_marks');
        $sum_quiz_total = subject::where('uid',$id)->sum('total_marks');
        $performance_average=intval(($sum_quiz/$sum_quiz_total)*100);

        $perfo=subject::where('uid',$id)->get();
        return view('Users.performance')->with('perfo',$perfo)->with('average',$performance_average);
    }
    
}
