<?php

namespace App\Http\Controllers;

use App\Libraries\View;
use App\Models\HobbyModel;
use App\Models\UserModel;

class HobbyController extends Controller
{

    public function index()
    {  
       View::render('hobbies/index.view', [
           'user'       => UserModel::get(1),
           'hobbies'    => HobbyModel::userHobbies(1),
       ]);
    }

    /**
     * Store a user record into the database
     */
    public function store()
    {
        
    }

    public function create()
    {
        
    }

    public function show()
    {

    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
       
    }

    /**
     * Archive a user record into the database
     */
    public function destroy(int $id)
    {

    }

}