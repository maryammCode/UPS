@if (@$all_types_exclude_clubs || (@$type && $type == 'clubs') || (@$type && $type == 'Departments'))
    <div class="ns-blog-details-widget mb-50">
        <style>
            .title {
                font-weight: bold;
            }

            .light {
                color: #FFFFFF;
                background-color: #428bca;
                border-radius: 0 !important;
                font-weight: bold;
            }

            .list-group-item:hover {
                color: #FFFFFF;
                background-color: #428bca;
                border-radius: 0 !important;
            }
        </style>



        @if (@$type && $type == 'clubs')
            <h5 class="ns-footer-widget-title-2"><a> @lang('translate.clubs') </a></h5>

            <div id="treeview5" class="treeview">
                @foreach ($clubs_type as $type)
                    <ul class="list-group mx-2 py-1">
                        {{-- <div class="title"><i class="icofont-rounded-right"></i>{{ @$type->$designation }}</div> --}}
                        @foreach ($all_organismes as $organism)
                            @php
                                $isSlugMatch = $organism->slug == $slug;
                            @endphp
                            @if ($organism->organism_type_id == $type->id)
                                <ul class="list-group  mx-2">
                                    <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                        <a
                                            href="{{ route('organisms.details', ['type_slug' => @$organism->typeOrganisme->slug, 'slug' => @$organism->slug]) }}">
                                            <i class="icofont-caret-right"></i>
                                            @include('public.layouts.includes.langs', [
                                                'field' => $organism,
                                                'param' => 'designation',
                                            ])
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </ul>
                @endforeach

            </div>
        @elseif (@$type && $type == 'Departments')
            <h5 class="ns-footer-widget-title-2"><a> @lang('translate.Départements') </a></h5>
            <div id="treeview5" class="treeview">
                <ul class="list-group mx-2 py-1">
                    @foreach ($all_departement as $department)
                        @php
                            $isSlugMatch = $department->slug == $slug;
                        @endphp
                        @if ($department->slug)
                            <ul class="list-group  mx-2 ">
                                <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                    <a href="{{ route('department.details', ['slug' => @$department->slug]) }}">
                                        <i class="icofont-caret-right"></i>
                                        @include('public.layouts.includes.langs', [
                                            'field' => $department,
                                            'param' => 'designation',
                                        ])</a>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                </ul>
            </div>
        @elseif (@$all_types_exclude_clubs)
            <h5 class="ns-footer-widget-title-2"><a> @lang('translate.Clubs') </a></h5>

            <div id="treeview5" class="treeview">
                @foreach ($all_types_exclude_clubs as $type)
                    <ul class="list-group mx-2 py-1">
                        <div class="title"><i class="icofont-rounded-right"></i>
                            @include('public.layouts.includes.langs', [
                                'field' => $type,
                                'param' => 'designation',
                            ])
                        </div>
                        @foreach ($all_organismes as $organism)
                            @php
                                $isSlugMatch = $organism->slug == $slug;
                            @endphp
                            @if ($organism->organism_type_id == $type->id)
                                <ul class="list-group  mx-2">
                                    <li class="list-group-item  border-0 {{ $isSlugMatch ? 'light' : '' }}">
                                        <a
                                            href="{{ route('organisms.details', ['type_slug' => @$organism->typeOrganisme->slug, 'slug' => @$organism->slug]) }}">
                                            <i class="icofont-caret-right"></i>@include('public.layouts.includes.langs', [
                                                'field' => $organism,
                                                'param' => 'designation',
                                            ]) </a>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div>
        @endif

    </div>
@endif
