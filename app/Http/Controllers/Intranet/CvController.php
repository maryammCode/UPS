<?php

namespace App\Http\Controllers\Intranet;

use App\CvEducation;
use App\CvEducationType;
use App\CvExperience;
use App\CvExperienceType;
use App\CvLanguage;
use App\CvLanguageUser;
use App\CvSetting;
use App\CvSkill;
use App\CvSkillUser;
use App\CvSkillCategory;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function showProfile($id){
    //     $user = User::where('id',$id)->where('publier', 1)->first();
    //     if(! $user) return redirect()->route('membres');
    //     $competences = CvSkill::
    //     join('cv_skill_users', 'cv_skill_users.cv_skill_id', 'cv_skills.id')
    //     ->where('cv_skill_users.user_id', $id)
    //     ->where('cv_skills.publier', 1)
    //     ->get();
    //     $formations = CvEducationType::
    //     join('cv_educations', 'cv_educations.cv_education_type_id', 'cv_education_types.id')
    //     ->where('cv_educations.user_id', $id)
    //     ->where('cv_educations.publier', 1)
    //     ->get();
    //     $langues = CvLanguage::
    //     join('cv_language_users', 'cv_language_users.cv_language_id', 'cv_languages.id')
    //     ->where('cv_language_users.user_id', $id)
    //     ->get();
    //     $experiences =CvExperienceType::
    //     join('cv_experiences', 'cv_experiences.cv_experience_type_id', 'cv_experience_types.id')
    //     ->where('cv_experiences.user_id', $id)
    //     ->where('cv_experiences.publier', 1)
    //     ->get();

    //     return view('intranet.shared.cv', compact('user', 'competences', 'formations', 'langues', 'experiences'));
    // }

    public function showCv()
    {
        // language cv
        $langs = CvLanguage::join('cv_language_users', 'cv_languages.id', '=', 'cv_language_users.cv_language_id')
            ->where('cv_language_users.user_id', @Auth::user()->id)
            ->select('cv_language_users.id', 'cv_languages.designation')
            ->get();

        $tab_langues = [];
        foreach ($langs as $lg) {
            if (!in_array($lg->designation, $tab_langues)) {
                $tab_langues[] = $lg->designation;
            }
        }


        $autorise_langue = CvLanguage::WhereNotIn('designation', $tab_langues)
            ->orderby('designation')
            ->get();

        $experiences = CvExperienceType::all();

        $exps = CvExperienceType::join('cv_experiences', 'cv_experience_types.id', '=', 'cv_experiences.cv_experience_type_id')
            ->where('cv_experiences.user_id', @Auth::user()->id)
            ->get();

        $competences = CvSkill::all();

        $comps = CvSkill::join('cv_skill_users', 'cv_skills.id', '=', 'cv_skill_users.cv_skill_id')
            ->where('cv_skill_users.user_id', @Auth::user()->id)
            ->get();

        $tab_competences = $comps->pluck('designation_fr')->toArray();

        $competence_categories = CvSkillCategory::all();

        $formations = CvEducationType::all();

        $formation_pers = CvEducationType::join('cv_educations', 'cv_education_types.id', '=', 'cv_educations.cv_education_type_id')
            ->where('cv_educations.user_id', @Auth::user()->id)
            ->get();

        $page = 'cv';
        $active_page = 'cv';
        return view('intranet.shared.cv', compact('page', 'tab_competences', 'autorise_langue', 'experiences', 'exps', 'competences', 'comps', 'formations', 'formation_pers', 'langs', 'active_page', 'competence_categories'));
    }

    public function printCv()
    {
        // language cv
        $langs = CvLanguage::join('cv_language_users', 'cv_languages.id', '=', 'cv_language_users.cv_language_id')
            ->where('cv_language_users.user_id', @Auth::user()->id)
            ->select('cv_language_users.id', 'cv_languages.designation')
            ->get();

        $tab_langues = [];
        foreach ($langs as $lg) {
            if (!in_array($lg->designation, $tab_langues)) {
                $tab_langues[] = $lg->designation;
            }
        }


        $autorise_langue = CvLanguage::WhereNotIn('designation', $tab_langues)
            ->orderby('designation')
            ->get();

        $experiences = CvExperienceType::all();

        $exps = CvExperienceType::join('cv_experiences', 'cv_experience_types.id', '=', 'cv_experiences.cv_experience_type_id')
            ->where('cv_experiences.user_id', @Auth::user()->id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $competences = CvSkill::all();

        $comps = CvSkill::join('cv_skill_users', 'cv_skills.id', '=', 'cv_skill_users.cv_skill_id')
            ->where('cv_skill_users.user_id', @Auth::user()->id)
            ->get();

        $tab_competences = $comps->pluck('designation_fr')->toArray();

        $competence_categories = CvSkillCategory::all();

        $formations = CvEducationType::all();

        $formation_pers = CvEducationType::join('cv_educations', 'cv_education_types.id', '=', 'cv_educations.cv_education_type_id')
            ->where('cv_educations.user_id', @Auth::user()->id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $page = 'cv';
        $active_page = 'cv';
        $cv_setting = CvSetting::where('user_id', @Auth::user()->id)->first();
        return view(
            'intranet.shared.cv_print',
            compact(
                'page',
                'tab_competences',
                'autorise_langue',
                'experiences',
                'exps',
                'competences',
                'comps',
                'formations',
                'formation_pers',
                'langs',
                'active_page',
                'competence_categories',
                'cv_setting'
            )
        );
    }

    public function printCv2()
    {
        // language cv
        $langs = CvLanguage::join('cv_language_users', 'cv_languages.id', '=', 'cv_language_users.cv_language_id')
            ->where('cv_language_users.user_id', @Auth::user()->id)
            ->select('cv_language_users.id', 'cv_languages.designation')
            ->get();

        $tab_langues = [];
        foreach ($langs as $lg) {
            if (!in_array($lg->designation, $tab_langues)) {
                $tab_langues[] = $lg->designation;
            }
        }


        $autorise_langue = CvLanguage::WhereNotIn('designation', $tab_langues)
            ->orderby('designation')
            ->get();

        $experiences = CvExperienceType::all();

        $exps = CvExperienceType::join('cv_experiences', 'cv_experience_types.id', '=', 'cv_experiences.cv_experience_type_id')
            ->where('cv_experiences.user_id', @Auth::user()->id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $competences = CvSkill::all();

        $comps = CvSkill::join('cv_skill_users', 'cv_skills.id', '=', 'cv_skill_users.cv_skill_id')
            ->where('cv_skill_users.user_id', @Auth::user()->id)
            ->get();

        $tab_competences = $comps->pluck('designation_fr')->toArray();

        $competence_categories = CvSkillCategory::all();

        $formations = CvEducationType::all();

        $formation_pers = CvEducationType::join('cv_educations', 'cv_education_types.id', '=', 'cv_educations.cv_education_type_id')
            ->where('cv_educations.user_id', @Auth::user()->id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $page = 'cv';
        $active_page = 'cv';
        $cv_setting = CvSetting::where('user_id', @Auth::user()->id)->first();
        return view(
            'intranet.shared.cv_print_2',
            compact(
                'page',
                'tab_competences',
                'autorise_langue',
                'experiences',
                'exps',
                'competences',
                'comps',
                'formations',
                'formation_pers',
                'langs',
                'active_page',
                'competence_categories',
                'cv_setting'
            )
        );
    }

    public function addLanguage(Request $request)
    {

        $user_langue = new CvLanguageUser();
        $user_langue->user_id = auth()->user()->id;
        $user_langue->cv_language_id = $request->langue;
        $user_langue->note = $request->note;
        $user_langue->save();

        return back();
    }

    public function addExperience(Request $request)
    {
        $user_exeperience = new CvExperience();
        $user_exeperience->user_id = auth()->user()->id;
        $user_exeperience->cv_experience_type_id = $request->type_experience;
        $user_exeperience->designation = $request->experience;
        $user_exeperience->description = $request->description;
        $user_exeperience->place = $request->place;
        if ($request->is_current == 'on') {
            $user_exeperience->is_current = 1;
        } else {
            $user_exeperience->is_current = 0;
        }
        $user_exeperience->start = $request->date_debut;
        $user_exeperience->end = $request->date_fin;
        $user_exeperience->save();

        return back();
    }

    public function addCompetence(Request $request)
    {
        $user_competence = new CvSkillUser();
        $user_competence->user_id = auth()->user()->id;
        $user_competence->cv_skill_id = $request->competence;


        $user_competence->save();

        return back();
    }

    public function addFormations(Request $request)
    {
        $user_formation = new CvEducation();
        $user_formation->user_id = auth()->user()->id;
        $user_formation->cv_education_type_id = $request->formation;
        $user_formation->description = $request->description;
        $user_formation->start = $request->date_debut;
        $user_formation->end = $request->date_fin;
        $user_formation->place = $request->etablissement;
        if ($request->is_current == 'on') {
            $user_formation->is_current = 1;
        } else
            $user_formation->is_current = 0;
        $user_formation->save();

        return back();
    }

    public function edit_formation(Request $request)
    {
        $user_formation = CvEducation::find($request->formation_id);
        $user_formation->user_id = auth()->user()->id;
        $user_formation->cv_education_type_id = $request->formation;
        $user_formation->description = $request->description;
        $user_formation->start = $request->date_debut;
        $user_formation->end = $request->date_fin;
        $user_formation->place = $request->etablissement;
        if ($request->is_current == 'on') {
            $user_formation->is_current = 1;
        } else
            $user_formation->is_current = 0;
        $user_formation->save();
        return back();
    }

    public function edit_experience(Request $request)
    {
        $user_exeperience = CvExperience::find($request->experience_id);
        $user_exeperience->user_id = auth()->user()->id;
        $user_exeperience->cv_experience_type_id = $request->type_experience;
        $user_exeperience->description = $request->description;
        $user_exeperience->designation = $request->experience;
        $user_exeperience->start = $request->date_debut;
        $user_exeperience->end = $request->date_fin;
        $user_exeperience->place = $request->place;
        if ($request->is_current == 'on') {
            $user_exeperience->is_current = 1;
        } else {
            $user_exeperience->is_current = 0;
        }

        $user_exeperience->save();
        return back();
    }

    public function edit_competence(Request $request)
    {
        $chercheur_competence = CvSkillUser::find($request->competence_id);
        $chercheur_competence->user_id = auth()->user()->id;
        $chercheur_competence->competence_id = $request->competence;
        $chercheur_competence->description = $request->description;
        $chercheur_competence->save();
        return back();
    }

    // function delete
    public function delete_formation($id)
    {
        $chercheur_formation = CvEducation::find($id);
        if ($chercheur_formation->user_id == auth()->user()->id) {
            CvEducation::where('id', $id)->delete();
        }
        return back();
    }
    public function delete_experience($id)
    {
        $chercheur_exeperience = CvExperience::find($id);
        if ($chercheur_exeperience->user_id == auth()->user()->id) {
            CvExperience::where('id', $id)->delete();
        }
        return back();
    }
    public function delete_competence($id)
    {
        $chercheur_competence = CvSkillUser::find($id);
        if ($chercheur_competence->user_id == auth()->user()->id) {
            CvSkillUser::where('id', $id)->delete();
        }
        return back();
    }
    public function delete_lg($id)
    {
        $chercheur_langue = CvLanguageUser::find($id);
        if ($chercheur_langue->user_id == auth()->user()->id) {
            CvLanguageUser::where('id', $id)->delete();
        }
        return back();
    }

    public function updateCvSettings(Request $request)
    {

        $cv_settings = CvSetting::where('user_id', auth()->user()->id)->first();

        if (!$cv_settings) {
            $cv_settings = new CvSetting();
            $cv_settings->user_id = auth()->user()->id;
        }
        $cv_settings->cv_side_bg = $request->cv_side_bg;
        $cv_settings->cv_side_color_text = $request->cv_side_color_text;
        $cv_settings->cv_head_bg = $request->cv_head_bg;
        $cv_settings->cv_head_color_text = $request->cv_head_color_text;
        $cv_settings->publier = $request->publier;
        $cv_settings->theme = $request->theme;
        $cv_settings->save();
        return back();
    }

    public function userCV($user_id)
    {
        $cv_setting = CvSetting::where('user_id', $user_id)->where('theme', 1)->first();
        if (!$cv_setting || $cv_setting->publier != 1) {
            return back();
        }
        $user = User::find($user_id);
        // language cv
        $langs = CvLanguage::join('cv_language_users', 'cv_languages.id', '=', 'cv_language_users.cv_language_id')
            ->where('cv_language_users.user_id', $user_id)
            ->select('cv_language_users.id', 'cv_languages.designation')
            ->get();

        $tab_langues = [];
        foreach ($langs as $lg) {
            if (!in_array($lg->designation, $tab_langues)) {
                $tab_langues[] = $lg->designation;
            }
        }


        $autorise_langue = CvLanguage::WhereNotIn('designation', $tab_langues)
            ->orderby('designation')
            ->get();

        $experiences = CvExperienceType::all();

        $exps = CvExperienceType::join('cv_experiences', 'cv_experience_types.id', '=', 'cv_experiences.cv_experience_type_id')
            ->where('cv_experiences.user_id', $user_id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $competences = CvSkill::all();

        $comps = CvSkill::join('cv_skill_users', 'cv_skills.id', '=', 'cv_skill_users.cv_skill_id')
            ->where('cv_skill_users.user_id', $user_id)
            ->get();

        $tab_competences = $comps->pluck('designation_fr')->toArray();

        $competence_categories = CvSkillCategory::all();

        $formations = CvEducationType::all();

        $formation_pers = CvEducationType::join('cv_educations', 'cv_education_types.id', '=', 'cv_educations.cv_education_type_id')
            ->where('cv_educations.user_id', $user_id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $page = 'cv';
        $active_page = 'cv';
        return view(
            'intranet.shared.user_cv',
            compact(
                'page',
                'tab_competences',
                'autorise_langue',
                'experiences',
                'exps',
                'competences',
                'comps',
                'formations',
                'formation_pers',
                'langs',
                'active_page',
                'competence_categories',
                'cv_setting',
                'user'
            )
        );
    }

    public function userCVTheme2($user_id)
    {
        $cv_setting = CvSetting::where('user_id', $user_id)->where('theme', 2)->first();
        if (!$cv_setting || $cv_setting->publier != 1) {
            return back();
        }
        $user = User::find($user_id);
        // language cv
        $langs = CvLanguage::join('cv_language_users', 'cv_languages.id', '=', 'cv_language_users.cv_language_id')
            ->where('cv_language_users.user_id', $user_id)
            ->select('cv_language_users.id', 'cv_languages.designation')
            ->get();

        $tab_langues = [];
        foreach ($langs as $lg) {
            if (!in_array($lg->designation, $tab_langues)) {
                $tab_langues[] = $lg->designation;
            }
        }


        $autorise_langue = CvLanguage::WhereNotIn('designation', $tab_langues)
            ->orderby('designation')
            ->get();

        $experiences = CvExperienceType::all();

        $exps = CvExperienceType::join('cv_experiences', 'cv_experience_types.id', '=', 'cv_experiences.cv_experience_type_id')
            ->where('cv_experiences.user_id', $user_id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $competences = CvSkill::all();

        $comps = CvSkill::join('cv_skill_users', 'cv_skills.id', '=', 'cv_skill_users.cv_skill_id')
            ->where('cv_skill_users.user_id', $user_id)
            ->get();

        $tab_competences = $comps->pluck('designation_fr')->toArray();

        $competence_categories = CvSkillCategory::all();

        $formations = CvEducationType::all();

        $formation_pers = CvEducationType::join('cv_educations', 'cv_education_types.id', '=', 'cv_educations.cv_education_type_id')
            ->where('cv_educations.user_id', $user_id)
            ->orderBy('is_current', 'desc')
            ->orderBy('end', 'desc')
            ->get();

        $page = 'cv';
        $active_page = 'cv';
        return view(
            'intranet.shared.user_cv_theme2',
            compact(
                'page',
                'tab_competences',
                'autorise_langue',
                'experiences',
                'exps',
                'competences',
                'comps',
                'formations',
                'formation_pers',
                'langs',
                'active_page',
                'competence_categories',
                'cv_setting',
                'user'
            )
        );
    }

    public function edit_add_title_cv(Request $request)
    {
        $new_cv_config =  User::find(Auth::user()->id);
        $new_cv_config->cv_job_title = $request->cv_job_title;
        $new_cv_config->cv_profile = $request->cv_profile;
        $new_cv_config->save();
        return back()->with('success', 'Mise à jour effectuee avec succes');
    }
}
