@extends('intranet.layouts.app')
@section('content')
    @if (Session::has('success'))
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                title: 'Merci',
                text: msg,

                type: 'success',

                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: '',
                type: 'warning',
                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif
    <div>
        <div class="sa4d25">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="section3125">
                            <div class="explore_search">
                                <div class="ui search focus">
                                    <div class="ui left icon input swdh11">
                                        <input class="prompt srch_explore" type="text" placeholder="Recherche" id="myInput">
                                        <i class="uil uil-search-alt icon icon2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="_14d25">
                            <div class="row"  id="myList">
                                @foreach ($companies as $company)
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6  myFilterDiv">
                                        <div class="fcrse_1 mt-30">
                                            <div class="" style="height: 150px">
                                                <a href="{{ route('company_details', $company->id) }}"><img
                                                        src="@if($company->logo &&   Storage::exists($company->logo)) {{ Voyager::image($company->logo) }} @else {{Voyager::image($default_cover->cover) }} @endif"
                                                        style="width: 100% !important;height: 150px !important;"
                                                        alt=""></a>
                                            </div>
                                            <div class="tutor_content_dt">
                                                <div class="tutor150">
                                                    <a href="{{ route('company_details', $company->id) }}"
                                                        class="tutor_name ">{{ $company->designation }}</a>
                                                    {{-- <div class="mef78" title="Verify">
                                                        <i class="uil uil-check-circle"></i>
                                                    </div> --}}
                                                </div>
                                                <a href="mailto:{{ $company->email }}">
                                                    <div class="tutor_cate"> Email: {{ $company->email }}</div>
                                                </a>
                                                {{-- <ul class="tutor_social_links">
                                                    <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" class="ln"><i class="fab fa-linkedin-in"></i></a></li>
                                                    <li><a href="#" class="yu"><i class="fab fa-youtube"></i></a></li>
                                                </ul> --}}
                                                <div class="tut1250">
                                                    <a href="{{ route('company_details', $company->id) }}"
                                                        class="btn btn-primary">@lang('intranet.Consulter')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    <div class="main-loader mt-50">
                                        {{ $companies->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList .myFilterDiv").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
