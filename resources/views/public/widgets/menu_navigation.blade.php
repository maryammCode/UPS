   @php
       $lang = session('lang', config('app.locale'));
       app()->setLocale($lang);
       if (!$lang) {
           $lang = App::getLocale();
       }
       $menu_id = \TCG\Voyager\Models\Menu::where('name', 'public_fr')->first();
       $routeName = Route::currentRouteName();
       $slug = Route::current()->parameter('slug');
       $menuData = \App\Helpers\MenuNavigationLogic::getMenuData($slug, $routeName, $menu_id);
       $parentID = $menuData['parentID'];
       $title = $menuData['title'];
       $menu_all = $menuData['menu_all'];
       $one_child = $menuData['one_child'];
       $childs_2 = $menuData['childs_2'];
   @endphp

   <input type="hidden" id="parentID" value="{{ @$parentID }}">
   <input type="hidden" id="title" value="{{ @$title }}">
   <style>
       .title {
           font-weight: bold;
           padding: 10px 0;
       }

       .title :hover {
           font-weight: bold;
           color: #428bca;
       }

       .light {
           color: #FFFFFF;
           background-color: #428bca;
           border-radius: 0 !important;
           font-weight: bold;
       }

       .light-1 {
           color: #FFFFFF;
           background-color: #428bca;
           border-radius: 0 !important;
           padding: 10px;
           font-weight: bold;
       }

       .list-group-item:hover {
           color: #FFFFFF;
           background-color: #428bca;
           border-radius: 0 !important;
       }
   </style>
   @if (@$parentID)
       <div class="ns-blog-details-widget mb-50">
           <h5 class="ns-footer-widget-title-2"> <a>{{ __('translate.' . $parentTitle) }}
               </a></h5>
           <div id="treeview5" class="treeview">
               @foreach ($childs_2 as $item_child)
                   @php

                       // Log::info($title);
                       // Log::info($title);
                       $isTitleMatch = $item_child->title == $title;
                       $hasChildren = $item_child->children->count() > 0;
                   @endphp

                   <ul class="list-group mx-2 py-1">

                       @if (!$hasChildren && $item_child->title == 'liste_type_formations')
                           <div class=" {{ $isTitleMatch ? 'light-1' : 'title' }}">
                               <a class="menu-link2">@lang('translate.Sectors')&nbsp;<i class="icofont-rounded-down"></i></a>
                           </div>
                       @elseif (!$hasChildren && $item_child->title == 'liste_departements')
                           <div class=" {{ $isTitleMatch ? 'light-1' : 'title' }}">
                               <a class="menu-link2">@lang('translate.Départements')&nbsp;<i class="icofont-rounded-down"></i></a>
                           </div>
                       @elseif (!$hasChildren && $item_child->title == 'liste_type_organisms')
                           <div class=" {{ $isTitleMatch ? 'light-1' : 'title' }}">
                               <a class="menu-link2">@lang('translate.liste_type_organisms')&nbsp;<i class="icofont-rounded-down"></i></a>
                           </div>
                       @elseif (!$hasChildren && $item_child->title == 'organisms_unites')
                           <div class=" {{ $isTitleMatch ? 'light-1' : 'title' }}">
                               <a class="menu-link2">@lang('translate.organisms_unites')&nbsp;<i class="icofont-rounded-down"></i></a>
                           </div>
                       @else
                           <div class=" {{ $isTitleMatch ? 'light-1' : 'title' }}">
                               <a @if (isset($item_child->route) && Route::has($item_child->route)) @if (in_array($item_child->route, ['pages', 'sectors', 'emploi', 'partenaires']))
                                    href="{{ route($item_child->route, ['slug' => $item_child->parameters->slug ?? '']) }}"
                                @elseif (in_array($item_child->route, ['organisms.type']))
                                    href="{{ route($item_child->route, ['slug' => $item_child->parameters->slug ?? '']) }}"
                            @else
                                href="{{ route(@$item_child->route) }}" @endif
                               @else @endif
                                   class="menu-link2"
                                   >{{ __('translate.' . $item_child->title) }}&nbsp;<i
                                       class="icofont-rounded-down"></i></a>
                           </div>
                       @endif

                       @php
                           $childs_2 = \TCG\Voyager\Models\MenuItem::where('parent_id', $item_child->id)
                               ->orderBy('order')
                               ->get();

                           $hasLevel2Children = $childs_2->count() > 0;
                       @endphp
                       @if (!$hasLevel2Children && $item_child->title == 'liste_type_organisms')
                           @php
                               $organisms = \App\OrganismType::all();
                               // dd($organisms);
                           @endphp
                           <ul class="list-group  mx-2">
                               @foreach ($organisms as $organism)
                                   @php
                                       $isSlugMatch = $organism->slug == $slug;
                                   @endphp
                                   <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">

                                       <a class="menu-link2"
                                           href="{{ route('organisms.type', ['slug' => $organism->slug]) }}"><i
                                               class="icofont-caret-right"></i>
                                           @include('public.layouts.includes.langs', [
                                               'field' => $organism,
                                               'param' => 'designation',
                                           ]) </a>
                                   </li>
                               @endforeach

                           </ul>
                       @elseif(!$hasLevel2Children && $item_child->title == 'liste_departements')
                           @php
                               $departements = App\Department::where('publier', 1)->orderBy('designation_fr')->get();
                           @endphp
                           @foreach (@$departements as $departement)
                               @php
                                   $isSlugMatch = $departement->slug == $slug;
                               @endphp
                               <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">

                                   <a class="menu-link2"
                                       href="{{ route('department.details', ['slug' => $departement->slug]) }}"><i
                                           class="icofont-caret-right"></i>
                                       @include('public.layouts.includes.langs', [
                                           'field' => $departement,
                                           'param' => 'designation',
                                       ]) </a>
                               </li>
                           @endforeach
                       @elseif(!$hasLevel2Children && $item_child->title == 'liste_type_formations')
                           @php
                               $type_formations = App\SectorType::where('publier', 1)->orderBy('designation_fr')->get();
                           @endphp
                           <ul class="list-group  mx-2">
                               @foreach ($type_formations as $sector)
                                   @php
                                       $isSlugMatch = $sector->slug == $slug;
                                   @endphp
                                   <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">

                                       <a class="menu-link2"
                                           href="{{ route('sectors', ['slug' => @$sector->slug]) }}"><i
                                               class="icofont-caret-right"></i>
                                           @include('public.layouts.includes.langs', [
                                               'field' => $sector,
                                               'param' => 'designation',
                                           ])</a>
                                   </li>
                               @endforeach

                           </ul>
                       @elseif(!$hasLevel2Children && $item_child->title == 'organisms_unites')
                           @php
                               $organism_type = App\OrganismType::where('slug', 'unites')->where('publier', 1)->first();
                               $organisms = App\Organism::where('organism_type_id', $organism_type->id)
                                   ->where('publier', 1)
                                   ->orderBy('created_at', 'desc')
                                   ->get();

                           @endphp
                           <ul class="list-group  mx-2">
                               @foreach (@$organisms as $organism)
                                   @php
                                       $isSlugMatch = $organism->slug == $slug;
                                   @endphp
                                   <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">

                                       <a class="menu-link2"
                                           href="{{ route('organisms.details', ['type_slug' => $organism_type->slug, 'slug' => $organism->slug]) }}"><i
                                               class="icofont-caret-right"></i>
                                           @include('public.layouts.includes.langs', [
                                               'field' => $organism,
                                               'param' => 'designation',
                                           ])</a>
                                   </li>
                               @endforeach

                           </ul>
                       @else
                           <ul class="list-group  mx-2">
                               @foreach ($childs_2 as $child_level2)
                                   @php

                                       $isSlugMatch = $child_level2->title == $title;
                                       $isSector = Illuminate\Support\Str::startsWith($child_level2->title, 'sectors_');
                                       $isOrganism = Illuminate\Support\Str::startsWith(
                                           $child_level2->title,
                                           'organisms_',
                                       );
                                   @endphp
                                   @if ($child_level2->title == 'liste_type_formations')
                                       @php
                                           $type_formations = App\SectorType::where('publier', 1)
                                               ->orderBy('designation_fr')
                                               ->get();
                                           // dd($type_formations);
                                       @endphp

                                       @foreach ($type_formations as $sector)
                                           @php
                                               $isSlugMatch = $sector->slug == $slug;
                                           @endphp
                                           @if (@$sector->slug)
                                               <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                                   <a class="menu-link2"
                                                       href="{{ route('sectors', ['slug' => @$sector->slug]) }}"><i
                                                           class="icofont-caret-right"></i>
                                                       @include('public.layouts.includes.langs', [
                                                           'field' => $sector,
                                                           'param' => 'designation',
                                                       ]) </a>
                                               </li>
                                           @endif
                                       @endforeach
                                   @elseif($child_level2->title == 'liste_departements')
                                       @php
                                           $departements = App\Department::where('publier', 1)
                                               ->orderBy('designation_fr')
                                               ->get();
                                       @endphp
                                       @foreach (@$departements as $departement)
                                           @php
                                               $isSlugMatch = $departement->slug == $slug;
                                           @endphp
                                           <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">

                                               <a class="menu-link2"
                                                   href="{{ route('department.details', ['slug' => $departement->slug]) }}"><i
                                                       class="icofont-caret-right"></i>
                                                   @include('public.layouts.includes.langs', [
                                                       'field' => $departement,
                                                       'param' => 'designation',
                                                   ])</a>
                                           </li>
                                       @endforeach
                                   @elseif($child_level2->title == 'liste_organisms')
                                       @php
                                           $organisms = \App\OrganismType::all();
                                       @endphp
                                       @foreach ($organisms as $organism)
                                           @php
                                               $isSlugMatch = $organism->slug == $slug;
                                           @endphp
                                           @if (@$organism->slug)
                                               <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                                   <a class="menu-link2"
                                                       href="{{ route('organisms.type', ['slug' => $organism->slug]) }}"><i
                                                           class="icofont-caret-right"></i>
                                                       @include('public.layouts.includes.langs', [
                                                           'field' => $organism,
                                                           'param' => 'designation',
                                                       ])</a>
                                               </li>
                                           @endif
                                       @endforeach
                                   @elseif($isOrganism == true)
                                       @php
                                           $type_slug = Str::after($child_level2->title, 'organisms_');
                                           $organism_type = App\OrganismType::where('slug', $type_slug)
                                               ->where('publier', 1)
                                               ->first();
                                           $organisms = App\Organism::where('organism_type_id', $organism_type->id)
                                               ->where('publier', 1)
                                               ->orderBy('created_at', 'asc')
                                               ->get();

                                       @endphp
                                       @foreach ($organisms as $organism)
                                           @php
                                               $isSlugMatch = $organism->slug == $slug;
                                           @endphp
                                           @if (@$organism->slug)
                                               <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                                   <a class="menu-link2"
                                                       href="{{ route('organisms.details', ['type_slug' => $organism_type->slug, 'slug' => $organism->slug]) }}"><i
                                                           class="icofont-caret-right"></i>
                                                       @include('public.layouts.includes.langs', [
                                                           'field' => $organism,
                                                           'param' => 'designation',
                                                       ])</a>
                                               </li>
                                           @endif
                                       @endforeach
                                   @elseif($isSector == true)
                                       @php
                                           $type_slug = Str::after($child_level2->title, 'sectors_');
                                           $sectorType = App\SectorType::where('slug', $type_slug)
                                               ->where('publier', 1)
                                               ->first();
                                           $sectors = App\Sector::where('sector_type_id', $sectorType->id)
                                               ->where('publier', 1)
                                               ->orderBy('created_at', 'asc')
                                               ->get();

                                       @endphp

                                       @foreach (@$sectors as $sector)

                                           <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                            <a class="menu-link2"
                                                href="{{ route('sectors', ['slug' => $sector->slug]) }}"><i
                                                    class="icofont-caret-right"></i>
                                                @include('public.layouts.includes.langs', [
                                                    'field' => $sector,
                                                    'param' => 'designation',
                                                ])</a>
                                        </li>
                                       @endforeach
                                   @else
                                       <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                           <a @if (isset($child_level2->route) && Route::has($child_level2->route)) @if (in_array($child_level2->route, ['pages', 'sectors', 'partenaires']))
                                                    href="{{ route($child_level2->route, ['slug' => $child_level2->parameters->slug ?? '']) }}"
                                                @elseif (in_array($child_level2->route, ['organisms.type']))
                                                        href="{{ route($child_level2->route, ['slug' => $child_level2->parameters->slug ?? '']) }}"
                                                @else
                                               href="{{ route(@$child_level2->route) }}" @endif
                                           @else href="javascript:void(0)" @endif
                                               class="menu-link2"

                                               >
                                               <i class="icofont-caret-right"></i>
                                               {{ __('translate.' . $child_level2->title) }}
                                           </a>
                                       </li>
                                   @endif
                               @endforeach
                           </ul>
                       @endif
                   </ul>
               @endforeach
           </div>
       </div>
   @endif

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
