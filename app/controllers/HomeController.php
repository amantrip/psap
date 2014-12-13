<?php

class HomeController extends BaseController {

	/*
	 *  This function is called when '/' route is accessed.
	 *  index() renders the home view which gives the user an option to access either public, private or admin pages
	*/

	public function index()
	{
		return View::make('home');
	}

    /*
 * renderLoginView() checks if the user is already authenticated, if not renders the login view with a form to collect credentials.
 * If the user is already authenticated, redirect the user to the Admin index page
 */

    public function renderLoginView()
    {
        #Check if user already authenticated
        if (Auth::check()){
            return Redirect::to('/admin');
        }

        #Render login view
        return View::make('login');
    }

    /*
     * The login form on the login view POSTS to loginAdmin(). This  method checks the Admin Model to authenticate user.
     * To ensure only 'Admin' type of Admin users access the Admin section of the portal, the function checks the Admin user type.
     * If the user is not of "Admin" type, then the user is redirected to the "Private Access" section of the portal.
     *
     * If the user's credentials do no match, we redirect back to the login back with input
     */

    public function loginAdmin()
    {

        if (Auth::attempt(Input::only('email', 'password'))){
            $user = Auth::user();

            # Check if the Admin has already verified their email address
            /*if($user->verified == 'No'){
                return Redirect::to('/register');
            }*/
            if($user->type == 'private'){
                return Redirect::to('/private');
            }else {
                return Redirect::to('/admin');
            }
        }

        return Redirect::back()->withInput();
    }

    /*
     * renders the registration view which consists of a form to register new admin
     */

    public function renderRegistrationView(){

        # Un-authenticate any user
        Auth::logout();

        #make the register
        return View::make('register');

    }

    /*
     * Registration View POSTS to register. First check if the email was registered and check if the access code matches.
     * Once both the email and access code are verified, update values in the database
     */

    public function register(){

        $message = "Error(s): ";

        if(Admin::where('email', '=', Input::get('email'))->count() > 0){ #check if the email ID has been registered
            $admin = Admin::where('email', '=', Input::get('email'))->first();


            if($admin->verified == 'no') { #check the user has already been verified

                if ($admin->accesscode == Input::get('accesscode')) { #check if the access code matches

                    $admin->password = Hash::make(Input::get('password')); # Passwords are stores after salting and hashing
                    $admin->name = Input::get('name');
                    $admin->company = Input::get('company');
                    $admin->verified = 'Yes';

                    $admin->save();
                    if ($admin->type == 'private') {
                        return Redirect::to('/private');
                    } else {
                        return Redirect::to('/admin');
                    }

                } else { #access code did not match
                    $message = $message . "Access Code did not match! ";
                }
            }else{ #already verified
                $message = $message."This account has already been verified! ";
            }

        }else{ # Email is not registered

            $message = $message."Email is not registered! Please email us at am4227@columbia.edu to register! ";

        }
        # Send an error message
        return View::make('error', ['message' => $message]);
    }

    /*
     * renders Reset Password View which consists of a form that takes in an email
     */

    public function renderResetView(){

        return View::make('reset');

    }

    /*
     *  This functions accepts an email ID, creates a random access code and sends an email with the Access code
     */

    public function sendResetPassword(){

        $email = Input::get('email');

        $user = Admin::where('email', '=', $email)->first();
        $count = Admin::where('email', '=', $email)->count();

        if($count > 0){ #Existing User

            #Generate a random access code for password reset
            $accesscode = Str::random(5);
            $user->accesscode = $accesscode;
            $user->save();

            #Send the user an email with accesscode
            $email_data = [
                'recipient' => $email,
                'subject' => 'PSAP Database: Reset Password'
            ];

            $view_data = [
                'accesscode' => $accesscode,
                'user' => $user
            ];

            #Send Email
            Mail::send('emails.reset', $view_data, function($message) use ($email_data){
                $message->to($email_data['recipient'])
                    ->subject($email_data['subject']);
            });

            return View::make('success', ['message' => 'Please check your email for access code and password link']);

        }else{ # This user does not exist, ask them to register first

            $message = "Your email is not registered! Please email our admin to receive an access code.";
            return View::make('error', ['message' => $message]);
        }

    }

    /*
     * renderResetPasswordView functions consists of a form that accepts an accesscode and new password
     */

    public function renderResetPasswordView(){

        return View::make('resetpassword');

    }

    /*
     * Reset Password View POSTS to this function. Verifies the new password, and logins the user
     */

    public function resetPassword(){
        #get user details
        $user = Admin:: where('email', '=', Input::get('email'))->first();

        #Get form inputs
        $password = Input::get('password');
        $repassword = Input::get('repassword');
        $accesscode = Input::get('accesscode');

        if($password != $repassword || $accesscode != $user->accesscode){

            $message = "Passwords Do no match And/OR Accesscode does not match!";

            return View::make('error', ['message' => $message]);

        }else{
            #entries match, save new password
            $user->password = Hash::make($password);
            $user->save();
        }

        #Authenticate User and redirect
        if (Auth::attempt(Input::only('email', 'password'))){
            $current_user = Auth::user();

            if($current_user->type == 'private'){
                return Redirect::to('/private');
            }else {
                return Redirect::to('/admin');
            }
        }

    }

    /*
     * logout user, flush all session variables and un-authenticate user
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return Redirect::to('/');
    }


}
