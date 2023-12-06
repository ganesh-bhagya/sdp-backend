<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    function getUsersList()
    {
        return User::all();
    }

    function createUser(Request $req)
    {
        $rules = array(
            "Username" => "required | min:5",
            "Password" => "required | min:8",
            "Email" => "required | email",
            "ContactNo" => "required | size:10",
        );

        $validator = Validator::make($req->all(),$rules);

        if($validator->fails())
        {
            return $validator->errors();
        }
        else
        {
            $data = DB::table('users')->where('Username',$req['Username'])->first();

            if($data)
            {
                return ["Result"=>"Username Already Available"];
            }
            else
            {
                $user = new User();

                $user->Username = $req->Username;
                $user->Password = $req->Password;
                $user->UserType = 0;
                $user->Email = $req->Email;
                $user->ContactNo = $req->ContactNo;
                $user->Status = 1;
                $result = $user->save();
        
                if($result)
                {
                    return ["Result"=>"User Created Successfully"];
                }
                else
                {
                    return ["Result"=>"Operation failed"];
                }
            }
        }
    }

    function loginUser(Request $req)
    {
        $data = DB::table('users')->where('Username',$req['Username'])->first();
        
        if($data)
        {
            if($req['Password'] == $data->Password)
            {
                $req->session()->put('UserID',$data->id);
                $req->session()->put('Username',$req->input("Username"));
                $req->session()->put('UserType',$data->UserType);
                $req->session()->put('Status',$data->Status);

                $token = $data->createToken("API TOKEN")->plainTextToken;

                return response()->json([
                    'status'=>200,
                    'message'=>'Password Matching',
                    'user' => $data,
                    'token' => $token
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>500,
                    'message'=>'Password Not Matching'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'=>400,
                'errors'=>'Invalid Username'
            ]);
        }
    }
}
