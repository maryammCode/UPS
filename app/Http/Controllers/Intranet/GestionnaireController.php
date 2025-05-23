<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    /**
     * Show the form for creating a new supplier.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('intranet.gestionnaire.welcome-gest');
    }
}
