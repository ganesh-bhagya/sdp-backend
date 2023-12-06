<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ComplaintsController extends Controller
{
    function addComplaint(Request $req)
    {
        $rules = array(
            "Description" => "required",
            "Location" => "required",
            "InstitutionID"	=> "required",
        );

        $validator = Validator::make($req->all(),$rules);

        if($validator->fails())
        {
            return $validator->errors();
        }
        else
        {
            $complaint = new Complaint();

            $complaint->UserID = $req->UserID;
            $complaint->Description = $req->Description;
            $complaint->Location = $req->Location;
            $complaint->InstitutionID = $req->InstitutionID;

            $result = $complaint->save();
    
            if($result)
            {
                return ["Result"=>"Complaint Added Successfully"];
            }
            else
            {
                return ["Result"=>"Operation failed"];
            }
        }
    }


    function getComplaints()
    {
        return Complaint::all();
    }


    function selectComplaint($id)
    {
        $data = DB::table('complaints')->where('id',$id)->first();

        return $data;
    }


    function updateComplaint(Request $req)
    {
        $rules = array(
            "Description" => "required",
            "Location" => "required",
            "InstitutionID"	=> "required",
        );

        $validator = Validator::make($req->all(),$rules);

        if($validator->fails())
        {
            return $validator->errors();
        }
        else
        {
            $complaint = Complaint::find($req->ComplaintID);
            $complaint->Description	 = $req->Description;
            $complaint->Location	 = $req->Location;
            $complaint->InstitutionID = $req->InstitutionID;

            $result = $complaint->update();

            if($result)
            {
                return ["Result"=>"Complaint Updated Successfully"];
            }
            else
            {
                return ["Result"=>"Operation failed"];
            }
        }
    }


    function deleteComplaint($id)
    {
        $complaint = Complaint::find($id);
        $result = $complaint->delete();

        if($result)
        {
            return ["Result"=>"Complaint Deleted Successfully"];
        }
        else
        {
            return ["Result"=>"Operation failed"];
        }

    }


    function selectComplaintByUser($UserID)
    {
        $data = DB::table('complaints')->where('UserID',$UserID)->get();

        return $data;
    }
}
