@extends('my_layouts.full_width')

@section('title')
	Se connecter
@endsection

    @section('part_content') 
@php
    $lang= Session::get('language');
    if(!$lang){ $lang=App::getLocale();}
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
        $designation = 'designation_' . $lang;
        App::setLocale($lang);

    @endphp
<div class="login">
        <!-- Teachers Area section -->
        <section class="login-area" style="padding: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form action="#" class="learnpro-register-form text-center">
                            <p class="lead">Bienvenu(e)</p>					
                            <div class="form-group"> 
                                <input autocomplete="off" class="required form-control" placeholder="Email *" name="email" type="email">
                            </div>
                            <div class="form-group">
                                <input class="required form-control" placeholder="Mot de passe *" name="password" type="password" required>
                            </div>		
                            <div class="form-group register-btn">
                                <submit class="btn btn-primary btn-lg">Se connecter</submit>
                            </div>
                            {{-- <a href="forgot_password.html"><strong>Forgot password?</strong></a>		
                            <p>Not a member? <a href="register.html"><strong>Join today</strong></a></p>	 --}}
                        </form>
                    </div>												
                </div>
            </div>
        </section>
        <!-- ./ End Teachers Area section -->
</div>
@endsection