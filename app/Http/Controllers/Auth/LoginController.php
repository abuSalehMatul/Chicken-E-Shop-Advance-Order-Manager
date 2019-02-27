<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Socialite;
use App\User;
use Auth;
class LoginController extends Controller
{
   

    use AuthenticatesUsers;

    
    protected $redirectTo = '/makeorder';

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from twitter.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {
        if ($service == 'facebook') {
            $user = Socialite::driver($service)->user();
          
        } else {
            $user = Socialite::driver($service)->stateless()->user();
        }
        $findUser =User::where('email', $user->getEmail())->first();
        if ($findUser) {
            Auth::login($findUser);
        } else {
            $newUser = new User;
            $newUser->email = $user->getEmail();
            $newUser->first_name = $user->getName();
          
           
            $newUser->role=1;
            $newUser->status=0;
            $newUser->cell_number1=null;
            $newUser->password = bcrypt(123456);
            $newUser->created_at=null;
            $newUser->updated_at=null;
            $newUser->save();
            Auth::login($newUser);
        }
        return Redirect::to('/makeorder');
    }
}
