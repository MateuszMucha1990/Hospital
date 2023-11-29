<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }


    public function upload(Request $request)
    {
        $doctor = new doctor();
        $image = $request->file;

        $imageName=time(). '.'. $image->getClientOriginalName();

        $request->file->move('doctorimage', $imageName);

        //zapisywanie do db
        $doctor->image =$imageName;
        $doctor->name =$request->name;   //$doctor->name= zapisanie do db danym z formularza: $request->name
        $doctor->phoone =$request->number;
        $doctor->speciality =$request->speciality;
        $doctor->room =$request->room;

        $doctor->save();

        return redirect()
            ->back()
            ->with('message', 'Addect sucessfully');
    }

    public function showAppointments()
    {
        $data = Appointment::all();

        return view('admin.showappointments',compact('data'));
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status ='approved';
        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appointment::find($id);
        $data->status ='Canceled';
        $data->save();

        return redirect()->back();
    }

    public function showDoctor()
    {
        $doctors = Doctor::all();

        return view('admin.showdoctor',compact('doctors'));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()
            ->back()
            ->with('message', 'Are you sure?');
    }

    public function updatedoctor($id)
    {
        $doctors = Doctor::find($id);
        return view('admin.update_doctor',compact('doctors'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->name =$request->name;
        $doctor->phoone =$request->number;
        $doctor->speciality =$request->speciality;
        $doctor->room =$request->room;

        $image =$request->file;

        if($image){
            $imageName = time() .'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage', $imageName);
            $doctor->image=$imageName;
        }

        $doctor->save();

        return redirect()->back();
    }
}
