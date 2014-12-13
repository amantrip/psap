<?php

class PrivateController extends \BaseController {

    /*
     * renderIndexView() checks if the user has been authenticated and renders the home page for Admin type users.
     * If the user has not been authenticated, the user is redirected to the login page
     */
    public function renderIndexView()
    {
        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user(); #get current user


        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'admin'){ #only private type users have rights to access this page
            return Redirect::to('/admin');
        }


        $entries = [];

        #get all entry ids for this user
        $entry_id = Owners:: where('owner_id', '=', $user->id)->get();


        #create an array of entries owned by this user
        for($i = 0; $i < count($entry_id); $i++){

            $temp_entry = Registry:: where('psapid', '=', $entry_id[$i]->psapid)->get();
            $entries[] = $temp_entry; #append to final resulting array

        }



        #NOTE: $entries is a 2D array, so to access each entry, $entry[0]->psapid

        return View::make('private.index', ['entries' => $entries]);
    }


    /*
     * renderResetPasswordView() first checks if the user is authenticated, and renders the reset password view which consists of a reset
     * password form.
     */

    public function renderResetPasswordView()
    {
        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user(); #get user

        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'admin'){
            return Redirect::to('/admin');
        }

        return View:: make('private.reset');
    }

    /*
     * The reset password view POSTS to resetPassword().
     */

    public function resetPassword(){

        $user = Auth:: user();


        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'admin'){
            return Redirect::to('/admin');
        }

        $admin = Admin:: find($user->id);


        if(Input::get('newpassword') == Input::get('repassword')){ #validate new password
            $admin->password = Hash::make(Input::get('newpassword'));
            $admin->save();

            $message = "Password Reset Successful!";
            return View::make('private.success', ['message' => $message]);
        }

        $message = "Passwords Entered Do Not Match! Please Re-Try!";
        return View::make('private.error', ['message' => $message]);

    }


    /*
     * renderEditProfileView() renders edit profile view for admin type users if the user is already authenticated
     */

    public function renderEditProfileView(){
        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $admin = Auth::user();

        #check user type and make sure the user has rights to access this page else redirect
        if($admin->type == 'admin'){
            return Redirect::to('/admin');
        }

        return View::make('private.edit', ['admin' => $admin]);
    }

    /*
     * Edit Profile View POSTS to editProfile()
     * editProfile() gets from User Input and updates the Admin table in the database
     */

    public function editProfile(){

        $admin = Auth::user();

        #check user type and make sure the user has rights to access this page else redirect
        if($admin->type == 'admin'){
            return Redirect::to('/admin');
        }

        $admin->name = Input::get('name');
        $admin->company = Input::get('company');
        $admin->save();

        $message = "Profile Successfully Updated!";
        return View::make('private.success', ['message' => $message]);

    }


}
