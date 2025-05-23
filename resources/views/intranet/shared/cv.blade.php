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
            //     swal(
            //     '',
            //     msg,
            //     'warning'
            //   )
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



    <div class="row">
        {{-- <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content">
                <h4 class="">@lang('intranet.Stages')</h4>
            </div>
        </div> --}}
        <div class="col-lg-12 col-md-12">
            <div class="page-content container-fluid">
                <div class="row">
                    {{-- <h2 class="st_title fcrse_2">@lang('intranet.Personnaliser votre CV')</h2> --}}

                    <div class="col-md-8">
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <h2  style="text-align: center;font-size: 28px;margin-bottom: 20px">@lang('intranet.Personnaliser votre CV')</h2>

                                    <a href="{{route('print_cv')}}" class="btn btn-success pull-right save"><i class="fa fa-eye"></i> @lang('intranet.Visualiser thème 1')</a>
                                    <a href="{{route('print_cv_2')}}" class="btn btn-primary pull-right save" style="margin-right: 10px;"><i class="fa fa-eye"></i> @lang('intranet.Visualiser thème 2')</a>


                                    <h3>Profil</h3>
                                    <div style="margin-left: 20px;">
                                        {{-- @if (count($formation_pers) == 0)
                                           <div style="padding-top:10px;">@lang('intranet.Aucune formation ajoutée')</div>
                                        @else --}}


                                                <form action="{{ route('edit_add_title_cv') }}" class="form-edit-add" role="form"
                                                    method="POST" enctype="multipart/form-data" autocomplete="off">
                                                    @csrf
                                                    {{-- <input type="hidden" name="formation_id" value="{{ @$formation_per->id }}"> --}}
                                                    <div class="panel panel-bordered">

                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" id="cv_job_title" name="cv_job_title" rows="4" placeholder="Titre" required>{{ Auth::user()->cv_job_title }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" id="cv_profile" name="cv_profile" rows="4" placeholder="description" required>{{Auth::user()->cv_profile }}</textarea>
                                                        </div>




                                                        <button type="submit" class="btn btn-primary pull-right save">Modifier</button>
                                                    </div>
                                                </form>
                                                {{-- <a href="{{ route('delete_formation', ['id' => @$formation_per->id]) }}"
                                                    class="btn btn-danger">Supprimer</a> --}}


                                        {{-- @endif --}}
                                    </div>
                                <h3>ُEducations</h3>
                                <div style="margin-left: 20px;">
                                    @if (count($formation_pers) == 0)
                                       <div style="padding-top:10px;">@lang('intranet.Aucune formation ajoutée')</div>
                                    @else
                                        @foreach ($formation_pers as $formation_per)

                                            <form action="{{ route('edit_formation') }}" class="form-edit-add" role="form"
                                                method="POST" enctype="multipart/form-data" autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="formation_id" value="{{ @$formation_per->id }}">
                                                <div class="panel panel-bordered">
                                                    <div class="form-group col-md-12">
                                                        <label for="formation">Formations</label>
                                                        <select class="form-control select2" id="formation" name="formation">
                                                            @foreach ($formations as $formation)
                                                                <option value="{{ $formation->id }}"
                                                                    @if ($formation_per->designation_fr == $formation->designation_fr) selected @endif>
                                                                    {{ $formation->designation_fr }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="description" required>{{ $formation_per->description }}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="note">Début </label>
                                                        <input type="date" class="form-control" id="date_debut" name="date_debut"
                                                            placeholder="" value="{{ @$formation_per->start }}">
                                                    </div>
                                                    @if ($formation_per->is_current ==1)
                                                        <div class="form-group col-md-12" style="margin-bottom: 25px;">
                                                                <label class="switch">
                                                                    <input type="checkbox" id="require_login" name="is_current" checked
                                                                        onchange="editFormation(event)">
                                                                    <span></span>
                                                                </label>
                                                                <label for="require_login" class="lbl-quiz">Est actuel ?</label>
                                                        </div>

                                                    @endif
                                                    <div class="form-group col-md-12"  id="editFinFormation"  @if ($formation_per->is_current ==1) style="display:none" @endif>
                                                        <label for="note">Fin</label>
                                                        <input type="date" class="form-control" id="date_fin" name="date_fin"
                                                            placeholder="" value="{{ @$formation_per->end }}">
                                                    </div>
                                                    <div class="form-group col-md-12" >
                                                        <label for="note">Établissement</label>
                                                        <input type="text" class="form-control" id="etablissement" name="etablissement"
                                                            placeholder="" value="{{ @$formation_per->place }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary pull-right save">Modifier</button>
                                                </div>
                                            </form>
                                            <a href="{{ route('delete_formation', ['id' => @$formation_per->id]) }}"
                                                class="btn btn-danger">Supprimer</a>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                             <div class="panel-body" >{{--style="padding-top: 0px;" --}}
                                <h3>Expériences</h3>
                                <div style="margin-left: 20px;">
                                    @if (count($exps) == 0)
                                        <div style="padding-top:10px;">@lang('intranet.Aucune expérience ajoutée')</div>
                                    @else
                                        @foreach ($exps as $exp)

                                                <form action="{{ route('edit_experience') }}" class="form-edit-add" role="form"
                                                    method="POST" enctype="multipart/form-data" autocomplete="off">
                                                    @csrf
                                                    <input type="hidden" name="experience_id" value="{{ @$exp->id }}">
                                                    <div class="panel panel-bordered">
                                                        <div class=" form-group col-md-12">
                                                            <label for="experience">Type expériences</label>
                                                            <select class="form-control select2" id="experience" name="type_experience">
                                                                @foreach ($experiences as $experience)
                                                                    <option value="{{ $experience->id }}"
                                                                        @if ($exp->designation_fr == $experience->designation_fr) selected @endif>
                                                                        {{ $experience->designation_fr }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="note">Expérience</label>
                                                            <input type="text" class="form-control" id="experience" name="experience"
                                                                placeholder="" value="{{ $exp->designation }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" id="description" name="description" value="" rows="4"
                                                                placeholder="description" required>{{ $exp->description }}</textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="note">Début</label>
                                                            <input type="date" class="form-control" id="date_debut" name="date_debut"
                                                                placeholder="" value="{{ $exp->start }}">
                                                        </div>


                                                            <div class="form-group col-md-12" style="margin-bottom: 25px;">
                                                                    <label class="switch">
                                                                        <input type="checkbox" id="require_login" name="is_current" @if ($exp->is_current ==1) checked   @endif
                                                                            onchange="editExperience(event)">
                                                                        <span></span>
                                                                    </label>
                                                                    <label for="require_login" class="lbl-quiz">Est actuel ?</label>
                                                            </div>


                                                        <div class="form-group col-md-12" id="editFinExperience"  @if ($exp->is_current ==1) style="display:none" @endif>
                                                            <label for="note">Fin</label>
                                                            <input type="date" class="form-control" id="date_fin" name="date_fin"
                                                                placeholder="" value="{{ $exp->end }}">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary pull-right save">Modifier</button>
                                                    </div>
                                                </form>
                                                <a href="{{ route('delete_experience', ['id' => @$exp->id]) }}"
                                                    class="btn btn-danger">Supprimer</a>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="panel-body" >
                                <h3>Compétences</h3>
                                <div style="margin-left: 20px;">
                                    @if (count($comps) == 0)
                                        <div style="padding-top:10px;">@lang('intranet.Aucune compétence ajoutée')</div>
                                    @else
                                        @foreach ($comps as $comp)
                                            <li>
                                                {{ $comp->designation_fr }}
                                                (<a href="{{ route('delete_competence', ['id' => @$comp->id]) }}"
                                                   >Supprimer</a>)
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="panel-body" >
                                <h3> Langues</h3>
                                <div style="margin-left: 20px;">
                                    @if (count($langs) == 0)
                                        <div style="padding-top:10px;">@lang('intranet.Aucune langue ajoutée')</div>
                                    @else
                                        @foreach ($langs as $lang)
                                            <li>
                                                {{ $lang->designation }}
                                                (<a href="{{ route('delete_lg', ['id' => @$lang->id]) }}">Supprimer</a>)
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- form add formation --}}
                        <form action="{{ route('addFormations') }}" class="form-edit-add" role="form" method="POST"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="form-group col-md-12">
                                        <label for="formation">Formations</label>
                                        <select class="form-control select2" id="formation" name="formation">
                                            @foreach ($formations as $formation)
                                                <option value="{{ $formation->id }}">
                                                    {{ $formation->designation_fr }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" id="description"
                                            name="description"value="{{ old('description', $dataTypeContent->description ?? '') }}" rows="4"
                                            placeholder="description"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="note">Début </label>
                                        <input type="date" class="form-control" id="date_debut" name="date_debut"
                                            placeholder="" value="{{ old('date_debut', $dataTypeContent->date_debut ?? '') }}">
                                    </div>
                                    <div class="form-group col-md-12" style="margin-bottom: 25px;">
                                        <label class="switch">
                                            <input type="checkbox" id="require_login" name="is_current"
                                                onchange="currentFormation(event)">
                                            <span></span>
                                        </label>
                                        <label for="require_login"
                                            class="lbl-quiz">Est actuel ?</label>
                                    </div>
                                    <div class="form-group col-md-12" id="finFormation">
                                        <label for="note">Fin</label>
                                        <input type="date" class="form-control" id="date_fin" name="date_fin"
                                            placeholder="" value="{{ old('date_fin', $dataTypeContent->date_fin ?? '') }}">
                                    </div>
                                    <div class="form-group col-md-12" >
                                        <label for="note">Établissement</label>
                                        <input type="text" class="form-control" id="date_fin" name="etablissement"
                                            placeholder="" value="{{ old('etablissement', $dataTypeContent->etablissement ?? '') }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right save">Ajouter</button>
                                </div>
                            </div>
                        </form>
                        {{-- form d'ajout les experience de chercheur --}}
                        <form action="{{ route('addExperience') }}" class="form-edit-add" role="form" method="POST"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class=" form-group col-md-12">
                                        <label for="experience">Type Expériences</label>
                                        <select class="form-control select2" id="type_experience" name="type_experience">
                                            @foreach ($experiences as $experience)
                                                <option value="{{ $experience->id }}">
                                                    {{ $experience->designation_fr }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="note">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            placeholder="" value="{{ old('experience', $dataTypeContent->experience ?? '') }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" id="description"
                                            name="description"value="{{ old('description', $dataTypeContent->description ?? '') }}" rows="4"
                                            placeholder="description"></textarea>
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label for="note">Début</label>
                                        <input type="date" class="form-control" id="date_debut" name="date_debut"
                                            placeholder="" value="{{ old('date_debut', $dataTypeContent->date_debut ?? '') }}">
                                    </div>
                                    <div class="form-group col-md-12" style="margin-bottom: 25px;">
                                        <label class="switch">
                                            <input type="checkbox" id="require_login" name="is_current"
                                                onchange="currentExperience(event)">
                                            <span></span>
                                        </label>
                                        <label for="require_login"
                                            class="lbl-quiz">Est actuel ?</label>
                                    </div>
                                    <div class="form-group col-md-12" id="finExperience" >
                                        <label for="note">Fin</label>
                                        <input type="date" class="form-control" id="date_fin" name="date_fin"
                                            placeholder="" value="{{ old('end', $dataTypeContent->end ?? '') }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="note">Organisme</label>
                                        <input type="text" class="form-control" id="place" name="place"
                                            placeholder="" value="{{ old('place', $dataTypeContent->place ?? '') }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right save">Ajouter</button>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('addCompetence') }}" class="form-edit-add" role="form" method="POST"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="panel panel-bordered">
                                <div class="panel-body">

                                    <div class="form-group col-md-12">
                                        <label for="competence">Compétences</label>
                                        <select class="form-control select2" id="competence" name="competence">

                                           @foreach ($competence_categories as $competence_category)
                                                <optgroup label="{{ $competence_category->designation_fr }}">
                                                    @foreach ($competence_category->skills as $competence)
                                                    @if(!in_array($competence->designation_fr,$tab_competences))
                                                        <option value="{{ $competence->id }}">
                                                            {{ $competence->designation_fr }}
                                                        </option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>

                                           @endforeach


                                        </select>
                                    </div>

                                    {{-- <div class="form-group col-md-12">
                                        <textarea class="form-control" id="description"
                                            name="description"value="{{ old('description', $dataTypeContent->description ?? '') }}" rows="4"
                                            placeholder="description"></textarea>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary pull-right save">Ajouter</button>
                                </div>
                            </div>
                        </form>
                        {{-- form add language --}}
                        <form action="{{ route('addLanguage') }}" class="form-edit-add" role="form" method="POST"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="form-group col-md-12">
                                        <label for="langues">Langues</label>
                                        <select class="form-control select2" id="langue" name="langue">
                                            @foreach ($autorise_langue as $langue)
                                                <option value="{{ $langue->id }}">
                                                    {{ $langue->designation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right save">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <script>
          function currentFormation(e) {
            if (e.target.checked) {
                document.getElementById('finFormation').style.display = "none";
            } else {
                document.getElementById('finFormation').style.display = "block";
            }
        }

        function currentExperience(e) {
            if (e.target.checked) {
                document.getElementById('finExperience').style.display = "none";
            } else {
                document.getElementById('finExperience').style.display = "block";
            }
        }
        function editExperience(e) {
            if (e.target.checked) {
                document.getElementById('editFinExperience').style.display = "none";
            } else {
                document.getElementById('editFinExperience').style.display = "block";
            }
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
