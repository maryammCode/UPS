<?php

namespace App\Helpers;

class MenuNavigationLogic
{
    public static function getMenuData($slug, $routeName, $menu_id = 1)
    {
        // dd('$coordinates');
        $lang = session('lang', config('app.locale'));
        app()->setLocale($lang);
        if (!$lang) {
            $lang = \App::getLocale();
        }
        $coordinates = \App\Coordinate::first();
        $usefullinks = \App\Usefullink::all();
        $widgets = \App\Widget::all();
        $menu_id = \TCG\Voyager\Models\Menu::where('name', 'public_fr')->first();
        $menu_all = \TCG\Voyager\Models\MenuItem::where('menu_id', @$menu_id->id)
            ->where('parent_id', null)
            ->orderBy('order')
            ->get();

        $menu = null;
        $parentTitle = null;
        $isActive = false;
        $title = null;
        if (@$slug) {
            $menu = \TCG\Voyager\Models\MenuItem::where('parameters', 'like', '%"slug":"' . $slug . '"%')
                ->where('menu_id', $menu_id->id)
                ->first();
            if ($menu && $menu->parent_id) {
                $parentID = $menu->parent_id;
                $one_child = \TCG\Voyager\Models\MenuItem::where('id', $parentID)->first();
                $firstchildtitle = $one_child->title;
                $title = $menu->title;
                if ($one_child->parent_id) {
                    $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', $one_child->parent_id)
                        ->orderBy('order')
                        ->get();
                    $big_parent = \TCG\Voyager\Models\MenuItem::where('id', $one_child->parent_id)->first();
                    $parentTitle = $big_parent->title;
                } else {
                    $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', $parentID)->orderBy('order')->get();
                    $big_parent = \TCG\Voyager\Models\MenuItem::where('id', $parentID)->first();
                    $parentTitle = $big_parent->title;
                }
            } else {
                switch ($routeName) {
                    /* case 'sectors':
                        $menu = \TCG\Voyager\Models\MenuItem::where('title', 'like', 'liste_type_formations')
                            ->where('menu_id', $menu_id->id)
                            ->first();

                        if ($menu && $menu->parent_id) {
                            $parentID = $menu->parent_id;
                            $title = $menu->title;
                            $one_child = \TCG\Voyager\Models\MenuItem::where('id', $parentID)->first();
                            $firstchildtitle = $one_child->title;
                            if ($one_child && $one_child->parent_id) {
                                $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', $one_child->parent_id)
                                    ->orderBy('order')
                                    ->get();
                                $big_parent = \TCG\Voyager\Models\MenuItem::where('id', $one_child->parent_id)->first();
                                $parentID = $big_parent->id;
                                $parentTitle = $big_parent->title;
                                // @dd($parentTitle, $parentTitle ,$parentID ,$big_parent );
                            } else {
                                $big_parent = $one_child;
                                $parentID = $one_child->id;
                            }

                            break;
                        } else {
                            // @dd('sector_else');
                            break;
                        } */
                    case 'organisms.type':
                        $menu = \TCG\Voyager\Models\MenuItem::where('title', 'like', 'liste_type_organisms')
                            ->where('menu_id', $menu_id->id)
                            ->first();
                        if ($menu && $menu->parent_id) {
                            $parentID = $menu->parent_id;
                            $title = $menu->title;
                            $one_child = \TCG\Voyager\Models\MenuItem::where('id', $parentID)->first();
                            $firstchildtitle = $one_child->title;
                            if ($one_child && $one_child->parent_id) {
                                @dd('one_child.parent_id');
                                $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', $one_child->parent_id)
                                    ->orderBy('order')
                                    ->get();
                                $big_parent = \TCG\Voyager\Models\MenuItem::where('id', $one_child->parent_id)->first();
                                $parentID = $big_parent->id;
                                $parentTitle = $big_parent->title;

                            } else {
                                // @dd('organisms.type');
                                $big_parent = $one_child;
                                $parentID = $one_child->id;
                                $parentID = $big_parent->id;
                                $parentTitle = $big_parent->title;
                            }
                            break;
                        } else {
                            //still thinking about it
                            break;
                        }
                    case 'organisms.details':
                        $menu = \TCG\Voyager\Models\MenuItem::where('title', 'like', 'organisms_unites')
                            ->where('menu_id', $menu_id->id)
                            ->first();
                        if ($menu && $menu->parent_id) {
                            $parentID = $menu->parent_id;
                            $title = $menu->title;
                            $one_child = \TCG\Voyager\Models\MenuItem::where('id', $parentID)->first();
                            $firstchildtitle = $one_child->title;
                            if ($one_child && $one_child->parent_id) {
                                $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', $one_child->parent_id)
                                    ->orderBy('order')
                                    ->get();
                                $big_parent = \TCG\Voyager\Models\MenuItem::where('id', $one_child->parent_id)->first();
                                $parentID = $big_parent->id;
                                $parentTitle = $big_parent->title;
                            } else {
                                $big_parent = $one_child;
                                $parentID = $one_child->id;
                            }
                            break;
                        } else {
                            //still thinking about it
                            break;
                        }
                    default:
                        break;
                }
            }
        } else {
            $menu = \TCG\Voyager\Models\MenuItem::where('route', 'like', '%' . $routeName . '%')
                ->where('menu_id', $menu_id->id)
                ->first();
            if ($menu && $menu->parent_id) {
                $parentID = $menu->parent_id;
                $title = $menu->title;
                $one_child = \TCG\Voyager\Models\MenuItem::where('id', @$parentID)->first();
                $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', @$one_child->parent_id)
                    ->orderBy('order')
                    ->get();
                $big_parent = \TCG\Voyager\Models\MenuItem::where('id', @$one_child->parent_id)->first();
                if (@$big_parent && @$big_parent->title) {
                    $parentTitle = $big_parent->title;
                } else {
                    $parentTitle = null;
                }
            } elseif (@$menu && !@$menu->parent_id) {
                $big_parent = $menu;
                $parentID = $big_parent->id;
                $parentTitle = $big_parent->title;
            } else {
                $big_parent = null;
                $parentID = null;
                $parentTitle = null;
            }
        }
        // dd($parentID);
        return [
            'coordinates' => @$coordinates,
            'usefullinks' => @$usefullinks,
            'widgets' => @$widgets,
            'big_parent' => @$big_parent,
            'parentTitle' => @$parentTitle,
            'isActive' => @$isActive,
            'parentID' => @$parentID,
            'title' => @$title,
            'one_child' => @$one_child,
            'childs_2' => @$childs_2,
            'menu_all' => @$menu_all,
            'firstchildtitle' => @$firstchildtitle,
            'lang'=>$lang
        ];
    }

    public static function getconfigData($routeName)
    {
        $lang = session('lang', config('app.locale'));
        app()->setLocale($lang);
        if (!$lang) {
            $lang = \App::getLocale();
        }
        $LayoutConfig = null;
        if ($routeName) {
            $LayoutConfig = \App\ConfigLayout::where('route', $routeName)->get();

        } else {

        }
        return [
            'LayoutConfig' => @$LayoutConfig,
            'lang'=>$lang
        ];
    }
}
