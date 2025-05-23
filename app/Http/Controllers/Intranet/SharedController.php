<?php

namespace App\Http\Controllers\Intranet;

use App\Absence;
use App\AbsenceStudent;
use App\Claim;
use App\Http\Services\GeneratorPdfService;
use App\Theme;
use App\Booking;
use App\Book;
use App\BookingConfig;
use App\Destination;
use App\ClaimType;
use App\ClaimUser;
use App\Comment;
use App\Coordinate;
use App\Course;
use App\Emploi;
use App\Formation;
use App\FormFicheRenseignement;
use App\Group;
use App\GroupTd;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\News;
use App\Event;
use App\Offer;
use App\Rapport;
use App\Soutenance;
use App\Stage;
use App\Student;
use App\StudentsPredefinedList;
use App\Teacher;
use App\TypeFormation;
use App\Year;
use App\DefaultCover;
use App\Domaine;
use App\Entreprise;
use App\ForumSubject;
use App\ForumSubjectComment;
use App\Http\Services\NotificationService;
use App\Notification;
use App\OfferUser;
use App\Period;
use App\OfferRequest;
use App\StageActivity;
use App\Subject;
use App\CourseRender;
use App\SubjectDocument;
use App\Testimonial;
use App\CvSetting;
use App\CoursesGroupTd;
use App\Note;
use App\OfferType;
use App\StageDocumentType;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Models\Role;

