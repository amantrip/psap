<?php

class AdminController extends \BaseController {

    static $COLORS = [
        'NC' => 'white',
        'O'  => 'red',
        'A'  => 'green',
        'M'  => 'yellow',
        'S'  => 'blue'
    ];
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

        $user = Auth::user(); #get user

        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'private'){
            return Redirect::to('/private');
        }

        $entries = Registry::all();#->take(100);
        return View::make('admin.index', ['entries' => $entries, 'colors' => static::$COLORS]);
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
        if($user->type == 'private'){
            return Redirect::to('/private');
        }

        return View:: make('admin.reset');
    }

    /*
     * The reset password view POSTS to resetPassword().
     */

    public function resetPassword(){

        $user = Auth:: user();

        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'private'){
            return Redirect::to('/private');
        }

        $admin = Admin:: find($user->id);


        if(Input::get('newpassword') == Input::get('repassword')){ #validate new password
            $admin->password = Hash::make(Input::get('newpassword'));
            $admin->save();

            $message = "Password Reset Successful!";
            return View::make('admin.success', ['message' => $message]);
        }

        $message = "Passwords Entered Do Not Match! Please Re-Try!";
        return View::make('admin.error', ['message' => $message]);

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
        if($admin->type == 'private'){
            return Redirect::to('/private');
        }

        return View::make('admin.edit', ['admin' => $admin]);
    }

    /*
     * Edit Profile View POSTS to editProfile()
     * editProfile() gets from User Input and updates the Admin table in the database
     */

    public function editProfile(){

        $admin = Auth::user();

        #check user type and make sure the user has rights to access this page else redirect
        if($admin->type == 'private'){
            return Redirect::to('/private');
        }

        $admin->name = Input::get('name');
        $admin->company = Input::get('company');
        $admin->save();


        $message = "Profile Successfully Updated!";
        return View::make('admin.success', ['message' => $message]);

    }



    /*
     * renderManageAdminView() checks if user is authenticated and renders manage admin view
     */
    public function renderManageAdminView()
    {
        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user();

        #User must be of Admin type to be able to manage other admin
        if($user->type == 'private'){
            return Redirect::to('/private');
        }

        $admins = Admin:: all();
        return View::make('admin.manage', ['admins' => $admins]);
    }

    /*
     * deleteAdmin($id) deletes admin users with user id = $id
     */

    public function deleteAdmin($id){

        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        #Admin cannot delete themselves
        $user = Auth::user();
        if($user->id == $id){
            $message = "You cannot delete yourself!";
            return View::make('admin.error', ['message' => $message]);
        }

        #User must be of Admin type to be able to manage other admin
        if($user->type == 'private'){
            $message = "You Don't have access rights to Delete Admin";
            return View::make('admin.error', ['message' => $message]);
        }

        #delete admin with user id = $id
        $admin = Admin::find($id);
        $admin->delete();

        return Redirect::to('/admin/manage');
    }

    /*
     * This function is called when renderAddAdminView() is called. This function renders the add admin which consists of a form to
     * add new Admin.
     */


	public function renderAddAdminView()
	{
        # Authenticate User
        if(! Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user(); #get user

        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'private'){
            return Redirect::to('/private');
        }

		return View::make('admin.add');
	}

    /*
     * The add admin view POSTS to this function. This function first checks if the email has already been added, then creates a new
     * admin user, assigns access code which is email to the new admin user.
     */

    public function addAdmin(){

        $user = Auth::user(); #get user

        #check user type and make sure the user has rights to access this page else redirect
        if($user->type == 'private'){
            return Redirect::to('/private');
        }

        #Check if an admin user with the input email already exists
        if(Admin::where('email', '=', Input::get('email'))->count() > 0){
            $message = "Fatal Error! Admin with this email already exists!";
            return View::make('admin.error', ['message' => $message]);
        }

        #Generate a random access code for email verification
        $accesscode = Str::random(5);

        $type = Input::get('type');

        #create user with access code and email ID
        Admin::create([
            'email' => Input::get('email'),
            'accesscode' => $accesscode,
            'type' => $type ,
            'verified' => 'No'
        ]);

        #Send the new user an email with accesscode
        $email_data = [
            'recipient' => Input::get('email'),
            'subject' => 'PSAP Database: Verification Code'
        ];

        $view_data = [
            'accesscode' => $accesscode,
            'type' => Input::get('type')
        ];

        Mail::send('emails.verify', $view_data, function($message) use ($email_data){
           $message->to($email_data['recipient'])
               ->subject($email_data['subject']);
        });

        #return to manage page
        return Redirect::to('/admin/manage');
    }


	public function destroy()
	{
        Session::flush();
        Auth::logout();
        return Redirect::to('/');
	}


}
