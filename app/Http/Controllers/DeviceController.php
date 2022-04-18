<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index()
    {

        try {
            // $devices = DB::table('devices')->where('name', 'oppa')->first();
            $devices = Device::where('name', 'oppo')->firstOrFail();
            // if(!$devices){
            //     throw new ModelNotFoundException('Device not found ');
            // }
            $devices->load(['projects']);
            return $devices;
        } catch (RelationNotFoundException $exception) {
            // dump($exception->getMessage());
            // dump(get_class($exception));
            return "Relation Not Found";
        }
         catch (ModelNotFoundException $exception) {
            // dump($exception->getMessage());
            // dump(get_class($exception));
            return "Device Not Found";
            
        } 
    }

    public function accessor(){
        $first  = Device::find(1);
    //    $first->name =  Str::ucfirst($first->name);
        return $first;
    }

    public function mutator(){
        $device = new Device();
        $device->name = "NEW_DEVICE";
        $device->member_id = 3;
        $device->save();
    }

    public function softdelete(){
    //  Device::orderBy('id', 'desc')->first()->delete();
    // Device::where('id',18)->restore();
    Device::where('id',12)->forceDelete();
     return  Device::get();
    }
}