class SharedController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allNotifications()
    {


        $notifications = Notification::where('user_id', Auth::user()->id)->latest()->paginate(30);
        $nb_notifications = Notification::where('user_id', Auth::user()->id)->where('seen', 0)->count();
        $active_page = 'notifications';
        return view('intranet.shared.all_notifications', compact('notifications', 'active_page', 'nb_notifications'));
    }

    public function getLastNotifications(Request $request)
    {

        //convert last_date time with carbon
        $last_date = Carbon::parse($request->last_date)->format('Y-m-d');

        $time = Carbon::parse($request->last_date)->format('H:i:s');
        $notifications = Notification::where('user_id', Auth::user()->id)->whereDate('created_at', '>=', $last_date)->whereTime('created_at', '>=', $time)
            ->where('is_notif_sent', 0)->with('user')->get();
        if ($notifications->count() > 0) {
            $notif_ids = $notifications->pluck('id');
            Notification::whereIn('id', $notif_ids)->update(['is_notif_sent' => 1]);
        }
        $nb_notifications = Notification::where('user_id', Auth::user()->id)->where('seen', 0)->count();


        return ['notifications' => $notifications, 'nb_notifications' => $nb_notifications, 'last_date' => $time];
    }

    public function notificationSeen($id)
    {
        $notification = Notification::find($id);
        $notification->seen = 1;
        $notification->save();
        return $notification;
    }


    public function showCompanyOffers()
    {

        $offres = Offer::orderBy('created_at', 'desc')->where('entreprise_id', Auth::user()->entreprise_id)->get();
        $offer_types = OfferType::where('publier', 1)->get();
        $active_page = 'company_offers';
        // dd($offres);

        return view('intranet.companies.company_offers', compact('offres', 'active_page', 'offer_types'));
    }


    public function applyOffer(Request $request)
    {

        $new_apply_offer = new OfferUser();
        $new_apply_offer->user_id = $request->user_id;
        $new_apply_offer->offer_id = $request->offer_id;
        $new_apply_offer->note = $request->note;
        $new_apply_offer->seen = 0;
        $new_apply_offer->save();

        (new NotificationService())->send($request->user_id, 'Vous avez reçu une nouvelle offre', '/intranet/details_offre/' . $request->offer_id);


        return back()->with('success', 'Offer postuler avec succès');
    }

    public function applyOfferStageStudent(Request $request)
    {
        $new_apply_offer_student = new OfferRequest();
        $new_apply_offer_student->user_id = $request->user_id;
        $new_apply_offer_student->type_id = $request->type_id;
        $new_apply_offer_student->domaine = $request->domaine;
        $new_apply_offer_student->description = $request->description;
        $new_apply_offer_student->start_date = $request->start_date;
        $new_apply_offer_student->end_date = $request->end_date;
        $new_apply_offer_student->publier = 1;
        $new_apply_offer_student->save();
        return back()->with('success', 'Offer postuler avec succès');
    }

    public function updateApplyOfferStageStudent(Request $request, $id)
    {
        $new_apply_offer_student =  OfferRequest::find($id);
        $new_apply_offer_student->user_id = $request->user_id;
        $new_apply_offer_student->type_id = $request->type_id;
        $new_apply_offer_student->domaine = $request->domaine;
        $new_apply_offer_student->description = $request->description;
        $new_apply_offer_student->start_date = $request->start_date;
        $new_apply_offer_student->end_date = $request->end_date;
        $new_apply_offer_student->publier = 1;
        $new_apply_offer_student->save();
        return back()->with('success', 'Offer modifier avec succès');
    }

    /*  public function applyOfferFromStudent(Request $request, $id)
    {

        $offre =  Offer::find($id);
        $new_apply_offer_from_student = new Stage();
        $new_apply_offer_from_student->candidat_1_name = Auth::user()->name;
        $new_apply_offer_from_student->candidat_1_id = Auth::user()->id;
        $new_apply_offer_from_student->offer_id = $request->offer_id;
        $new_apply_offer_from_student->entreprise_id = $offre->entreprise_id;
        $new_apply_offer_from_student->sujet = $offre->designation_fr;
        $new_apply_offer_from_student->description = $offre->description_fr;
        $new_apply_offer_from_student->motivation_letter = $request->motivation_letter;
        $new_apply_offer_from_student->status = 0;
        $new_apply_offer_from_student->type_stage = 'candidature';
        $new_apply_offer_from_student->save();
        return back()->with('success', 'Offer postuler avec succès');
    } */

    public function addOffers(Request $request)
    {

        $new_offer = new Offer();
        $new_offer->designation_fr = $request->designation_fr;
        $entreprise = Entreprise::find(Auth::user()->entreprise_id);
        $new_offer->phone = $entreprise->phone;
        $new_offer->address = $entreprise->address;
        $new_offer->responsible = $entreprise->responsable_name;
        $new_offer->email = $request->email;
        $new_offer->description_fr = $request->description_fr;
        $new_offer->offer_type_id = $request->offer_type_id;
        $new_offer->expiration_date = $request->expiration_date;
        $new_offer->entreprise_id = $request->entreprise_id;
        // if ($request->hasfile('cover')) {
        //     $tab = [];
        //     $path = $request->file('cover')->store('course_render_user');
        //     $tab[] = ['download_link' => $path, 'original_name' => $request->file('cover')->getClientOriginalName()];
        //     $new_offer->cover = json_encode($tab);
        // }

        if ($request->hasfile('cover')) {
            $path = $request->file('cover')->store('course_render_user');
            $new_offer->cover = $path;
        }
        if ($request->mode == 'on') {
            $new_offer->mode = 1;
        } else {
            $new_offer->mode = 0;
        }

        $new_offer->publier = 0;

        $new_offer->save();
        return back()->with('success', 'Votre offre est ajoutée avec succès');
    }

    public function updateOffre(Request $request, $id)
    {

        $new_offer = Offer::find($id);
        $new_offer->designation_fr = $request->designation_fr;

        $new_offer->email = $request->email;
        $new_offer->description_fr = $request->description_fr;
        $new_offer->offer_type_id = $request->offer_type_id;
        $new_offer->expiration_date = $request->expiration_date;
        if ($request->hasfile('cover')) {
            $path = $request->file('cover')->store('course_render_user');
            $new_offer->cover = $path;
        }

        if ($request->mode == 'on') {
            $new_offer->mode = 1;
        } else {
            $new_offer->mode = 0;
        }

        $new_offer->save();
        return back()->with('success', 'Modification terminée avec succès');
    }
    public function deleteOffre($id)
    {
        $offre = Offer::find($id)->delete();
        return back()->with('success', 'Offre supprimée avec succès');
    }


    public function editInfoCompany()
    {
        $domaines = Domaine::all();
        $company = User::join('entreprises', 'users.entreprise_id', 'entreprises.id')->where('users.id', auth()->user()->id)->first();
        return view('intranet.companies.edit_info_company', compact('company', 'domaines'));
    }

    public function updateInfoCompany(Request $request)
    {
        $entreprise = Entreprise::find($request->input('entreprise_id'));
        $entreprise->designation = $request->designation;
        $entreprise->description = $request->description;
        $entreprise->email = $request->email;
        $entreprise->phone = $request->phone;
        $entreprise->fax = $request->fax;
        $entreprise->address = $request->address;
        if ($request->hasfile('logo')) {
            $path = $request->file('logo')->store('entreprise');
            $entreprise->logo = $path;
        }
        $entreprise->responsable_name = $request->responsable_name;
        $entreprise->website = $request->website;
        $entreprise->location = $request->location;
        $entreprise->domaine_id = $request->domaine_id;
        // dd($request->all());
        $entreprise->save();
        return back()->with('success', 'Modification terminée avec succès');
    }
    public function profile()

    {

        return view('intranet.shared.profile', ['page' => 'profile', 'active_page' => 'profile']);
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();
        $user->address = @$request->input('address');
        $user->date_naissance = @$request->input('date_naissance');
        $user->phone = @$request->input('phone');
        $user->phone2 = @$request->input('phone2');
        $user->linkedin = @$request->input('linkedin');
        $user->save();
        return back()->with('success', 'Votre modification est terminée avec succès');
    }

    public function updatePassword(Request $request)
    {

        if ($request->input('new_password') == $request->input('confirm_password')) {
            $user = Auth::user();
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
                $user->save();
                return back()->with('success', 'Votre mot de passe a été bien modifié');
            } else {
                return back()->with('error', 'Erreur lors de la modification du mot de passe : Mot de passe incorrecte');
            }
        } else {
            return back()->with('error', 'Erreur lors de la modification du mot de passe : Mot de passe incorrecte');
        }
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasfile('avatar')) {
            $path = $request->file('avatar')->store('users');
            $user = Auth::user();
            $user->avatar = $path;
            $user->save();
            return back()->with('success', 'Votre photo a été bien modifié');
        } else {
            return back()->with('error', 'Veuillez téléverser une photo');
        }
    }

    public function showCv()
    {
        return view('intranet.shared.cv');
    }

    public function home()
    {

         // Check if the user has the role "gestionnaire du magasin"
        if (Auth::user()->role->name == 'gestionnaire du magasin') {
        return redirect()->route('intranet.welcome');
    }

        if (Auth::user()->role->name == 'Etudiant') {
            $coordinate = Coordinate::first();
            $fiche_renseignement = FormFicheRenseignement::where('student_id', Auth::user()->id)
                ->where('year_id', $coordinate->current_year_id)
                ->first();
            if (!isset($fiche_renseignement)) {
                return redirect()->route('fiche_renseignements');
            }
        }


        if (Auth::user()->role->name != 'Enseignant' && Auth::user()->role->name != 'Etudiant') {
            $the_role = "Personnel";
        } else {
            $the_role = Auth::user()->role->name;
        }
        $page = "Accueil";
        $news = News::where('publier', 1)
            ->where('for', 'LIKE', '%' . @$the_role . '%')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->Paginate(25);

        $news = News::where('publier', 1)
            ->where('for', 'LIKE', '%' . @$the_role . '%')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->Paginate(25);

        $startOfWeek = Carbon::now()->startOfWeek(); // Get the start of the current week
        $endOfWeek = Carbon::now()->endOfWeek(); // Get the end of the current week

        $events = Event::whereBetween('date_start', [$startOfWeek, $endOfWeek])
            ->orWhereBetween('date_end', [$startOfWeek, $endOfWeek])
            ->get();

        $active_page = 'home';
        $default_cover = DefaultCover::where('section', 'news')->where('publier', 1)->first();
        $company_conected = Entreprise::where('id', @Auth::user()->entreprise_id)->first();


        return view('intranet.shared.home', compact('page', 'news', 'active_page', 'default_cover', 'events', 'company_conected'));
    }

    public function fiche_renseignements()
    {
        $coordinate = Coordinate::first();
        $fiche_renseignement = FormFicheRenseignement::where('student_id', Auth::user()->id)->where('year_id', $coordinate->current_year_id)->first();
        if (!isset($fiche_renseignement)) {
            $formations = Formation::all();
            $type_formations = TypeFormation::all();
            $info_student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
            $student = Student::find(auth()->user()->id);
            // dd($info_student);

            return view('intranet.shared.fiche_renseignements', compact('formations', 'type_formations', 'info_student', 'student'));
        } else {
            return redirect()->route('intranet.home');
        }
    }

    public function add_info_student(Request $request)
    {


        $this->validate($request, [
            'date_naissance' => 'required',
        ]);



        $coordinate = Coordinate::first();
        $new_user = User::find(Auth::user()->id);
        $new_user->date_naissance = @$request->date_naissance;
        $new_user->lieu_naissance = @$request->lieu_naissance;
        $new_user->nationalite = @$request->nationalite;
        $new_user->cnss = @$request->cnss;
        $new_user->genre = @$request->genre;
        $new_user->phone = @$request->phone;
        $new_user->address = @$request->adresse;
        if ($request->hasfile('avatar')) {
            $path = @$request->file('avatar')->store('users');
            $new_user->avatar = $path;
        }

        $new_user->save();

        $new_student = Student::find(Auth::user()->id);
        $new_student->prenom_pere = @$request->prenom_pere;
        $new_student->nom_pere = @$request->nom_pere;
        $new_student->profession_pere = @$request->profession_pere;
        $new_student->etablissement_prof_pere = @$request->etablissement_prof_pere;
        $new_student->nom_mere = @$request->nom_mere;
        $new_student->prenom_mere = @$request->prenom_mere;
        $new_student->profession_mere = @$request->profession_mere;
        $new_student->etablissement_prof_mere = @$request->etablissement_prof_mere;
        $new_student->nom_jeune_fille = @$request->nom_jeune_fille;
        $new_student->annee_bac = @$request->annee_bac;
        $new_student->moyenne_bac = @$request->moyenne_bac;
        $new_student->session_bac = @$request->session_bac;
        $new_student->mention_bac = @$request->mention_bac;
        $new_student->section_bac = @$request->section_bac;
        $new_student->pays_bac = @$request->pays_bac;
        $new_student->save();

        $new_fiche = new FormFicheRenseignement();
        $new_fiche->diplome_prepare = @$request->diplome_prepare;
        $new_fiche->specialite = @$request->specialite;
        $new_fiche->etat = @$request->etat;
        $new_fiche->year_id = @$coordinate->current_year_id;
        $new_fiche->student_id = $new_student->id;
        $new_fiche->etablissement_educatif_precedente = @$request->etablissement_educatif_precedente;
        $new_fiche->code_postale = @$request->code_postale;
        $new_fiche->profession = @$request->profession;
        $new_fiche->employeur = @$request->employeur;
        $new_fiche->etat_civil = @$request->etat_civil;
        $new_fiche->etat_militaire = @$request->etat_militaire;
        $new_fiche->besoin_specifique = @$request->besoin_specifique;
        // $new_fiche->description_besoin_specifique = @$request->description_besoin_specifique;//to_verif
        // $new_fiche->niveau_etude = @$request->niveau_etude;//to_verif
        if (isset($path)) {
            $new_fiche->avatar = $path;
        }
        $new_fiche->adresse_parents = @$request->adresse_parents;
        $new_fiche->code_postale_parents = @$request->code_postale_parents;
        $new_fiche->tel_parents = @$request->tel_parents;
        $new_fiche->conjoint = @$request->conjoint;
        $new_fiche->profession_conjoint = @$request->profession_conjoint;
        $new_fiche->etablissement_profession_conjoint = @$request->etablissement_profession_conjoint;
        $new_fiche->nombre_enfants = @$request->nombre_enfants;
        $new_fiche->specialite_educatif_precedent = @$request->specialite_educatif_precedent;
        $new_fiche->niveau_etab_educatif_precedent = @$request->niveau_etab_educatif_precedent;
        $new_fiche->student_name = Auth::user()->name;
        $new_fiche->adresse = @$request->adresse;
        $new_fiche->phone = @$request->phone;
        $new_fiche->save();
        return redirect()->route('intranet.home')->with('success', 'message envoyé avec succés');
    }

    public function actualite($id)
    {
        $actualite = News::where('id', $id)->where('publier', 1)->first();
        if (!$actualite) {
            return redirect()->route('actualites');
        }

        return view('intranet.shared.details_actualite', ['actualite' => $actualite, 'active_page' => 'intranet.home']);
    }

    public function notifications()
    {


        $user_info = User::find(Auth::user()->id);
        $roles_additional = DB::table('user_roles')->where('user_id', Auth::user()->id)->get();
        $specific_roles = array(@$user_info->role->name);
        foreach ($roles_additional as $specific_userrole) {
            $role_info = Role::find($specific_userrole->role_id);
            $specific_roles[] = $role_info->name;
        }
        $tab_specific_news_id = array();
        if (in_array('Enseignant', $specific_roles)) {

            $news_departements = News::join('news_departments', 'news.id', 'news_departments.news_id')
                ->join('departments', 'news_departments.department_id', 'departments.id')
                ->join('teachers', 'departments.id', 'teachers.department_id')
                ->where('teachers.cin', Auth::user()->cin)
                ->where('news.publier', 1)
                ->orderBy('news.created_at', 'desc')


                ->select('news.*')
                ->paginate(12);
            if ($news_departements->count()) {
                foreach ($news_departements as $key => $news_departement) {
                    if (!in_array($news_departement->id, $tab_specific_news_id)) {
                        $tab_specific_news_id[] = $news_departement->id;
                    }
                }
            }
        } elseif (in_array('Etudiant', $specific_roles)) {
            $news_sectors = News::join('news_sectors', 'news.id', 'news_sectors.news_id')
                ->join('sectors', 'news_sectors.sector_id', 'sectors.id')
                ->join('groups', 'sectors.id', 'groups.sector_id')
                ->join('students_predefined_lists', 'groups.id', 'students_predefined_lists.groupe_id')
                ->where('students_predefined_lists.cin', Auth::user()->cin)
                ->where('news.publier', 1)
                ->orderBy('news.created_at', 'desc')


                ->select('news.*')
                ->paginate(12);
            if ($news_sectors->count() > 0) {
                foreach ($news_sectors as $key => $news_filiere) {
                    if (!in_array($news_filiere->id, $tab_specific_news_id)) {
                        $tab_specific_news_id[] = $news_filiere->id;
                    }
                }
            }
            // ********************
            $news_groups = News::join('news_groups', 'news.id', 'news_groups.news_id')

                ->join('groups', 'groups.id', 'news_groups.group_id')
                ->join('students_predefined_lists', 'groups.id', 'students_predefined_lists.groupe_id')
                ->where('students_predefined_lists.cin', Auth::user()->cin)
                ->where('news.publier', 1)
                ->orderBy('news.created_at', 'desc')


                ->select('news.*')
                ->paginate(12);
            if ($news_groups->count() > 0) {
                foreach ($news_groups as $key => $news_filiere) {
                    if (!in_array($news_filiere->id, $tab_specific_news_id)) {
                        $tab_specific_news_id[] = $news_filiere->id;
                    }
                }
            }
            // ********************
        }
        $news_users = News::join('news_users', 'news.id', 'news_users.news_id')
            ->where('news_users.user_id', Auth::user()->id)
            ->where('news.publier', 1)
            ->orderBy('news.created_at', 'desc')

            ->select('news.*')
            ->paginate(12);
        foreach ($news_users as $key => $news_user) {
            if (!in_array($news_user->id, $tab_specific_news_id)) {
                $tab_specific_news_id[] = $news_user->id;
            }
        }
        $page = 'Accueil';
        $news = News::whereIn('id', $tab_specific_news_id)->get();
        $default_cover = DefaultCover::where('section', 'news')->where('publier', 1)->first();

        $active_page = 'notifications';
        return view('intranet.shared.home', compact('page', 'news', 'active_page', 'default_cover'));
    }


    public function showForms()
    {
        return view('intranet.shared.e_forms', ['active_page' => 'forms']);
    }

    public function showDetailsForms()
    {
        return view('intranet.shared.details_forms', ['active_page' => 'forms']);
    }

    public function showDemandes()
    {
        return view('intranet.shared.mes_demandes', ['active_page' => 'demandes']);
    }

    public function showOffres()
    {
        $offers = Offer::where('publier', 1)->where('mode', 0)->orderBy('expiration_date', 'desc')->get();
        $my_offers = OfferUser::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $cv_user_existe = CvSetting::where('publier', 1)
            ->where('user_id', @Auth::user()->id)
            ->first();
        $nb_unseen_offers = OfferUser::where('user_id', Auth::user()->id)->where('seen', 0)->get()->count();
        $default_cover = DefaultCover::where('section', 'offre')->where('publier', 1)->first();
        $offer_types = OfferType::where('publier', 1)->get();
        return view('intranet.shared.offres_stages_emploi', ['offers' => @$offers, 'active_page' => 'offres', 'my_offers' => $my_offers, 'default_cover' => $default_cover, 'nb_unseen_offers' => $nb_unseen_offers, 'cv_user_existe' => $cv_user_existe, 'offer_types' => $offer_types]);
    }


    public function filterOffres(Request $request)
    {
        $query = Offer::where('publier', 1)->where('mode', 0);

        if ($request->filled('expiration_date')) {
            $query->whereDate('expiration_date', '<=', $request->expiration_date);
        }
        if ($request->filled('type')) {
            $query->where('offer_type_id', $request->type);
        }
        if ($request->filled('company')) {
            $query->whereHas('entreprise', function ($q) use ($request) {
                $q->where('designation', 'like', '%' . $request->company . '%');
            });
        }
        if ($request->filled('designation')) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('designation_fr', 'like', '%' . $request->designation . '%')
                    ->orWhere('designation_en', 'like', '%' . $request->designation . '%')
                    ->orWhere('designation_ar', 'like', '%' . $request->designation . '%');
            });
        }

        $offers = $query->orderBy('expiration_date', 'desc')->get();

        $my_offers = OfferUser::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $cv_user_existe = CvSetting::where('publier', 1)
            ->where('user_id', @Auth::user()->id)
            ->first();
        $nb_unseen_offers = OfferUser::where('user_id', Auth::user()->id)->where('seen', 0)->get()->count();
        $default_cover = DefaultCover::where('section', 'offre')->where('publier', 1)->first();
        $offer_types = OfferType::where('publier', 1)->get();

        return view('intranet.shared.offres_stages_emploi', [
            'offers' => $offers,
            'active_page' => 'offres',
            'my_offers' => $my_offers,
            'default_cover' => $default_cover,
            'nb_unseen_offers' => $nb_unseen_offers,
            'cv_user_existe' => $cv_user_existe,
            'offer_types' => $offer_types,
            'filters' => $request->all(),
        ]);
    }

    public function showDetailsOffre($id)
    {
        $offer = Offer::where('publier', 1)->find($id);
        if (!$offer) {
            return redirect()->route('offres');
        }
        $cv_user_existe = CvSetting::where('publier', 1)
            ->where('user_id', @Auth::user()->id)
            ->first();
        $offer_user_existe = Stage::where('offer_id', $id)->where('candidat_1_id', Auth::user()->id)->first();
        $update_seen = OfferUser::where('offer_id', $id)->where('user_id', Auth::user()->id)->update(['seen' => 1]);
        $default_cover = DefaultCover::where('section', 'offre')->where('publier', 1)->first();
        return view('intranet.shared.details_offre', ['offer' => @$offer, 'active_page' => 'offres', 'cv_user_existe' => $cv_user_existe, 'offer_user_existe' => $offer_user_existe, 'default_cover' => $default_cover]);
    }

    public function showclaims()
    {

        $active_page = 'votre_avis';
        $claims = Claim::leftJoin('destinations', 'destinations.id', '=', 'claims.destination_id')
        ->where('claims.user_id', Auth::user()->id)
        ->orWhere('claims.responsible_id', Auth::user()->id)
        ->orWhere('destinations.role_id', Auth::user()->role_id)
        ->select('claims.*')
        ->orderBy('status', 'asc')
        ->orderBy('claims.priority', 'desc')
        ->orderBy('created_at' , 'desc')
        ->get();

        $claim_types = ClaimType::where('publier', 1)->get();
        $claim_destinations = Destination::where('publier', 1)->get();
        return view('intranet.shared.claims', compact('active_page', 'claims', 'claim_types', 'claim_destinations'));
    }

    public function showDocuments()
    {
        $active_page = 'documents';
        $docs = SubjectDocument::get();
        return view('intranet.shared.documents', compact('active_page', 'docs'));
    }

    public function testimonialForm()
    {
        $testimonial = Testimonial::where('user_id', Auth::user()->id)->first();
        $active_page = 'testimonialForm';
        return view('intranet.shared.testimonial-form', compact('active_page', 'testimonial'));
    }
    public function sendFeedback(Request $request)
    {
        $new_feedback = new Claim();
        $new_feedback->subject = $request->subject;
        $new_feedback->destination_id = $request->destination_id;
        $new_feedback->claim_type_id = $request->claim_type_id;
        $new_feedback->message = $request->message;
        $new_feedback->user_id = Auth::user()->id;
        $new_feedback->name = Auth::user()->name;
        $new_feedback->email = Auth::user()->email;
        $new_feedback->status = 0;
        $new_feedback->publier = 1;
        if ($request->hasfile('file')) {
            $folder = 'users/' . Auth::user()->cin . '/claims';
            $path = $request->file('file')->store($folder);
            $new_feedback->file = $path;
        }
        $new_feedback->save();
        return back()->with('success', 'Envoyé avec succès');
    }


    public function claimDetails($id)
    {
        $claim = Claim::find($id);
        if (!$claim || ($claim->user_id != Auth::user()->id && $claim->responsible_id != Auth::user()->id) && $claim->destination->role_id != Auth::user()->role_id) {
            return redirect()->route('claims');
        }
        $active_page = 'votre_avis';
        //ask nourhene !!! all users
        // $users = User::all();

        $users = User::whereHas('role', function ($query) {
            $query->whereNotIn('name', ['admin', 'Entreprise', 'Alumni', 'Etudiant']);
        })->get();
        // dd($users);
        // $claim_types = ClaimType::where('publier', 1)->get();
        $reponses = ClaimUser::orderBy('created_at', 'desc')->where('claim_id', $id)->paginate(6);
        return view('intranet.shared.claims_details', compact('claim', 'active_page', 'reponses', 'users'));
    }

    public function ClaimComment(Request $request)
    {
        // dd('here');
        $new_comment = new ClaimUser();
        $new_comment->claim_id = $request->claim_id;
        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $message = str_replace($order, $replace, $request->input('message'));
        $new_comment->message = $message;
        // $new_comment->parent_id = @$request->parent_id;
        $new_comment->user_id = Auth::user()->id;
        // if ($request->hasfile('file')) {
        //     $path = $request->file('file')->store('comments_claim');
        //     $new_comment->file = $path;
        // }

        if ($request->hasfile('file')) {
            // dd($request->file('file'));
            $tab = [];
            $folder = 'users/' . Auth::user()->cin . '/claims';
            $path = $request->file('file')->store($folder);
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('file')->getClientOriginalName()];
            $new_comment->file = json_encode($tab);
        }
        $new_comment->save();
        return back();
    }

    public function addResponsableClaim(Request $request)
    {
        $update_claim_responsible = Claim::find($request->claim_id);
        $update_claim_responsible->responsible_id = $request->responsible_id;
        $update_claim_responsible->save();
        return back()->with('success', 'ajouté avec succès');
    }

    public function updatePriorityClaim(Request $request)
    {
        $claim = Claim::find($request->claim_id);
        $claim->priority = $request->priority;
        $claim->save();
        return back()->with('success', 'ajouté avec succès');
    }

    public function updateStatusClaim(Request $request)
    {
        $claim = Claim::find($request->claim_id);
        $claim->status = 1;
        $claim->save();


        if($claim->ref_id && $claim->type->module == 'absence' && $request->etat_reclamation){
            $absence_student = AbsenceStudent::where('id', $claim->ref_id)->first();
            if ($absence_student) {
                    $absence_student->reclamation = $request->etat_reclamation;


                $absence_student->save();
            }
        }elseif($claim->ref_id && $claim->type->module == 'note' && $request->etat_reclamation){
            $note = Note::where('id', $claim->ref_id)->first();
            if ($note) {
                    $note->reclamation = $request->etat_reclamation;

                $note->save();
            }
        }

        return back()->with('success', 'Envoyé avec succès');
    }

    public function sendTestimonial(Request $request)
    {
        if (Testimonial::where('user_id', Auth::user()->id)->exists()) {
            $new_testimonial =  Testimonial::where('user_id', Auth::user()->id)->first();
        } else {
            $new_testimonial = new Testimonial();
        }
        $new_testimonial->user_name = Auth::user()->name;
        $new_testimonial->message = $request->message;
        $new_testimonial->user_id = Auth::user()->id;
        $new_testimonial->user_avatar = Auth::user()->avatar;
        $new_testimonial->publier = 0;
        // if ($request->hasfile('file')) {
        //     $path = $request->file('file')->store('images');
        //     $new_testimonial->file = $path;
        // }
        $new_testimonial->save();
        return back()->with('success', 'Envoyé avec succès');
    }

    public function showAllCvStudents()
    {

        $users = User::whereHas('cv_setting')->get();
        // $students = User::all();
        $role_student = Role::where('name', 'Etudiant')->first();
        $role_teacher = Role::where('name', 'Enseignant')->first();
        $role_alumni = Role::where('name', 'Alumni')->first();
        // $role = Role::all();
        // dd($role);
        $active_page = 'showAllCvStudents';
        $page = 'cv';


        return view('intranet.shared.all_cv_students', ['active_page' => $active_page, 'page' => $page, 'users' => $users, 'role_teacher' => $role_teacher, 'role_alumni' => $role_alumni, 'role_student' => $role_student]);
    }

    public function showCompanies()
    {
        $companies = Entreprise::where('publier', 1)->paginate(12);
        $default_cover = DefaultCover::where('section', 'company')->where('publier', 1)->first();
        $active_page = 'showCompanies';
        $page = 'cv';
        return view('intranet.shared.companies', compact('companies', 'active_page', 'page', 'default_cover'));
    }

    public function companyDetails($id)
    {
        $company = Entreprise::find($id);
        $company_offers = Offer::where('entreprise_id', $id)->paginate(9);
        $active_page = 'showCompanies';
        $page = 'cv';
        // dd($company_offers);
        return view('intranet.shared.company_details', compact('company', 'active_page', 'page', 'company_offers'));
    }



    public function emploi($type)
    {
        $page = Emploi::where('publier', 1)->where('type', $type)->first();
        /* if (!$page) {
        return redirect()->route('');
        } */
        return view('intranet.shared.emploi', ['page' => $page, 'active_page' => $type]);
    }

    // *************** functions teacher start **************


    // Show details of absences for a specific group and date
    // public function showDetailsAbsence($groupTdId, $date)
    // {

    //     $absences = Absence::where('group_td_id', $groupTdId)
    //                         ->where('date', $date)
    //                         ->get();


    //     $page = 'detailsAbsences';
    //     $active_page = 'liste_groupes_ens';
    //     return view('intranet.teachers.absences_details', compact('absences', 'groupTdId', 'date' , 'page' , 'active_page'));
    // }



    // Update the absence status if it's within 24 hours
    // public function updateAbsence(Request $request, Absence $absence)
    // {
    //     $currentTime = Carbon::now();
    //     $absenceTime = Carbon::parse($absence->date);


    //     if ($currentTime->diffInHours($absenceTime) <= 24) {
    //         $absence->status = $request->status;
    //         $absence->save();

    //         return redirect()->back()->with('success', 'Absence updated successfully!');
    //     } else {
    //         return redirect()->back()->with('error', 'You cannot update absences older than 24 hours.');
    //     }
    // }


    // ******************* functions teacher end *************

    // ******************* functions students start*************

    public function showRenseignements()
    {
        $coordinate = Coordinate::first();
        $year = Year::find($coordinate->current_year_id);
        $fiche = FormFicheRenseignement::where('student_id', Auth::user()->id)->where('year_id', $coordinate->current_year_id)->first();
        $student = Student::find(Auth::user()->id);

        return view('intranet.students.renseignements', compact('year', 'fiche', 'student', 'coordinate'));
    }

    public function showGroupsStudent()
    {
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td = GroupTd::where('publier', 1)->find($student->groupe_td_id);

        $active_page = 'liste_groupes_stud';

        if ($group_td) {
            return view('intranet.students.liste_groupes', compact('group_td', 'active_page'));
        } else {
            return redirect()->route('intranet.home');
        }
    }

    //*******************************/ functions students end *******************

    //*******************************/ courses modules start *******************

    public function sendComment(Request $request)
    {
        // dd($request->all());
        $new_comment = new Comment();
        $new_comment->course_id = $request->course_id;
        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('content'));
        $new_comment->content = $content;
        $new_comment->parent_id = @$request->parent_id;
        $new_comment->user_id = Auth::user()->id;
        $new_comment->save();
        $active_tab = 'comments';

        return back()->with([
            'active_tab' => $active_tab,
        ]);
    }
    public function deleteComment($id)
    {

        $comment = Comment::where('user_id', Auth::user()->id)

            ->where('id', $id)->orWhere('parent_id', $id)->delete();
        $active_tab = 'comments';
        return back()->with([
            'active_tab' => $active_tab,
        ]);
    }
    public function courseDetails($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->route('cours');
        }
        $comments = Comment::orderBy('created_at', 'desc')->where('course_id', $id)->where('parent_id', null)->paginate(1);
        if (@Auth::user()->role->name == 'Enseignant') {
            $active_page = 'cours';
            $renders = CourseRender::where('course_id', $course->id)
                ->where('teacher_cin', Auth::user()->cin)->orderBy('created_at', 'desc')->get();
        } else {
            $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
            $group_td_id = $student->groupe_td_id;
            $active_page = 'courses_student';
            $renders = CourseRender::where('publier', 1)->where('group_td_id', $group_td_id)->where('course_id', $course->id)->orderBy('created_at', 'desc')->get();
        }

        $page = "details_course";


        $courses_students = CoursesGroupTd::where('course_id', $course->id)
            ->pluck('group_td_id')->toArray();
        // $students = StudentsPredefinedList::whereIn('groupe_td_id', $courses_students)->get();
        $students = StudentsPredefinedList::whereIn('groupe_td_id', $courses_students)
        ->with('groupTd')
        ->get()
        ->groupBy('groupe_td_id');
        $active_tab = '';
        // $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        // $subjects = @$teacher_info->subjects;
        // dd($subjects);

        return view('intranet.teachers.details_cours', compact('course', 'comments', 'active_page', "page", 'renders', 'students', 'active_tab'));
    }
    //*****************************/ courses modules end ****************************************************
    //*****************************/ stage modules start ***************************************************
    // stages : teacher and student (details blade)
    public function showStageDetails($id)
    {
        $stage = Stage::find($id);
        $soutenance = Soutenance::where('publier', 1)->where('stage_id', $id)->first();
        $rapports = Rapport::where('stage_id', $id)->get();
        $activities = StageActivity::where('stage_id', $id)->orderBy('activity_date', 'desc')->get();
        $active_page = 'stage_details';
        $default_cover = DefaultCover::where('section', 'company')->where('publier', 1)->first();
        $stage_rapport_types = StageDocumentType::where('publier', 1)->get();
        $types = StageDocumentType::where('publier', 1)
            ->whereNotExists(function ($query) use ($id) {
                $query->selectRaw(1)
                    ->from('rapports')
                    ->whereColumn('rapports.stage_rapport_type_id', 'stage_document_types.id')
                    ->where('rapports.stage_id', $id)
                    ->where('rapports.etat', 1);
            })
            ->get();
        if (!$stage) {
            return redirect()->route('intranet.home');
        }
        return view('intranet.shared.stage_details', compact('stage', 'active_page', 'soutenance', 'rapports', 'activities', 'default_cover', 'stage_rapport_types', 'types'));
    }

    //*****************************/ stage modules end **************************************************

    //*****************************/ Nachd UMS start **************************************************


    public function library()
    {
        $themes = Theme::orderby('designation_fr')->get();
        $config = BookingConfig::where('type', Auth::user()->role->name)->first();
        $current = Booking::where('user_id', Auth::user()->id)->where('etat', '!=', 2)->where('etat', '!=', 4)->get();
        // get last theme
        $last_theme = Theme::latest()->first();
        // get all books of the last theme
        $ouvrages = Book::where('theme_id', $last_theme->id)->get();
        // $user = Auth::user();
        // $books = Book::whereNotIn('id', function ($query) use ($user) {
        //     $query->select('book_id')
        //         ->from('bookings')
        //         ->where('user_id', $user->id);
        // })->get();
        $reservations = Booking::where('user_id', Auth::user()->id)->get();
        $active_page = 'library';
        return view('intranet.shared.library', [
            'themes' => $themes,
            'config' => $config,
            'current' => $current,
            'active_page' => $active_page,
            'ouvrages' => $ouvrages,
            'reservations' => $reservations,
            'last_theme' => $last_theme
        ]);
    }

    // get list of books for booking one user
    //filter by theme function
    public function filterByTheme(Request $request)
    {
        $themes = Theme::orderby('designation_fr')->get();
        $config = BookingConfig::where('type', Auth::user()->role->name)->first();
        $current = Booking::where('user_id', Auth::user()->id)->where('etat', '!=', 2)->where('etat', '!=', 4)->get();
        /* $books_by_themes = Book::where('theme_id' , $request->theme)->get(); */
        $last_theme = Theme::find($request->theme);
        $ouvrages = Book::where('theme_id', $request->theme)->get();
        $reservations = Booking::where('user_id', Auth::user()->id)->get();
        $active_page = 'library';
        return view('intranet.shared.library', [
            'themes' => $themes,
            'config' => $config,
            'current' => $current,
            'active_page' => $active_page,
            'ouvrages' => $ouvrages,
            'reservations' => $reservations,
            // 'books_by_themes' => $books_by_themes,
            'last_theme' => $last_theme
        ]);
    }

    //filter by theme function


    public function booking(Request $request, $book_id)
    {
        $book = Book::find($book_id);
        $new_booking = new Booking();
        $new_booking->user_id = Auth::user()->id;
        $new_booking->user_cin = Auth::user()->cin;

        $new_booking->user_name = Auth::user()->name;
        $new_booking->book_id = $book_id;
        $new_booking->book = $book->designation_fr;
        $new_booking->book_theme = $book->theme_id;
        // $new_booking->book_theme_name = $book->theme->designation_fr;
        $new_booking->etat = 0;
        $new_booking->etat_deadline = 0;
        $new_booking->save();
        return back()->with('success', 'Reservation de' . $book->designation_fr . ' effectuer avec succes!');
    }


    public function nachdUms()
    {

        $active_page = 'nachd_ums';
        $page = 'ums';
        $role = auth()->user()->role;
        if ($role->name == 'Enseignant') {
            $full_name_teacher = auth()->user()->name;
            $response = Http::get('https://mysystem.alwaysdata.net/public/api/teacher/timetableApis/NCIRA/Asma/1');
            if ($response->getStatusCode() == 200) {
                // Traitement pour une réponse réussie
                $timetable = $response->json();
                return view('intranet.shared.teachers_nachd_ums', compact('active_page', 'timetable', 'page', 'role'));
            } else {
                // Traitement pour une réponse avec un code d'erreur
                $error = true;
                return view('intranet.shared.teachers_nachd_ums', compact('error', 'active_page', 'page', 'role'));
            }
        } elseif ($role->name == 'Etudiant') {
            $group_student = StudentsPredefinedList::where('cin', auth()->user()->cin)->first();
            if ($group_student->groupe_td_id) {
                $group_name = GroupTd::where('id', $group_student->groupe_td_id)->first();
                $response = Http::get('https://mysystem.alwaysdata.net/public/api/section/publish/timetable/8/1/2023-12-11/2023-12-22');
                if ($response->getStatusCode() == 200) {
                    // Traitement pour une réponse réussie
                    $periods = $response->json()['periods'];
                    $lines = $response->json()['g1'];

                    return view('intranet.shared.students_nachd_ums', compact('active_page', 'periods', 'lines', 'page', 'role'));
                } else {
                    // Traitement pour une réponse avec un code d'erreur
                    $error = true;
                    return view('intranet.shared.students_nachd_ums', compact('error', 'active_page', 'page', 'role'));
                }
            } else {
                $error = true;
                return view('intranet.shared.students_nachd_ums', compact('error', 'active_page', 'page', 'role'));
            }
        }
    }

    public function showForum()
    {
        $forums = ForumSubject::where('publier', 1)->get();
        $active_page = 'forum';
        return view('intranet.shared.forum', compact('forums', 'active_page'));
    }

    public function addForum(Request $request)
    {
        $new_forum = new ForumSubject();
        $new_forum->user_id = Auth::user()->id;
        $new_forum->title = $request->title;
        $new_forum->description = $request->description;
        $new_forum->publier = 1;

        if ($request->hasfile('file')) {
            $tab = [];
            $path = $request->file('file')->store('forum_files');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('file')->getClientOriginalName()];
            $new_forum->file = json_encode($tab);
        }

        $new_forum->save();
        return back()->with('success', 'Forum ajouter avec succes !');
    }

    public function showForumDetails($id)
    {

        $forum = ForumSubject::find($id);

        if (!$forum) {
            return redirect()->route('intranet.home');
        }
        $active_page = 'forum';
        $comontaires = ForumSubjectComment::where('forum_subject_id', $forum->id)->paginate(2);

        return view('intranet.shared.forum_details', compact('forum', 'comontaires', 'active_page'));
    }

    public function forumComment(Request $request)
    {
        $new_comment = new ForumSubjectComment();
        $new_comment->forum_subject_id = $request->forum_subject_id;
        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $response = str_replace($order, $replace, $request->input('response'));
        $new_comment->response = $response;
        // $new_comment->parent_id = @$request->parent_id;
        $new_comment->user_id = Auth::user()->id;

        $new_comment->save();
        return back()->with('success', 'Message envoyer avec succes!');
    }

    public function deleteCommentForum($id)
    {

        $comment = ForumSubjectComment::find($id);
        $comment->delete();
        return back();
    }

    public function deleteForum($id)
    {

        $forum = ForumSubject::find($id);
        $forum->deleted_at = date('Y-m-d H:i:s');
        $forum->save();
        return back();
    }




    public function userFolder()
    {
        $foldername = Auth::user()->cin;

        $pathPrefix = "users/" . $foldername;

        $stages = Storage::files('users/' . $foldername . '/stages');
        $requests = Storage::files('users/' . $foldername . '/requests');
        $claims = Storage::files('users/' . $foldername . '/claims');
        $personnals = Storage::files('users/' . $foldername . '/personnals');
        $documents = Storage::files('users/' . $foldername . '/documents');
        $others = Storage::files('users/' . $foldername . '/others');

        $files = Storage::files($pathPrefix);
        // dd($files);
        // $files = Storage::allFiles($pathPrefix);
        // dd($allFiles);

        // Using File facade
        $active_page = 'folder';
        // $page cour is variable for test  full with
        $page = 'cour';

        return view('intranet.shared.user_folder', compact('files', 'stages', 'requests', 'claims', 'personnals', 'documents', 'others', 'active_page', 'page'));
    }








    //*****************************/ Nachd UMS end **************************************************

}
