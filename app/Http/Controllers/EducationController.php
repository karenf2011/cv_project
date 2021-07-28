<?php

namespace App\Http\Controllers;

use App\Libraries\View;
use App\Models\EducationModel;
use App\Models\UserModel;

class EducationController extends Controller
{

    public function index()
    {   
        View::render('educations/index.view', [
            'user'          => UserModel::get(1),
            'educations'    => EducationModel::userEducations(1),
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

