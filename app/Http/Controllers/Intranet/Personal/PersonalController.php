<?php

namespace App\Http\Controllers\Intranet\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_personal']);
    }

    // public function showProfile(){
    //     return view('intranet.personal.profile' , ['page'=>'profile']);
    // }
}
