<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
class userController extends Controller
{
   public function register(){
       return view('order.register');
   }
   public function create(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'pass' => 'required|min:6'

        ]);
        $data= Hash::make($request['pass']);
        $user=new User;
        $user->first_name=$request->first;
        $user->last_name =$request->last;
        $user->email =$request->email;
        $user->cell_number1 =$request->cell;
        $user->address =$request->address;
        $user->password =$data;
        $user->role=1;
        $user->status=0;
        $user->save();
        Auth::login($user);
        return Redirect::to('/makeorder');
       
       

   }
   public function logincustomer(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'

        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/makeorder');
        } else {
            return redirect()->back();
        }
       

   }
}
