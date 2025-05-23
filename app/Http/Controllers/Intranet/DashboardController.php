<?php

namespace App\Http\Controllers\Intranet;


use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

    public function index()
    {
        return view('intranet.statistiques.dashboard');
    }

    public function magasinStat()
    {
        return view('intranet.statistiques.magasin');
    }

}