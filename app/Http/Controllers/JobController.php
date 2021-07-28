<?php

namespace App\Http\Controllers;

use App\Libraries\View;
use App\Models\JobModel;
use App\Models\UserModel;

class JobController extends Controller
{

    public function index()
    {   
        View::render('jobs/index.view', [
            'user'  => UserModel::get(1),
            'jobs'  => JobModel::userJobs(1),
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