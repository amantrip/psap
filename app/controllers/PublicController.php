<?php

class PublicController extends \BaseController {

    /*
     * Pulls all the entries from the database and renders a view.
     * The view consists of a table which can be search using PSAP ID, Name, State, County or City
     * The search is handled on the front end.
     */
	public function index()
	{
        $entries = Registry::all();
        return View::make('public.index', ['entries' => $entries]);
	}

    /*
     * This function is called when an API Get URL is requested.
     * The GET can handle only five parameters: id, name, state, county or city.
     * If none of these parameters are found, an empty JSON is returned.
     * If either of the parameter is found, we search based on the entered parameters
     */

    public function api(){
        $psapid = Input::get('id');
        if(isset($psapid)){
                $registry = Registry:: where('psapid' , '=', $psapid)->get();
                return $registry->toJson();

        }

        $name = Input::get('name');
        if(isset($name)){
            $registry = Registry:: where('psapname' , '=', $name)->get();
            return $registry->toJson();

        }

        $state = Input::get('state');
        if(isset($state)){
            $registry = Registry:: where('state' , '=', $state)->get();
            return $registry->toJson();

        }

        $county = Input::get('county');
        if(isset($county)){
            $registry = Registry:: where('county' , '=', $county)->get();
            return $registry->toJson();

        }

        $city = Input::get('city');
        if(isset($city)){
            $registry = Registry:: where('city' , '=', $city)->get();
            return $registry->toJson();

        }

        return [];
    }





}
