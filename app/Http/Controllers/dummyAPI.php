<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

use Illuminate\Support\Facades\Validator as FacadesValidator;


class dummyAPI extends Controller
{
    //
    function getData($id)
    {
        return Device::find($id);
    }

    function saveData(Request $req)
    {
        $device = new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if ($result) {
            return ["result" => "data saved"];
        } else {
            return ["result" => "data not saved"];
        }
    }

    function update(Request $req)
    {
        $device  = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if ($result) {
            return ["result" => "data Updated"];
        } else {
            return ["result" => "data not Updated"];
        }
    }

    function delete(Request $req)
    {
        $device = Device::find($req->id);
        $result =  $device->delete();
        if ($result) {
            return ["result" => "deleted successfully"];
        } else {
            return ["result" => "deleted not successfully"];
        }
    }

    //  function search(Request $req){
    //      $searchData =  Device::where('name','like',$req->searchName)->get();
    //      return $searchData ;
    //  }

    function search($name)
    {
        $searchData =  Device::where('name', 'like', "%" . $name . "%")->get();
        return $searchData;
    }

    function Ourvalidate(Request $req)
    {
        $rules = [
            "member_id" => "required | min:2|max:3"
        ];

        $validator = FacadesValidator::make($req->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors() ,401) ;
        }
        else{
            $device = new Device;
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if ($result) {
                return ["result" => "data saved"];
            } else {
                return ["result" => "data not saved"];
            }

        }
    }

    function upload(Request $req){
        $result = $req->file('file_name')->store('apiDocs');
        return ["result" => $result] ;
    }
}
