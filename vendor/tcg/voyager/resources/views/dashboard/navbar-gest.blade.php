@php
$tables = TCG\Voyager\Models\DataType::all();
@endphp

<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
            <ol class="breadcrumb hidden-xs">
                @php
                $segments = array_filter(explode('/', str_replace(route('voyager.dashboard'), '', Request::url())));
                $url = route('voyager.dashboard');
                @endphp
                @if(count($segments) == 0)
                    <li class="active"><i class="voyager-boat"></i> {{ __('voyager::generic.dashboard') }}</li>
                @else
                    <li class="active">
                        <a href="{{ route('voyager.dashboard')}}"><i class="voyager-boat"></i> {{ __('voyager::generic.dashboard') }}</a>
                    </li>
                    @foreach ($segments as $segment)
                        @php
                        $url .= '/'.$segment;
                        @endphp
                        @if ($loop->last)
                            <li>{{ ucfirst(urldecode($segment)) }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ ucfirst(urldecode($segment)) }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ol>
            @show
        </div>
        <ul class="nav navbar-nav @if (__('voyager::generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">
            @if(auth()->user()->role_id == 1)
                <li>
                    <input type="text" class="form-control search" placeholder="Edit Table ..." style="width: 200px; margin-top: 13px;" list="db_update" id="search-db-edit" onchange="goTo('db-edit')">
                    <datalist id="db_update">
                        @foreach($tables as $table)
                            <option value="{{ $table->slug }}">  {{ $table->slug }} </option>
                        @endforeach
                    </datalist>
                </li>
                <li>
                    <input type="text" class="form-control search" placeholder="Edit BREAD ..." style="width: 200px;margin-top: 13px;" list="breads_update" id="search-bread-edit" onchange="goTo('bread-edit')">
                    <datalist id="breads_update">
                        @foreach($tables as $table)
                            <option value="{{ $table->slug }}">  {{ $table->slug }} </option>
                        @endforeach
                    </datalist>
                </li>
                <li>
                    <input type="text" class="form-control search" placeholder="Afficher La liste des  ..." style="width: 200px;margin-top: 13px;" list="breads" id="search-bread" onchange="goTo('bread')">
                    <datalist id="breads">
                        @foreach($tables as $table)
                            <option value="{{ $table->slug }}">  {{ $table->slug }} </option>
                        @endforeach
                    </datalist>
                </li>
            @endif
            <li style="margin-top: 0%;">
                <a href="{{ route('voyager.maj_info_confidentielles') }}">
                    <label class="btn btn-success btn-add-new">
                        <i class="voyager-plus"></i> <span>MAJ Info.Confidentielles</span>
                    </label>
                </a>
            </li>
            <!-- Updated Dropdown Menu -->
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false"><img src="{{ $user_avatar }}" class="profile-img"> <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="{{ $user_avatar }}" class="profile-img">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <?php $nav_items = config('voyager.dashboard.navbar_items'); ?>
                    @if(is_array($nav_items) && !empty($nav_items))
                        @foreach($nav_items as $name => $item)
                            <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="'.$item['classes'].'"' : '' !!}>
                                @if(isset($item['route']) && $item['route'] == 'voyager.logout')
                                    <!-- Replace the logout form with the new one -->
                                    <a href="{{ route('logout') }}" class="item channel_item"
                                       onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                            <i class="{!! $item['icon_class'] !!}"></i>
                                        @endif
                                        {{__($name)}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}" {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}>
                                        @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                            <i class="{!! $item['icon_class'] !!}"></i>
                                        @endif
                                        {{__($name)}}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>

<script>
    function goTo(type){
        if(type == 'db-edit'){
            var slug = document.getElementById("search-db-edit").value;
            let x= slug.replace('-', '_');
            window.location = "{{ route('voyager.dashboard') }}/database/"+x+"/edit"
        }else if(type == 'bread-edit'){
            var slug = document.getElementById("search-bread-edit").value;
            let x= slug.replace('-', '_');
            window.location = "{{ route('voyager.dashboard') }}/bread/"+x+"/edit"
        }else{
            var slug = document.getElementById("search-bread").value;
            window.location = "{{ route('voyager.dashboard') }}/"+slug
        }
    }
</script>