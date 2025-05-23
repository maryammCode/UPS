@extends('intranet.layouts.app')
@section('content')
@php
    $lang= Session::get('language');
    if(!$lang){ $lang=App::getLocale();}
    $short_description = 'short_description_' . $lang;
    $description = 'description_' . $lang;
    $designation = 'designation_' . $lang;
    $title = 'title_' . $lang;
    $label = 'label_' . $lang;
    $meta_description = 'meta_description_' . $lang;
    App::setLocale($lang);
    $to_day = date('Y-m-d');
@endphp

@if (Session::has('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script type="text/javascript">
    var msg = '{{ session('success') }}';
    swal({
        text: msg,
        title: 'Merci',
        type: 'success',
        toastr: true,
        timer: 3000,
        showConfirmButton: false
    })
</script>
@endif
@if (Session::has('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script type="text/javascript">
    var msg = '{{ session('error') }}';
    swal({
        text: msg,
        title: 'réessayer SVP',
        type: 'warning',
        toastr: true,
        timer: 3000,
        showConfirmButton: false
    })
    //     swal(
    //     '',
    //     msg,
    //     'warning'
    //   )
</script>
@endif
@if (Session::has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script type="text/javascript">
    var msg = '{{ session('warning') }}';
    swal(
        msg,
        'réessayer SVP',
        'danger'
    )
</script>
@endif

    @if($all_nachd_formulaires->count() > 0 && @$nachd_formulaire)
    <div class="postbox _215td5 pr-20 pb-50" style="margin: 0px 0px; background : #fff ; padding : 30px">
        <article class="postbox__item format-image mb-60 transition-3">
            <div class="section-title mt-0 mb-4">
                <h4 class="mb-4">Liste des formulaires disponibles</h4>
                <select class="form-control" onchange="location = this.value;" style="background-color: #f6f6f6;">
                    @foreach($all_nachd_formulaires as $specific_form)
                        @if($specific_form->date_debut <= $to_day && $specific_form->date_fin >= $to_day)
                        <?php $name = 'name_' . $lang; ?>
                        <option value="{{ $specific_form->code }}" @if($specific_form->name_fr == @$nachd_formulaire->name_fr) selected @endif>{{ $specific_form->$name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </article>
        <article class="postbox__item format-image mb-60 transition-3">
            @if(@$nachd_formulaire->name_fr)
                @if(@$nachd_inputs && @$nachd_inputs->count() > 0)
                    <div class="tp-support-form text-center" style="padding: 75px 15px 20px 15px;">
                        <span>
                            @if(App::isLocale('fr'))
                                {{ @$nachd_formulaire->name_fr }}
                            @elseif(App::isLocale('en'))
                                {{ @$nachd_formulaire->name_en }}
                            @else
                                <div style="text-align: right;"><b>{{ @$nachd_formulaire->name_ar }}</b></div>
                            @endif
                        </span>
                        <form id="{{ @$nachd_formulaire->id }}" action="{{ route('save_formulaire_request') }}" method="POST" @if( @$nachd_formulaire->accept_files == '1') enctype="multipart/form-data" @endif>
                           @csrf
                            <input name="nachd_formulaire_id" type="hidden" value="{{ @$nachd_formulaire->id }}" />
                            @foreach($nachd_inputs as $input)
                                <?php
                                    $the_called_value = null;
                                    if( @$input->information_recuperable == 1){
                                        $the_called_value_row = DB::table(@$input->table_to_use)->where('id', Auth::user()->id)->first();
                                        $the_called_value = @$the_called_value_row->{$input->attribut_to_use};
                                    }elseif(@$input->value && @$input->value != '' && @$input->value != null){
                                        $the_called_value = @$input->value;
                                    }
                                ?>
                                <div class="form-group col-12 row">
                                    <div class="form-group col-3">
                                        <label class="text-dark font-weight-bold">
                                            {{ @$input->$label }}
                                        </label>
                                    </div>
                                    <div class="form-group col-9">
                                        @if($input->zone == 'input')
                                            <input
                                                @if(@$input->type == 'file') type='file' name="{{ @$input->formulaire_input_id }}"
                                                @elseif(@$input->type == 'image') type='file' accept="image/*" name="{{ @$input->formulaire_input_id }}"
                                                @elseif(@$input->type == 'multiple_file') type='file' multiple name="{{ @$input->formulaire_input_id }}[]"
                                                @elseif(@$input->type == 'multiple_image') type='file' accept="image/*" multiple name="{{ @$input->formulaire_input_id }}[]"
                                                @else type="{{ @$input->type }}" name="{{ @$input->formulaire_input_id }}"
                                                @endif
                                                id="{{ @$input->identifiant }}"
                                                class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif"
                                                value="{{ @$the_called_value }}"
                                                placeholder="{{ @$input->placeholder }}"
                                                @if(@$input->etat_required == '1') required @endif
                                                @if(@$input->etat_disabled == '1') disabled @endif
                                            >
                                        @elseif($input->zone == 'select')
                                            <select name="{{ @$input->formulaire_input_id }}" id="{{ @$input->identifiant }}" class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif">
                                                <?php $options = explode(';', @$input->options); ?>
                                                @for($i = 0; $i < count($options); $i++)
                                                    <option value="{{ @$options[$i] }}" @if(@$options[$i] == @$the_called_value) selected @endif>{{ @$options[$i] }}</option>
                                                @endfor
                                            </select>
                                        @elseif($input->zone == 'select_multiple')
                                            <select multiple="multiple" name="{{ @$input->formulaire_input_id }}[]" id="{{ @$input->identifiant }}" class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif">
                                                <?php $options = explode(';', @$input->options); ?>
                                                @for($i = 0; $i < count($options); $i++)
                                                    <option value="{{ @$options[$i] }}" @if(@$options[$i] == @$the_called_value) selected @endif>{{ @$options[$i] }}</option>
                                                @endfor
                                            </select>
                                        @elseif($input->zone == 'checkbox')
                                            <?php $options = explode(';', @$input->options); ?>
                                            @for($i = 0; $i < count($options); $i++)
                                                <input
                                                    type="checkbox"
                                                    name="{{ @$input->formulaire_input_id }}[]"
                                                    id="checkbox_{{ @$input->identifiant.$i }}"
                                                    value="{{ @$options[$i] }}"
                                                    style="width: 4%;"
                                                    @if(@$options[$i] == @$the_called_value) checked @endif
                                                >
                                                <!--class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif"-->
                                                <label for="checkbox_{{ @$input->identifiant.$i }}">{{ @$options[$i] }}</label><br>
                                            @endfor
                                        @elseif($input->zone == 'radio')
                                            <?php $options = explode(';', @$input->options); ?>
                                            @for($i = 0; $i < count($options); $i++)
                                                <input
                                                    type="radio"
                                                    name="{{ @$input->formulaire_input_id }}"
                                                    id="radio_{{ @$input->identifiant.$i }}"
                                                    value="{{ @$options[$i] }}"
                                                    style="width: 4%;"
                                                    @if(@$options[$i] == @$the_called_value) checked @endif
                                                >
                                                <!--class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif"-->
                                                <label for="radio_{{ @$input->identifiant.$i }}">{{ @$options[$i] }}</label>
                                            @endfor
                                        @elseif($input->zone == 'relationship')
                                            <select name="{{ @$input->formulaire_input_id }}" id="{{ @$input->identifiant }}" class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif">
                                                <option value="">Choisir..</option>
                                                <?php
                                                    $modele = $input->model_bd;
                                                    if($modele == 'App\Teacher'){
                                                        $data = $modele::join('users', 'teachers.id', 'users.id')->get();
                                                    }elseif($modele == 'App\Student'){
                                                        $data = $modele::join('users', 'students.id', 'users.id')->get();
                                                    }elseif($modele == 'App\Groupe'){
                                                        $data = $modele::select('groupes.designation as groupe', 'groupes.id as groupe_id')->orderby('groupes.designation')->get();
                                                    }elseif($modele == 'App\Sousgroupe'){
                                                        $data = $modele::select('sousgroupes.designation as groupe_td', 'sousgroupes.id as groupe_td_id')->orderby('sousgroupes.designation')->get();
                                                    }elseif($modele == 'App\Sousgroupetp'){
                                                        $data = $modele::select('sousgroupetps.designation as groupe_tp', 'sousgroupetps.id as groupe_tp_id')->orderby('sousgroupetps.designation')->get();
                                                    }else{
                                                        $data = $modele::all();
                                                    }
                                                ?>
                                                @if($modele == 'App\Groupe')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->groupe_id }}">{{ @$value->groupe }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Sousgroupe')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->groupe_td_id }}">{{ @$value->groupe_td }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Sousgroupetp')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->groupe_tp_id }}">{{ @$value->groupe_tp }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Teacher' || $modele == 'App\Student' || $modele == 'App\User')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->name }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Specialite')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->designation }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Year')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->designation }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        @elseif($input->zone == 'relationship_multiple')
                                            <select multiple="multiple" name="{{ @$input->formulaire_input_id }}[]" id="{{ @$input->identifiant }}" class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif">
                                                <option value="">Choisir..</option>
                                                <?php
                                                    $modele = $input->model_bd;
                                                    if($modele == 'App\Teacher'){
                                                        $data = $modele::join('users', 'teachers.id', 'users.id')->get();
                                                    }elseif($modele == 'App\Student'){
                                                        $data = $modele::join('users', 'students.id', 'users.id')->get();
                                                    }elseif($modele == 'App\Groupe'){
                                                        $data = $modele::select('groupes.designation as groupe', 'groupes.id as groupe_id')->orderby('groupes.designation')->get();
                                                    }elseif($modele == 'App\Sousgroupe'){
                                                        $data = $modele::select('sousgroupes.designation as groupe_td', 'sousgroupes.id as groupe_td_id')->orderby('sousgroupes.designation')->get();
                                                    }elseif($modele == 'App\Sousgroupetp'){
                                                        $data = $modele::select('sousgroupetps.designation as groupe_tp', 'sousgroupetps.id as groupe_tp_id')->orderby('sousgroupetps.designation')->get();
                                                    }else{
                                                        $data = $modele::all();
                                                    }
                                                ?>
                                                @if($modele == 'App\Groupe')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->groupe_id }}">{{ @$value->groupe }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Sousgroupe')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->groupe_td_id }}">{{ @$value->groupe_td }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Sousgroupetp')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->groupe_tp_id }}">{{ @$value->groupe_tp }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Teacher' || $modele == 'App\Student' || $modele == 'App\User')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->name }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Specialite')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->designation }}</option>
                                                    @endforeach
                                                @elseif($modele == 'App\Year')
                                                    @foreach(@$data as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->designation }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        @elseif($input->zone == 'textarea')
                                            <textarea name="{{ @$input->formulaire_input_id }}"
                                              placeholder="{{ @$input->placeholder }}"
                                              id="{{ @$input->identifiant }}"
                                              rows="3"
                                              class="@if(@$input->class_style){{ @$input->class_style }}@else{{'form-control'}}@endif"
                                              @if(@$input->etat_required == '1') required @endif @if(@$input->etat_disabled == '1') disabled @endif>{{ @$the_called_value }}</textarea>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <!--<input type="text" placeholder="Enter your Name">
                            <input type="text" placeholder="Enter your Mail">
                            <textarea name="massage" placeholder="Type your massage"></textarea>-->
                            <div class="tp-support-form__btn">
                               <button class="tp-btn save_btn">Envoyer</button>
                            </div>
                        </form>
                    </div>
                @endif
            @endif
        </article>
     </div>
     @else
        <div class="row" style="text-align: center;"><img src="{{ asset('theme2/images/no_data.png') }}" alt="" style="width: 25%;"></div>
    @endif
    {{-- <button class="save_btn" type="submit">@lang('intranet.Envoyer')</button> --}}

@endsection
