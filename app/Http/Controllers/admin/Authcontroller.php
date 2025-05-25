<?php

namespace App\Http\Controllers\admin;

use Auth;
use Hash;
use alert;
use Validator;
use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;

class Authcontroller extends Controller
{

    use ApiResponse;
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|unique:users,email',
            'password'=> 'required|string|min:6'
        ]);

        if($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);

        }

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }
    public function saveprofile(Request $request)
    {
        $user = User::updateOrCreate(
            [
                'id' => Auth::user()->id

            ],
            [

                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone
            ]






        );

    return $this->success([], 'successfully Update');
    }
    public function createAdmin()
    {

        $user = new User();
        $user->name = 'seller123';
        $user->email = 'seller132@gmail.com';
        $user->password = Hash::make('1234');
        $user->save();
        $admin = roles::where('slug', 'Seller')->first();
        $user->roles()->attach($admin);
        return redirect()->back();
    }



    public function loginuser(Request $request)
    {



        //  $valdation = Validator::make($request->all, [

        //     'emails' => 'required|string|exists::users,email',
        //     'password' => 'required|string|min:6'
        // ]);

        // if ($valdation->fails()) {
        //     return response()->json(['status' => 400, 'message' => $valdation->errors()->first()]);

        // } else {
        $cred = array('email' => $request->emails, 'password' => $request->password);
        if (Auth::attempt($cred, false)) {
            if (Auth::user()->hasRole('admin')) {
                return response()->json(['status' => 200, 'message' => 'Ad Usser', 'url' => 'admin/dashboard']);
            } else {
                return response()->json(['status' => 200, 'message' => 'non Usser']);
            }

        } else {
            return response()->json(['status' => 404, 'message', 'Wrong Credientials']);
        }


    }
    public function login(Request $request)
    {

        $validation = Validator::make($request->all(),[
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);
        if($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);

        }
        $data  = $request->all();
        if (!Auth::attempt($data)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'user' => auth()->user()
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
