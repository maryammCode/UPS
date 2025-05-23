@extends('voyager::master')

@section('page_title', __('voyager::generic.' . (isset($dataTypeContent->id) ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . (isset($dataTypeContent->id) ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <?php $user_info = App\Models\User::find($dataTypeContent->id); ?>
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
            action="@if (!is_null($dataTypeContent->getKey())) {{ route('voyager.' . $dataType->slug . '.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.' . $dataType->slug . '.store') }} @endif"
            method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if (isset($dataTypeContent->id))
                {{ method_field('PUT') }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Genre</label>
                                <select class="form-control select2" name="genre">
                                    <option value="M" @if($dataTypeContent->genre == 'Masculin' ) selected @endif>Masculin</option>
                                    <option value="F" @if($dataTypeContent->genre == 'Féminin' ) selected @endif>Féminin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('voyager::generic.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('voyager::generic.name') }}"
                                    value="{{ old('name', $dataTypeContent->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="cin">N°CIN</label>
                                <input type="text" class="form-control" id="cin" name="cin"
                                    placeholder="N°CIN"
                                    value="{{ old('cin', $dataTypeContent->cin ?? '') }}">
                            </div>


                            <div class="form-group">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                    value="{{ old('date_naissance', $dataTypeContent->date_naissance ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="lieu_naissance">Lieu de naissance</label>
                                <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance"
                                    placeholder="Lieu de naissance"
                                    value="{{ old('lieu_naissance', $dataTypeContent->lieu_naissance ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="nationalite">Nationalité</label>
                                <input type="text" class="form-control" id="nationalite" name="nationalite"
                                    placeholder="Nationalité"
                                    value="{{ old('nationalite', $dataTypeContent->nationalite ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="cnss">CNSS</label>
                                <input type="text" class="form-control" id="cnss" name="cnss"
                                    placeholder="CNSS"
                                    value="{{ old('cnss', $dataTypeContent->cnss ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Adresse"
                                    value="{{ old('address', $dataTypeContent->address ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">N°Téléphone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="N°Téléphone"
                                    value="{{ old('phone', $dataTypeContent->phone ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone2">N°Téléphone 2</label>
                                <input type="text" class="form-control" id="phone2" name="phone2"
                                    placeholder="N°Téléphone 2"
                                    value="{{ old('phone2', $dataTypeContent->phone2 ?? '') }}">
                            </div>


                            @if(@Auth::user()->role->name == 'admin' || @Auth::user()->role->name == 'webmaster')
                                <div class="form-group">
                                    <label for="phone">{{ __('voyager::profile.role_default') }}</label>
                                    @if(isset($dataTypeContent->id))
                                        @if(@Auth::user()->role->name == 'admin')
                                            <?php $all_roles = TCG\Voyager\Models\Role::all(); ?>
                                            <select class="form-control select2" name="role_id" required>
                                                <option value="" >Choisir..</option>
                                                @foreach($all_roles as $role)
                                                <option value="{{ @$role->id }}" @if($dataTypeContent->role_id == @$role->id ) selected @endif >{{ @$role->display_name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <?php $all_roles = TCG\Voyager\Models\Role::where('name', '<>', 'admin')->get(); ?>
                                            <select class="form-control select2" name="role_id" required>
                                                <option value="" >Choisir..</option>
                                                @foreach($all_roles as $role)
                                                <option value="{{ @$role->id }}" @if($dataTypeContent->role_id == @$role->id ) selected @endif>{{ @$role->display_name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    @else
                                        <?php $all_roles = TCG\Voyager\Models\Role::where('name', '<>', 'admin')->get(); ?>
                                        <select class="form-control select2" name="role_id" required>
                                            <option value="" >Choisir..</option>
                                            @foreach($all_roles as $role)
                                            <option value="{{ @$role->id }}" @if($dataTypeContent->role_id == @$role->id ) selected @endif>{{ @$role->display_name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                   
                                </div>
                            @endif
                        </div>


                        @if( !isset($dataTypeContent->id) || ( isset($dataTypeContent->id) && @$user_info->role->name == 'Etudiant' ))
                        <div class="panel-body">
                            @if(isset($dataTypeContent->id))
                                <?php
                                    $coordonnee = App\Coordinate::first();
                                    $student_info = App\Student::find($dataTypeContent->id);
                                ?>
                            @endif
                            <div class="form-group">
                                <h3><label style="color: #22a7f0;"><strong>Informations spécifiques aux étudiants</strong></label></h3>
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Nom du Père</label>
                                <input type="text" class="form-control" name="nom_pere" placeholder="Nom du Père" value="@if(isset($student_info->nom_pere)){{ $student_info->nom_pere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Prénom du Père</label>
                                <input type="text" class="form-control" name="prenom_pere" placeholder="Prénom du Père" value="@if(isset($student_info->prenom_pere)){{ $student_info->prenom_pere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Profession du Père</label>
                                <input type="text" class="form-control" name="profession_pere" placeholder="Profession du Père" value="@if(isset($student_info->profession_pere)){{ $student_info->profession_pere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Etablissement Profession du Père</label>
                                <input type="text" class="form-control" name="etablissement_prof_pere" placeholder="Etablissement Profession du Père" value="@if(isset($student_info->etablissement_prof_pere)){{ $student_info->etablissement_prof_pere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Nom de la Mère</label>
                                <input type="text" class="form-control" name="nom_mere" placeholder="Nom de la Mère" value="@if(isset($student_info->nom_mere)){{ $student_info->nom_mere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Prénom de la Mère</label>
                                <input type="text" class="form-control" name="prenom_mere" placeholder="Prénom de la Mère" value="@if(isset($student_info->prenom_mere)){{ $student_info->prenom_mere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Profession de la Mère</label>
                                <input type="text" class="form-control" name="profession_mere" placeholder="Profession de la Mère" value="@if(isset($student_info->profession_mere)){{ $student_info->profession_mere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Etablissement Profession de la Mère</label>
                                <input type="text" class="form-control" name="etablissement_prof_mere" placeholder="Etablissement Profession de la Mère" value="@if(isset($student_info->etablissement_prof_mere)){{ $student_info->etablissement_prof_mere }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Adresse des Parents</label>
                                <input type="text" class="form-control" name="adresse_parents" placeholder="Adresse des Parents" value="@if(isset($student_info->adresse_parents)){{ $student_info->adresse_parents }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Téléphone des Parents</label>
                                <input type="text" class="form-control" name="tel_parents" placeholder="Téléphone des Parents" value="@if(isset($student_info->tel_parents)){{ $student_info->tel_parents }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Nom Jeune Fille</label>
                                <input type="text" class="form-control" name="nom_jeune_fille" placeholder="Nom Jeune Fille" value="@if(isset($student_info->nom_jeune_fille)){{ $student_info->nom_jeune_fille }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Section BAC</label>
                                <select class="form-control select2" name="section_bac">
                                    <option value="" >Choisir..</option>
                                    <option value="Mathématiques" @if(@$student_info->section_bac == 'Mathématiques' ) selected @endif>Mathématiques</option>
                                    <option value="Sciences Expérimentales" @if(@$student_info->section_bac == 'Sciences Expérimentales' ) selected @endif>Sciences Expérimentales</option>
                                    <option value="Techniques" @if(@$student_info->section_bac == 'Techniques' ) selected @endif>Techniques</option>
                                    <option value="Informatique" @if(@$student_info->section_bac == 'Informatique' ) selected @endif>Informatique</option>
                                    <option value="Economie et Gestion" @if(@$student_info->section_bac == 'Economie et Gestion' ) selected @endif>Economie et Gestion</option>
                                    <option value="Lettres" @if(@$student_info->section_bac == 'Lettres' ) selected @endif>Lettres</option>
                                    <option value="Sport" @if(@$student_info->section_bac == 'Sport' ) selected @endif>Sport</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Année BAC</label>
                                <input type="number" class="form-control" name="annee_bac" min="2000" step="any" placeholder="Année BAC" value="@if(isset($student_info->annee_bac)){{ $student_info->annee_bac }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Session BAC</label>
                                <select class="form-control select2" name="session_bac">
                                    <option value="" >Choisir..</option>
                                    <option value="Principale" @if(@$student_info->session_bac == 'Principale' ) selected @endif>Principale</option>
                                    <option value="Contrôle" @if(@$student_info->session_bac == 'Contrôle' ) selected @endif>Contrôle</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Mention BAC</label>
                                <select class="form-control select2" name="mention_bac">
                                    <option value="Bien" @if(@$student_info->mention_bac == 'Bien' ) selected @endif>Bien</option>
                                    <option value="Très Bien" @if(@$student_info->mention_bac == 'Très Bien' ) selected @endif>Très Bien</option>
                                    <option value="Assez Bien" @if(@$student_info->mention_bac == 'Assez Bien' ) selected @endif>Assez Bien</option>
                                    <option value="Passable" @if(@$student_info->mention_bac == 'Passable' ) selected @endif>Passable</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Moyenne BAC</label>
                                <input type="number" class="form-control" name="moyenne_bac" min="9,5" step="0.01" placeholder="Moyenne BAC" value="@if(isset($student_info->moyenne_bac)){{ $student_info->moyenne_bac }}@endif">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label for="">Gouvernorat BAC</label>
                                <input type="text" class="form-control" name="pays_bac" placeholder="Gouvernorat BAC" value="@if(isset($student_info->pays_bac)){{ $student_info->pays_bac }}@endif">
                            </div>
                        </div>
                        @endif


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if (isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image($dataTypeContent->avatar) }}"
                                        style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="{{ __('voyager::generic.email') }}"
                                    value="{{ old('email', $dataTypeContent->email ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if (isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    placeholder="{{ __('voyager::generic.linkedin') }}"
                                    value="{{ old('linkedin', $dataTypeContent->linkedin ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="cv">CV</label>
                                <input type="file" accept="/pdf" class="form-control" id="cv" name="cv"
                                    value="{{ old('cv', $dataTypeContent->cv ?? '') }}">
                            </div>
                            @php
                                if (isset($dataTypeContent->locale)) {
                                    $selected_locale = $dataTypeContent->locale;
                                } else {
                                    $selected_locale = config('app.locale', 'en');
                                }
                            @endphp
                            <div class="form-group">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale">
                                    @foreach (Voyager::getLocales() as $locale)
                                        <option value="{{ $locale }}"
                                            {{ $locale == $selected_locale ? 'selected' : '' }}>{{ $locale }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        @if( !isset($dataTypeContent->id) || ( isset($dataTypeContent->id) && @$user_info->role->name != 'Etudiant' && @$user_info->role->name != 'Enseignant' ))
                            <div class="panel-body">
                                @if(isset($dataTypeContent->id))
                                    <?php $personnel_info = App\Personal::find($dataTypeContent->id); ?>
                                @endif
                                <div class="form-group">
                                    <h3><label style="color: #22a7f0;"><strong>Informations spécifiques aux agents personnels</strong></label></h3>
                                </div>


                                <div class="form-group">
                                    <label for="grade_fr">Grade Fr</label>
                                    <input type="text" class="form-control" id="grade_personal_fr" name="grade_personal_fr"
                                        placeholder="grade_fr"
                                        value="{{ old('grade_fr', $personnel_info->grade_fr ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="grade_en">Grade En</label>
                                    <input type="text" class="form-control" id="grade_personal_en" name="grade_personal_en"
                                        placeholder="grade_en"
                                        value="{{ old('grade_en', $personnel_info->grade_en ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="grade_ar">Grade Ar</label>
                                    <input type="text" class="form-control" id="grade_personal_ar" name="grade_personal_ar"
                                        placeholder="grade_ar"
                                        value="{{ old('grade_ar', $personnel_info->grade_ar ?? '') }}">
                                </div>

                                <div class="form-group">
                                    <label for="service_fr">Service Fr</label>
                                    <input type="text" class="form-control" id="service_fr" name="service_fr"
                                        placeholder="service_fr"
                                        value="{{ old('service_fr', $personnel_info->service_fr ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="service_en">Service En</label>
                                    <input type="text" class="form-control" id="service_en" name="service_en"
                                        placeholder="service_en"
                                        value="{{ old('service_en', $personnel_info->service_en ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="service_ar">Service Ar</label>
                                    <input type="text" class="form-control" id="service_ar" name="service_ar"
                                        placeholder="service_ar"
                                        value="{{ old('service_ar', $personnel_info->service_ar ?? '') }}">
                                </div>

                                <div class="form-group">
                                    <label for="fonction_fr">Fonction Fr</label>
                                    <input type="text" class="form-control" id="fonction_fr" name="fonction_fr"
                                        placeholder="fonction_fr"
                                        value="{{ old('fonction_fr', $personnel_info->fonction_fr ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="fonction_en">Fonction En</label>
                                    <input type="text" class="form-control" id="fonction_en" name="fonction_en"
                                        placeholder="fonction_en"
                                        value="{{ old('fonction_en', $personnel_info->fonction_en ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="fonction_ar">Fonction Ar</label>
                                    <input type="text" class="form-control" id="fonction_ar" name="fonction_ar"
                                        placeholder="fonction_ar"
                                        value="{{ old('fonction_ar', $personnel_info->fonction_ar ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="fonction_ar">Afficher dans la partie Front</label>
                                    <input type="checkbox" class="toggleswitch" id="affichage_in_front" name="affichage_in_front"
                                            @if(isset($personnel_info->affichage_in_front) && $personnel_info->affichage_in_front == '1') checked @endif>
                                </div>
                            </div>
                        @endif
                        @if( !isset($dataTypeContent->id) || ( isset($dataTypeContent->id) && @$user_info->role->name == 'Enseignant' ))
                            <div class="panel-body">
                                @if(isset($dataTypeContent->id))
                                    <?php $teacher_info = App\Teacher::where('cin', $dataTypeContent->cin)->first(); ?>
                                @endif
                                <div class="form-group">
                                    <h3><label style="color: #22a7f0;"><strong>Informations spécifiques aux enseignant(e)</strong></label></h3>
                                </div>
                                <div class="form-group">
                                    <?php $all_departements = App\Department::all(); ?>
                                    <label for="department_id">Département</label>
                                    <select class="form-control" name="department_id">
                                        <option>Choisir</option>
                                        @foreach($all_departements as $data)
                                        <option value="{{ @$data->id }}" @if(@$teacher_info->department_id == @$data->id) selected @endif>{{ @$data->designation_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="grade_fr">Grade Fr</label>
                                    <input type="text" class="form-control" id="grade_fr" name="grade_fr"
                                        placeholder="grade_fr"
                                        value="{{ old('grade_fr', $teacher_info->grade_fr ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="grade_en">Grade En</label>
                                    <input type="text" class="form-control" id="grade_en" name="grade_en"
                                        placeholder="grade_en"
                                        value="{{ old('grade_en', $teacher_info->grade_en ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="grade_ar">Grade Ar</label>
                                    <input type="text" class="form-control" id="grade_ar" name="grade_ar"
                                        placeholder="grade_ar"
                                        value="{{ old('grade_ar', $teacher_info->grade_ar ?? '') }}">
                                </div>

                                <div class="form-group">
                                    <label for="specialite_fr">Spécialité Fr</label>
                                    <input type="text" class="form-control" id="specialite_fr" name="specialite_fr"
                                        placeholder="specialite_fr"
                                        value="{{ old('specialite_fr', $teacher_info->specialite_fr ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="specialite_en">Spécialité En</label>
                                    <input type="text" class="form-control" id="specialite_en" name="specialite_en"
                                        placeholder="specialite_en"
                                        value="{{ old('specialite_en', $teacher_info->specialite_en ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="specialite_ar">Spécialité Ar</label>
                                    <input type="text" class="form-control" id="specialite_ar" name="specialite_ar"
                                        placeholder="specialite_ar"
                                        value="{{ old('specialite_ar', $teacher_info->specialite_ar ?? '') }}">
                                </div>

                                <div class="form-group">
                                    <label for="statut_fr">Statut Fr</label>
                                    <input type="text" class="form-control" id="statut_fr" name="statut_fr"
                                        placeholder="statut_fr"
                                        value="{{ old('statut_fr', $teacher_info->statut_fr ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="statut_en">Statut En</label>
                                    <input type="text" class="form-control" id="statut_en" name="statut_en"
                                        placeholder="statut_en"
                                        value="{{ old('statut_en', $teacher_info->statut_en ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="statut_ar">Statut Ar</label>
                                    <input type="text" class="form-control" id="statut_ar" name="statut_ar"
                                        placeholder="statut_ar"
                                        value="{{ old('statut_ar', $teacher_info->statut_ar ?? '') }}">
                                </div>

                                <div class="form-group">
                                    <label for="poste">N°Poste</label>
                                    <input type="text" class="form-control" id="poste" name="poste" placeholder="N°Poste"
                                           value="@if(isset($teacher_info->poste)){{ $teacher_info->poste }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="identifiant_unique">Identifiant Unique</label>
                                    <input type="text" class="form-control" id="identifiant_unique" name="identifiant_unique" placeholder="Identifiant Unique"
                                           value="@if(isset($teacher_info->identifiant_unique)){{ $teacher_info->identifiant_unique }}@endif">
                                </div>
                            </div>
                        @endif





                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
        <div style="display:none">
            <input type="hidden" id="upload_url" value="{{ route('voyager.upload') }}">
            <input type="hidden" id="upload_type_slug" value="{{ $dataType->slug }}">
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function() {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
