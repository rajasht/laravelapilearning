<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    //

    public function getAllData(){
        return Device::all();
    }

    // multiple CRUD operation remaining
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

        if($dvc){
            return ["result"=>"Data Updated Successfully."];
        }
        else{
            return ["result"=>"Operation Failed."];
        }
    }

    public function deleteDevice($delReq){

        $device = Device::where('Name',$delReq)->delete();

        if($device){
            return ["result"=>"Data Deleted Successfully."];
        }
        else{
            return ["result"=>"Operation Failed."];
        }
    }

    public function searchData($searchObj){

        $res =  Device::where('Name','like','%'.$searchObj.'%')->get();

        if(count($res)>0)
        {
            return $res;
        }
        else
        {
            return "NO RESULT FOUND.";
        }
    }

    public function validateData(Request $reqVal){
        
        $rules = array("Name"=>"required","Price"=>"required |min:3|max:5)","Origin"=>"Required");

        $checkpoints = Validator::make($reqVal->all(),$rules);

        if($checkpoints->fails()){
            // return $checkpoints->errors();
            return response ()->json($checkpoints->errors(),401);
        }
        else{
            // $req = $reqVal;
            // addDevice($req);
            $dev = new Device;
        
            $dev->Name = $reqVal->Name;
            $dev->Price = $reqVal->Price;
            $dev->Origin = $reqVal->Origin;

            $res = $dev->save();

            if($res){
                return ["result"=>"Data Saved Successfully."];
            }
            else{
                return ["result"=>"Operation Failed."];
            }

            // return ["result"=>"Data Updated After Validation."];
        }

    }
}
