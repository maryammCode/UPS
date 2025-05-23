@php

    if (@Auth::user()->role->name == 'Enseignant') {
        $data = App\TeachersPredefinedList::where('cin', auth()->user()->cin)->first();
        $departement_info = App\Department::find(@$data->department_id);
    } elseif (@Auth::user()->role->name == 'Etudiant') {

        // issue
        $coordonne = App\Coordinate::first();
        $data = App\StudentsPredefinedList::where('cin', Auth::user()->cin)
                ->where('year_id', $coordonne->current_year_id)
                ->first();
        /* $data = App\FormFicheRenseignement::where('student_id', auth()->user()->id)
            ->where('year_id', $coordonne->current_year_id)
            ->first(); */
    } else {
        $data = App\Models\User::join('personals', 'users.id', 'personals.id')
            ->where('users.id', auth()->user()->id)
            ->first();
    }
    $ni = 'Pas de résultats';
@endphp


<div class="cater_ttle">
    <h4>@lang('intranet.Données universitaires')</h4>
</div>
<ul class="allcate15">
    <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                style="font-size: 15px;font-weight: 600;">@lang('intranet.N°CIN') :</span>{{ @Auth::user()->cin }}</a></li>
    @if (@Auth::user()->role->name == 'Enseignant')
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Identifiant unique')
                    :</span>{{ @$data->identifiant_unique ? @$data->identifiant_unique : $ni }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Département') :</span>
                {{ @$departement_info->designation_fr ? @$departement_info->designation_fr : $ni }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Spécialité') :</span> {{ @$data->specialite_fr }}</a>
        </li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Grade') :</span> {{ @$data->grade_fr }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Type') :</span> {{ @$data->statut_fr }}</a>
        </li>
    @elseif (@Auth::user()->role->name == 'Etudiant')
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Groupe') :</span>
                {{ @$data->group->designation_fr }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Groupe TD') :</span>
                {{ @$data->groupTd->designation_fr }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Groupe TP') :</span>
                {{ @$data->groupTp->designation_fr }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.N°Inscription') :</span>
                {{ @$data->numero_inscription }}</a></li>
    @else
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Spécialité') :</span>
                {{ @$data->specialite_fr }}</a></li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Grade') :</span> {{ @$data->grade_fr }}</a>
        </li>
        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Type') :</span> {{ @$data->statut_fr }}</a>
        </li>
    @endif
</ul>
