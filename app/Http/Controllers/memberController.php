<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Device;
use App\Models\Member;
use Illuminate\Http\Request;

class memberController extends Controller
{
    //
    function list()
    {
        $data = Member::paginate(2);
        return view(
            'memberDatabase.list',
            ["data" => $data]
        );
    }

    function add(Request $request)
    {
        $member = new Member;
        $member->name = $request->username;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->save();
    }

    function delete($id)
    {

        $dataDelete = Member::find($id);
        $nameDelete = json_decode($dataDelete)->name;
        $dataDelete->delete();
        $data = Member::paginate(2);
        redirect("/database/fetch");
        return  view("memberDatabase.list", ["data" => $data, "nameDelete" => $nameDelete]);
    }
    
    function showData($id){
       $editData =  Member::find($id);
       return view("memberDatabase.edit" , ["editData" => $editData]);
    }

    function edit(Request $req)
    {

        $editData = Member::find($req->id);
        
        $editData->name = $req->username;
        $editData->email = $req->email;
        $editData->address = $req->address;
        $editData->save();
      
        return redirect("/database/fetch");
     
        
    }

    function OneToOne(){
         return Member::find(39)->getCompany;
    }
    
    function OneToOneInverse(){
        return Company::find(6)->getMember;
    }
    function OneToMany(){
        return Member::find(41)->getDevice;
    }
    function OneToManyInverse(){
        return Device::find(4)->getMember;
    }
    
}
