<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;

use App\User;

class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $callbackUser = Socialite::driver($provider)->user();

        $user = NULL;

        //check if user with callback email already exists or not.
        $checkUser =  $this->userExist($callbackUser->email);

        if($checkUser){
            //if email already exists
            //create a user instance with callback email for login
            $user = User::where('email', $callbackUser->email)->first();
            $this->login($user);
            
        }elseif(!$checkUser){
            //if email does not exists
            //create a new user with callback credentials
            $user = new User;
            $user->name = $callbackUser->name;
            $user->email = $callbackUser->email;
            $user->password = bcrypt(str_random(16));
            $user->verified = true;
            $user->save();
            //login user
            $this->login($user);

        }else{
            //Logic for, if a user denies the login request or something else go wrong.
            return "khkfshfksdhfsdfh";
        }

        return redirect()->intended();   
    }



    /**
     * Check if user with provided email exist.
     *
     * @return boolean
     */
    protected function userExist($email)
    {
        if(User::where('email', $email)->first()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Login user.
     *
     * @return redirect
     */
    protected function login($user)
    {
        auth()->login($user, true);

    }
     
}