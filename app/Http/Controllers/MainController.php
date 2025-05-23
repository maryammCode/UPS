<?php

namespace App\Http\Controllers;


use App\DefaultCover;
use App\Department;

use App\Publication;

use App\Event;
use App\Coordinate;
use App\News;
use App\Partner;
use App\SectorType;

use Illuminate\Support\Facades\Auth;

use App\HomeSection;
use App\Slide;
use App\Year;
use App\HomeShortcut;


class MainController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function index()
    {

        $blocks = HomeSection::where('validation', 1)->orderBy('order')->get();
        $pinnews = News::with('newsCategories')
            ->where('a_la_une', 1)
            ->where('publier', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->where(
                'for',
                'LIKE',
                '%publique%'
            )->get();
        // dd($pinnews);
        $latestNews = News::with('newsCategories')
            ->where('a_la_une', '<>', 1)
            ->where('publier', '=', 1)
            ->where('for', 'LIKE', '%publique%')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        $mergedNews = $pinnews->merge($latestNews);
        $HomeShortcuts = HomeShortcut::all();
        $HomeShortcutsDefaultCover = DefaultCover::where('section', 'shortcuts')->where('publier', 1)->first();
        $coordinates = Coordinate::first();
        $events = Event::limit(4)->orderBy('date_start', 'desc')->where('publier', 1)->get();
        $partenaires = Partner::orderby('designation_fr')->get();
        // dd($partenaires);
        $articles = Publication::all();
        $slides = Slide::orderBy('ordre')->get();
        $statistics = Year::find($coordinates->current_year_id);
        $type_formations = SectorType::get();
        $departments = Department::where('publier', 1)->get();
        $lastNewsDefaultCover = DefaultCover::where('section', 'news')->where('publier', 1)->first();
        $lastEventsDefaultCover = DefaultCover::where('section', 'event')->where('publier', 1)->first();
        return view('index', [

            'blocks' => $blocks,
            'mergedNews' => $mergedNews,
            // "pinnews" => $pinnews,
            // 'latestNews' => $latestNews,
            'HomeShortcuts' => $HomeShortcuts,
            'coordinates' => $coordinates,
            'events' => $events,
            'partenaires' => $partenaires,
            'slides' => $slides,
            'statistics' => $statistics,
            'type_formations' => $type_formations,
            'articles' => $articles,
            'departments' => $departments,
            'page' => 'index',
            "lastNewsDefaultCover" => $lastNewsDefaultCover,
            "HomeShortcutsDefaultCover" => $HomeShortcutsDefaultCover,
            "lastEventsDefaultCover" => $lastEventsDefaultCover,
        ]);
    }



}
