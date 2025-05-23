<?php

namespace Illuminate\Foundation\Auth;

use App\Coordinate;
use App\Student;
use App\StudentsPredefinedList;
use App\Teacher;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();





        $data = $request->all();

        if ($data['role_type'] == "student") {
            $coordinate = Coordinate::first();
            $exist = StudentsPredefinedList::where('cin', $data['cin'])->where('email', $data['email'])->where('year_id', $coordinate['current_year_id'])->first();
            if (!$exist) {
                return redirect()->route('register')->with('error', 'Votre N°CIN n\'est pas enregistré');
            }
        } elseif ($data['role_type'] == "teacher") {
            $exist = Teacher::where('cin', $data['cin'])->where('email', $data['email'])->first();
            if (!$exist) {
                return redirect()->route('register')->with('error', 'Votre N°CIN n\'est pas enregistré');
            }
        }

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        if ($data['role_type'] == "student" && $user && $user->id) {

                $student = new Student();
                $student->id = $user->id;
                $student->save();


        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
