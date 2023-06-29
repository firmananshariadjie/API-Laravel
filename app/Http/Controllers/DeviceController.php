<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    function list($id = null)
    {
        // return Device::all();
        return $id ? Device::find($id) : Device::all();
    }

    function add(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'unique:devices',
            'name' => 'required',
            'member_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $device = new Device;
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if ($result) {
                return ["Result" => "data was saved"];
            } else {
                return ["Result" => "data not saved"];
            }
        }
    }

    function update($id, Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'unique:devices',
            'name' => 'required',
            'member_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $device = Device::find($id);
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if ($result) {
                return ["Result" => "data was update"];
            } else {
                return ["Result" => "data not update"];
            }
        }
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {
            return ["Result" => "data was delete"];
        } else {
            return ["Result" => "data can't delete"];
        }
    }

    function search($name)
    {
        return Device::where("name", "like", "%" . $name . "%")->get();
    }
}
