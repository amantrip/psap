<?php

class RegistryController extends \BaseController {

    /*
     * This function renders the create new entry view which consists of a form to create a new psap entry.
     */
    public function renderCreateEntryView(){
        #Authenticate User
        if(! Auth::check()){
            return Redirect::to('/');

        }

        return View::make('registry.create');
    }

    /*
     * Create new entry view POSTS to this function.
     * This function creates a new entry and redirects to the success page
     */

    public function createEntry(){

        #Authenticate User
        if(! Auth::check()){
            return Redirect::to('/');

        }

        $admin = Auth::user();

        $max_psap_id = Registry::all()->max('psapid');
        $max_psap_id = $max_psap_id + 1; # Use the next psapid to create new psap entry


        Registry:: create([
            'psapid' => $max_psap_id,
            'psapname' => Input::get('psapname'),
            'state' => Input::get('state'),
            'county' => Input::get('county'),
            'city' => Input:: get('city'),
            'text_911' => Input::get('text_911'),
            'typechange' => Input::get('typechange'),
            'comments' => Input::get('comments'),
        ]);

        Owners::create([
           'psapid' => $max_psap_id,
            'owner_id' => $admin->id
        ]);

        $message = "PSAP Entry successfully created!";
        return View::make('success', ['message' => $message]);

    }

	/*
	 * edit($id) takes in the 'id' (SQL Table Registry ID not PSAP ID) of a registry and renders the edit View to let admin edit the entry.
	 * The function check if the user is authenticated before rendering the edit view.
	 */
	public function edit($id)
	{

        #Get current state of the registry
        $registry = Registry::find($id);

        #Authenticate User
        if(! Auth::check()){
            return Redirect::to('/');

        }


        #Render edit view, pass the current state as parameter
        return View::make('registry.edit', ['registry' => $registry]);
	}

    /*
     * Edit View POSTS to update() function. The functions collects all the Input values from the edit form and updates the Database
     * Based on the Admin type, the user is redirected to their respective home pages
     */

	public function update()
	{
        # Get current User details
        $user = Auth::user();

		$registry = Registry::find(Input::get('id'));
        #return $registry;
        $registry->psapname = Input::get('psapname');
        $registry->state = Input:: get('state');
        $registry->county = Input::get('county');
        $registry->city = Input:: get('city');
        $registry->text_911 = Input::get('text_911');
        $registry->typechange = Input::get('typechange');
        $registry->comments = Input::get('comments');
        $registry->changes_owner_id = $user->id;

        $registry->save(); #Update Database



        #Redirect according to User Type
        if($user->type == "admin"){
            //return Redirect::to('/admin');
            $message = "PSAP Entry Update Successful!";
            return View:: make('admin.success', ['message' => $message]);
        }else {
            $message = "PSAP Entry Update Successful!";
            return View:: make('private.success', ['message' => $message]);
        }


	}

    /*
     * The destroy function accepts an psapid and deletes that entry
     * We first check if the user is authenticated, if not redirect to Home page of the portal. This protects the Database from anyone
     * with access to URL to delete a registry entry
     */

	public function destroy($psapid)
	{
        if(! Auth::check()){
            return Redirect::to('/');
        }

		$entry = Registry:: where('psapid', '=', $psapid);
        $entry->delete();

        $owner_entries = Owners:: where('psapid', '=', $psapid)->get();
        for ($i = 0; $i < count($owner_entries); $i++){

            $remove_entry = Owners:: find($owner_entries[$i]->id);
            $remove_entry->delete();
        }


        return Redirect::to('/admin');
	}

}

