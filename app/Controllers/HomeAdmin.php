<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class HomeAdmin extends BaseController
{
    public function index(){
        return view('administrador');
    }

}