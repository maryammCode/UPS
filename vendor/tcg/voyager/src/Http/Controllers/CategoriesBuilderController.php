<?php

namespace TCG\Voyager\Http\Controllers;

use App\SubjectDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class CategoriesBuilderController extends Controller{



    public function index(){


        $isModelTranslatable = false;
        $items = SubjectDocument::all();
        return view('voyager::categories_builder' , compact( 'isModelTranslatable' , 'items'));
    }
}
