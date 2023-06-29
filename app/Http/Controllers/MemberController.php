<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Member::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'unique:members',
            'name' => 'required',
            'address' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $member = new Member();
            $member->name = $request->name;
            $member->address = $request->address;
            $result = $member->save();
            if ($result) {
                return ["Result" => "data was saved"];
            } else {
                return ["Result" => "data not saved"];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'unique:mem$members',
            'name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $member = Member::find($id);
            $member->name = $request->name;
            $member->address = $request->address;
            $result = $member->save();
            if ($result) {
                return ["Result" => "data was update"];
            } else {
                return ["Result" => "data not update"];
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
