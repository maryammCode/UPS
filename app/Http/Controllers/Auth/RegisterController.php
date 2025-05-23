<?php

namespace App\Http\Controllers\Auth;

use App\Cin;
use App\Entreprise;
use App\Http\Controllers\Controller;
use App\Listepredefinieenseignant;
use App\Models\User;
use App\Student;
use App\Teacher;
use App\StudentsPredefinedList;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login'; //RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cin' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if ($data['role_type'] == "student") {
            $user = StudentsPredefinedList::where('cin', $data['cin'])->where('email', $data['email'])->first();
            $role = Role::where('name', 'Etudiant')->first();
        } elseif ($data['role_type'] == "teacher") {
            $user = Teacher::where('cin', $data['cin'])->where('email', $data['email'])->first();
            $role = Role::where('name', 'Enseignant')->first();
        }

        return User::create([
            'name' => $user->nom . ' ' . $user->prenom,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => @$role->id,
            'cin' => $data['cin']
        ]);
    }

    public function showRegisterCompany()
    {

        return view('auth.register_company');
    }
    public function registerCompany(Request $request)
    {
        if ($request->input('company_user_password') == $request->input('password_confirmation')) {
            $test_exist_responsible = User::where('email', $request->company_user_email)->first();
            if ($test_exist_responsible) {
                return back()->with('error', 'Le responsable existe déjà');
            } else {
                $entreprise = new Entreprise();
                $entreprise->designation = $request->input('company_designation');
                $entreprise->email = $request->company_email;
                $entreprise->phone = $request->company_phone;
                $entreprise->address = $request->company_address;
                $entreprise->validation = 0;
                $entreprise->save();


                $responsible = new User();
                $responsible->name = $request->company_user_name;
                $responsible->email = $request->company_user_email;
                $responsible->password = bcrypt($request->company_user_password);
                $responsible->entreprise_id = $entreprise->id;
                $company_role = Role::where('name', 'Entreprise')->first();
                $responsible->role_id = $company_role->id;
                $responsible->save();
                // return back()->with('success', "L'entreprise a été crée avec succès");
                return redirect('/login')->with('success', "L'entreprise a été crée avec succès");
            }
        } else {
            return back()->with('error', 'Les mots de passe ne sont pas identiques');
        }
    }
}
