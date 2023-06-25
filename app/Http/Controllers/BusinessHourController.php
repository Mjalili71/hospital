<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{




    public function index($id)
    {
        $data = Doctor::find($id);

        $businessHours = BusinessHour::all();
        return view('admin.business_hours', compact('businessHours', 'data'));
    }

    public function update(Request $request, $id)
    {

        $dat = Doctor::find($id);


        $data = array_values($request->all()['data']);

        foreach ($data as $row) {
         $row["doctor_id"] = $dat->id;
        }

        dd($data);

        $inputs['doctor_id'] = $dat->id;
;
        //    BusinessHour::query()->upsert($request->validated()['data'],['day']); 
        BusinessHour::upsert($data, ['day']);



        $businessHours = BusinessHour::create($inputs);

        //     $businessHours=new BusinessHour; 
        //     $businessHours->doctor_id=$dat->id; 
        dd($businessHours);


        return back();
    }



































    // public function update(Request $request ,$id)
    // {



    //      $dat=Doctor::find($id);


    //     $data=array_values($request->all()['data']);

    //     foreach($data as $row){
    //         $row["doctor_id"]= $dat->id;
    //         }
    //         BusinessHour::upsert($data,['day']);
    //         return back();
    //     }
}
       
        
        // $inputs['doctor_id'] = $dat->id;

        //    BusinessHour::query()->upsert($request->validated()['data'],['day']);
           
    
       
    
         
     


    
    //     $businessHours=new BusinessHour;
    //     $businessHours->doctor_id=$dat->id;
