<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    //

    public function getAllData(){
        return Device::all();
    }


    // multiple argument passing required
    // validation through request folder

    public function getSomedata($origin){
        return Device::where('origin',$origin)->get();
    }

    public function addDevice(Request $req){
        
        $dev = new Device;
        
        $dev->Name = $req->Name;
        $dev->Price = $req->Price;
        $dev->Origin = $req->Origin;

        $res = $dev->save();

        if($res){
            return ["result"=>"Data Saved Successfully."];
        }
        else{
            return ["result"=>"Operation Failed."];
        }    
    }

    public function updateDevice(Request $req){

        $dvc = Device::where('Name',$req->Name)
        ->update([
                "Price"=> $req->Price,
                "Origin"=> $req->Origin,
                "Name"=> $req->Name
        ]);

        // print_r($req->Name); exit;

        // print_r($dev); exit;

        // $dvc->Name = $req->Name;
        // $dvc->Price = $req->Price;
        // $dvc->Origin = $req->Origin;

        // $res1 = $dvc->save();

        if($dvc){
            return ["result"=>"Data Updated Successfully."];
        }
        else{
            return ["result"=>"Operation Failed."];
        }
    }

    public function deleteDevice(Request $delReq){

        $device = Device::where('Name',$delReq->Name);
        $result = $device->delete();

        if($result){
            return ["result"=>"Data Deleted Successfully."];
        }
        else{
            return ["result"=>"Operation Failed."];
        }
    }
}
