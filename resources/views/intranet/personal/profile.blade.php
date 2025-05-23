@extends('intranet.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="account_setting" style="margin-top: 0px;    margin-top: 0px;">
                {{-- <h4>Votre compte</h4> --}}
                <div class="basic_profile fcrse_2 mb-10 " style="margin-top:0px">
                    <div class="basic_ptitle">
                        <h4>Votre compte</h4>
                        <p>Informations personnelles</p>
                    </div>
                    <div class="basic_form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="ui search focus mt-30">

                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    Nom et prénom*
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="name"
                                                    value="" id="id[name]" required="" maxlength="64"
                                                    placeholder="Nom et prénom*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    Adresse Email*
                                                </div>
                                                <input class="prompt srch_explore" type="email" name="surname"
                                                    value="" id="id[surname]" required="" maxlength="64"
                                                    placeholder="Adresse Email*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    Date de naissance*
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="surname"
                                                    value="" id="id[surname]" required="" maxlength="64"
                                                    placeholder="Date de naissance*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    Adresse
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="surname"
                                                    value="" id="id[surname]" required="" maxlength="64"
                                                    placeholder="Adresse">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    N° Tél
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="surname"
                                                    value="" id="id[surname]" required="" maxlength="64"
                                                    placeholder="Numéro de téléphone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    Deuxième N° Tél
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="surname"
                                                    value="" id="id[surname]" required="" maxlength="64"
                                                    placeholder="Deuxième numéro de téléphone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <div class="ui label lb12">
                                                    Compte Linked
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="headline"
                                                    value="" id="id_headline" required="" maxlength="60"
                                                    placeholder="Compte Linked IN">
                                                {{-- <div class="form-control-counter"
                                        data-purpose="form-control-counter">36</div> --}}
                                            </div>

                                        </div>
                                    </div>

                                    <button class="save_btn" type="submit" style="margin-bottom: 2px; background:#ffbc3b;margin-left: 13px;">Sauvegarder les
                                        notifications</button>
                                    {{-- <div class="col-lg-12">
                                        <div class="divider-1"></div>
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="basic_profile1 fcrse_2 mb-30">
                    <div class="basic_ptitle">
                        <h4>Sécurité</h4>
                    </div>
                    <div class="basic_form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon labeled input swdh11 swdh31">
                                                <div class="ui label lb12">
                                                    Mot de passe actuel*
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="site"
                                                    value="" id="id_site" required=""
                                                    maxlength="64" placeholder="Mot de passe actuel*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon labeled input swdh11 swdh31">
                                                <div class="ui label lb12">
                                                    Nouveau mot de passe*
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="facebooklink"
                                                    id="id_facebook" required="" maxlength="64"
                                                    placeholder="Nouveau mot de passe*">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ui search focus mt-30">
                                            <div class="ui left icon labeled input swdh11 swdh31">
                                                <div class="ui label lb12">
                                                    Confirmez votre nouveau mot de passe*
                                                </div>
                                                <input class="prompt srch_explore" type="text" name="twitterlink"
                                                    id="id_twitter" required="" maxlength="64"
                                                    placeholder="Confirmez votre nouveau mot de passe*">
                                            </div>

                                        </div>
                                    </div>
                                    <button class="save_btn" type="submit" style="background:#ffbc3b;margin-left:13px;margin-bottom:2px;">Sauvegarder les notifications</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- left sidebar start --}}
        <div class="col-xl-4 col-lg-5">
            <div class="right_side">
                <div class="fcrse_2 mb-30">
                    <div class="tutor_img">
                        <a href="my_instructor_profile_view.html"><img
                                src="{{ asset('theme2/images/left-imgs/img-10.jpg') }}" alt=""></a>
                    </div>
                    <div class="tutor_content_dt">
                        {{-- <div class="tutor150">
                                        <a href="my_instructor_profile_view.html" class="tutor_name">Wissem
                                            DEBBECH</a>
                                        <div class="mef78" title="Verify">
                                            <i class="uil uil-check-circle"></i>
                                        </div>
                                    </div> --}}
                        <div class="tutor_cate">Taille max : 2Mo. Supports: jpg, jpeg ou png</div>
                        <ul class="tutor_social_links">
                            <li>
                                <a href="#" class="ln"
                                    style="width: 100%;height: 100%;margin: 9px;background-color: #ffbc3b;">
                                    <i class=""></i>DÉPOSEZ VOTRE PHOTO D'IDENTITÉ
                                </a>
                            </li>
                        </ul>
                        <h3 style="text-align: left;">Données universitaires</h3>
                        <a href="my_instructor_profile_view.html" class="prfle12link" style="text-align:left;"><span
                                style="font-size: 15px;font-weight: 600;">Identifiant unique :</span>12121212</a>
                        <a href="my_instructor_profile_view.html" class="prfle12link" style="text-align:left;"><span
                                style="font-size: 15px;font-weight: 600;">Département :</span> INFORMATIQUE</a>
                        <a href="my_instructor_profile_view.html" class="prfle12link" style="text-align:left;"><span
                                style="font-size: 15px;font-weight: 600;">Spécialité :</span> Informatique</a>
                        <a href="my_instructor_profile_view.html" class="prfle12link" style="text-align:left;"><span
                                style="font-size: 15px;font-weight: 600;">Grade :</span> Vacataire</a>
                        <a href="my_instructor_profile_view.html" class="prfle12link" style="text-align:left;"><span
                                style="font-size: 15px;font-weight: 600;">Type :</span> Vacataire</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- left sidebar end --}}

    </div>
@endsection
