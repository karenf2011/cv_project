<?php

namespace App\Http\Controllers;

use App\Libraries\View;
use App\Models\EducationModel;
use App\Models\JobModel;
use App\Models\UserModel;

class HomeController extends Controller
{

    public function index()
    {
        return View::render('home.view', [
            'user'          => UserModel::get(1),
            'educations'    => EducationModel::userEducations(1),
            'degree'        => EducationModel::userLatestDegree(1),
            'currentJob'    => JobModel::userCurrentJob(1),
            'latestJob'     => JobModel::userLatestJob(1),   
        ]);
    }
}