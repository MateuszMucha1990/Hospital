<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype =='0')
            {
                $doctors = Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else {
           return redirect()->back();
        }

    }


    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctors = Doctor::all();
            return view('user.home',compact('doctors'));
        }
    }



    public function appointment(Request $request)
    {
        $data = new Appointment();

        $data->name = $request->name1;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progrss';

        if(Auth::id())
        {
            $data->user_id = Auth::User()->id;
        }

        $data->save();
        return redirect()
        ->back()
        ->with('message', 'You made appointment sucessfully!');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userId=Auth::user()->id;
            $appoints =Appointment::where('user_id', $userId)->get();

            return view ('user.my_appointment',compact('appoints'));
        }else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);
        $data->delete();

        return redirect()->back();
    }
}
