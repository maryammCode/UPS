<!DOCTYPE html>
<html lang="en">

<head>
    @include('intranet.layouts.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>

<body>
    @php
        $lang = Session::get('language');
        if (!$lang) {
            $lang = App::getLocale();
        }
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
        $designation = 'designation_' . $lang;
        App::setLocale($lang);
    @endphp

    <style>
        .input input~div,
        .dropdown~div {
            display: none;
            color: #b2b2b2;
            font-size: small;
            padding-top: 4px
        }

        .input input:invalid~div {
            display: block
        }

        .input input:invalid {
            border-bottom: 2px solid rgb(193, 2, 2) !important;
        }

        .dropdown:has(> select:invalid)~div {
            border-top: 2px solid rgb(193, 2, 2) !important;
            display: block
        }
        .select2-selection{
            height: 39px !important;
        }
        .dropdown2 select:invalid~div {
            border-top: 2px solid rgb(193, 2, 2) !important;
            display: block
        }
        .upload-btn:has(> input:invalid) {
            border-bottom: 2px solid rgb(193, 2, 2) !important;
        }


        .input {
            display: block !important
        }

        .input input {
            width: 100%;
        }

        .switch {
            display: block
        }
    </style>
    <div class="wrapper" style="padding-top:30px; margin:0px !important;">
        <div class="sa4d25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="st_title"><i class="uil uil-analysis"></i>@lang("intranet.Fiche d'inscription des étudiants")</h2>
                       <div ><a href="{{ route('logout') }}" class="btn btn-default steps_btn" style="float: inline-end; dispaly:block;
                        padding-top: 9px !important;">@lang('intranet.Déconnexion')</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form id="wissem" action="{{ route('info_student') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="course_tabs_1">
                                <div id="add-course-tab" class="step-app">
                                    <ul class="step-steps">
                                        <li class="active">
                                            <a href="#tab_step1">
                                                <span class="number"></span>
                                                <span class="step-name">@lang('intranet.Basique')</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_step2">
                                                <span class="number"></span>
                                                <span class="step-name">@lang('intranet.Famille')</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_step3">
                                                <span class="number"></span>
                                                <span class="step-name">@lang('intranet.Baccalauréat')</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_step4">
                                                <span class="number"></span>
                                                <span class="step-name">@lang('intranet.Année universitaire')</span>
                                            </a>
                                        </li>
                                        {{-- <li>
                                        <a href="#tab_step5">
                                            <span class="number"></span>
                                            <span class="step-name">@lang('intranet.Imprimer')</span>
                                        </a>
                                    </li> --}}
                                    </ul>
                                    <div class="step-content">
                                        <div class="step-tab-panel step-tab-info active" id="tab_step1">
                                            <div class="tab-from-content">
                                                <div class="title-icon">
                                                    <h3 class="title"><i class="uil uil-info-circle"></i>
                                                        @lang('intranet.Informations Personnelles')
                                                    </h3>
                                                </div>
                                                <div class="course__form">
                                                    <div class="general_info10">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Nom et Prénom')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        {{ Auth::user()->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang("intranet.Numéro d'inscription")</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        {{ @$info_student->numero_inscription }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Cin / ID inscription étrangère')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        {{ Auth::user()->cin }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Adresse')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Adresse')"
                                                                            name="adresse" required
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Code Postale')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number" min="1000" max="9999"
                                                                            placeholder="@lang('intranet.Code Postale')"
                                                                            name="code_postale"
                                                                            data-purpose="edit-course-title" required
                                                                            id="main[title]" value="">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Date de naissance')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="date"
                                                                            placeholder="@lang('intranet.Date de naissance')"
                                                                            name="date_naissance" max="2010-01-01" min="1960-01-01"
                                                                            data-purpose="edit-course-title" required
                                                                            id="main[title]"
                                                                            value="{{ @$student->date_naissance }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Lieu de naissance')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Lieu de naissance')"
                                                                            name="lieu_naissance"
                                                                            data-purpose="edit-course-title" required
                                                                            id="main[title]"
                                                                            value="{{ @$student->lieu_naissance }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-6 col-md-6 select dropdown2">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Nationalité')</label>
                                                                </div>
                                                                <select name="nationalite" required
                                                                    class=" dropdown specifique_css form-select" id="basic-usage" >
                                                                    <option disabled selected value> @lang('intranet.Choisir votre nationalité')
                                                                    </option>
                                                                    <option>Tunisienne (Tunisie)</option>
                                                                    <option>Algérienne (Algérie)</option>
                                                                    <option>Allemande (Allemagne)</option>
                                                                    <option>Americaine (États-Unis)</option>
                                                                    <option>Andorrane (Andorre)</option>
                                                                    <option>Angolaise (Angola)</option>
                                                                    <option>Antiguaise-et-Barbudienne
                                                                        (Antigua-et-Barbuda)</option>
                                                                    <option>Argentine (Argentine)</option>
                                                                    <option>Australienne (Australie)</option>
                                                                    <option>Autrichienne (Autriche)</option>
                                                                    <option>Azerbaïdjanaise (Azerbaïdjan)</option>
                                                                    <option>Bahamienne (Bahamas)</option>
                                                                    <option>Bahreinienne (Bahreïn)</option>
                                                                    <option>Bangladaise (Bangladesh)</option>
                                                                    <option>Barbadienne (Barbade)</option>
                                                                    <option>Belge (Belgique)</option>
                                                                    <option>Belizienne (Belize)</option>
                                                                    <option>Béninoise (Bénin)</option>
                                                                    <option>Bhoutanaise (Bhoutan)</option>
                                                                    <option>Biélorusse (Biélorussie)</option>
                                                                    <option>Birmane (Birmanie)</option>
                                                                    <option>Bissau-Guinéenne (Guinée-Bissau)</option>
                                                                    <option>Bolivienne (Bolivie)</option>
                                                                    <option>Bosnienne (Bosnie-Herzégovine)</option>
                                                                    <option>Botswanaise (Botswana)</option>
                                                                    <option>Brésilienne (Brésil)</option>
                                                                    <option>Britannique (Royaume-Uni)</option>
                                                                    <option>Brunéienne (Brunéi)</option>
                                                                    <option>Bulgare (Bulgarie)</option>
                                                                    <option>Burkinabée (Burkina)</option>
                                                                    <option>Burundaise (Burundi)</option>
                                                                    <option>Cambodgienne (Cambodge)</option>
                                                                    <option>Camerounaise (Cameroun)</option>
                                                                    <option>Canadienne (Canada)</option>
                                                                    <option>Cap-verdienne (Cap-Vert)</option>
                                                                    <option>Centrafricaine (Centrafrique)</option>
                                                                    <option>Chilienne (Chili)</option>
                                                                    <option>Chinoise (Chine)</option>
                                                                    <option>Chypriote (Chypre)</option>
                                                                    <option>Colombienne (Colombie)</option>
                                                                    <option>Comorienne (Comores)</option>
                                                                    <option>Congolaise (Congo-Brazzaville)</option>
                                                                    <option>Congolaise (Congo-Kinshasa)</option>
                                                                    <option>Cookienne (Îles Cook)</option>
                                                                    <option>Costaricaine (Costa Rica)</option>
                                                                    <option>Croate (Croatie)</option>
                                                                    <option>Cubaine (Cuba)</option>
                                                                    <option>Danoise (Danemark)</option>
                                                                    <option>Djiboutienne (Djibouti)</option>
                                                                    <option>Dominicaine (République dominicaine)
                                                                    </option>
                                                                    <option>Dominiquaise (Dominique)</option>
                                                                    <option>Égyptienne (Égypte)</option>
                                                                    <option>Émirienne (Émirats arabes unis)</option>
                                                                    <option>Équato-guineenne (Guinée équatoriale)
                                                                    </option>
                                                                    <option>Équatorienne (Équateur)</option>
                                                                    <option>Érythréenne (Érythrée)</option>
                                                                    <option>Espagnole (Espagne)</option>
                                                                    <option>Est-timoraise (Timor-Leste)</option>
                                                                    <option>Estonienne (Estonie)</option>
                                                                    <option>Éthiopienne (Éthiopie)</option>
                                                                    <option>Fidjienne (Fidji)</option>
                                                                    <option>Finlandaise (Finlande)</option>
                                                                    <option>Française (France)</option>
                                                                    <option>Gabonaise (Gabon)</option>
                                                                    <option>Gambienne (Gambie)</option>
                                                                    <option>Georgienne (Géorgie)</option>
                                                                    <option>Ghanéenne (Ghana)</option>
                                                                    <option>Grenadienne (Grenade)</option>
                                                                    <option>Guatémaltèque (Guatemala)</option>
                                                                    <option>Guinéenne (Guinée)</option>
                                                                    <option>Guyanienne (Guyana)</option>
                                                                    <option>Haïtienne (Haïti)</option>
                                                                    <option>Hellénique (Grèce)</option>
                                                                    <option>Hondurienne (Honduras)</option>
                                                                    <option>Hongroise (Hongrie)</option>
                                                                    <option>Indienne (Inde)</option>
                                                                    <option>Indonésienne (Indonésie)</option>
                                                                    <option>Irakienne (Iraq)</option>
                                                                    <option>Iranienne (Iran)</option>
                                                                    <option>Irlandaise (Irlande)</option>
                                                                    <option>Islandaise (Islande)</option>
                                                                    <option>Italienne (Italie)</option>
                                                                    <option>Ivoirienne (Côte d'Ivoire)</option>
                                                                    <option>Jamaïcaine (Jamaïque)</option>
                                                                    <option>Japonaise (Japon)</option>
                                                                    <option>Jordanienne (Jordanie)</option>
                                                                    <option>Kazakhstanaise (Kazakhstan)</option>
                                                                    <option>Kenyane (Kenya)</option>
                                                                    <option>Kirghize (Kirghizistan)</option>
                                                                    <option>Kiribatienne (Kiribati)</option>
                                                                    <option>Kittitienne et Névicienne
                                                                        (Saint-Christophe-et-Niévès)</option>
                                                                    <option>Koweïtienne (Koweït)</option>
                                                                    <option>Laotienne (Laos)</option>
                                                                    <option>Lesothane (Lesotho)</option>
                                                                    <option>Lettone (Lettonie)</option>
                                                                    <option>Libanaise (Liban)</option>
                                                                    <option>Libérienne (Libéria)</option>
                                                                    <option>Libyenne (Libye)</option>
                                                                    <option>Liechtensteinoise (Liechtenstein)</option>
                                                                    <option>Lituanienne (Lituanie)</option>
                                                                    <option>Luxembourgeoise (Luxembourg)</option>
                                                                    <option>Macédonienne (Macédoine)</option>
                                                                    <option>Malaisienne (Malaisie)</option>
                                                                    <option>Malawienne (Malawi)</option>
                                                                    <option>Maldivienne (Maldives)</option>
                                                                    <option>Malgache (Madagascar)</option>
                                                                    <option>Maliennes (Mali)</option>
                                                                    <option>Maltaise (Malte)</option>
                                                                    <option>Marocaine (Maroc)</option>
                                                                    <option>Marshallaise (Îles Marshall)</option>
                                                                    <option>Mauricienne (Maurice)</option>
                                                                    <option>Mauritanienne (Mauritanie)</option>
                                                                    <option>Mexicaine (Mexique)</option>
                                                                    <option>Micronésienne (Micronésie)</option>
                                                                    <option>Moldave (Moldovie)</option>
                                                                    <option>Monegasque (Monaco)</option>
                                                                    <option>Mongole (Mongolie)</option>
                                                                    <option>Monténégrine (Monténégro)</option>
                                                                    <option>Mozambicaine (Mozambique)</option>
                                                                    <option>Namibienne (Namibie)</option>
                                                                    <option>Nauruane (Nauru)</option>
                                                                    <option>Néerlandaise (Pays-Bas)</option>
                                                                    <option>Néo-Zélandaise (Nouvelle-Zélande)</option>
                                                                    <option>Népalaise (Népal)</option>
                                                                    <option>Nicaraguayenne (Nicaragua)</option>
                                                                    <option>Nigériane (Nigéria)</option>
                                                                    <option>Nigérienne (Niger)</option>
                                                                    <option>Niuéenne (Niue)</option>
                                                                    <option>Nord-coréenne (Corée du Nord)</option>
                                                                    <option>Norvégienne (Norvège)</option>
                                                                    <option>Omanaise (Oman)</option>
                                                                    <option>Ougandaise (Ouganda)</option>
                                                                    <option>Ouzbéke (Ouzbékistan)</option>
                                                                    <option>Pakistanaise (Pakistan)</option>
                                                                    <option>Palaosienne (Palaos)</option>
                                                                    <option>Palestinienne (Palestine)</option>
                                                                    <option>Panaméenne (Panama)</option>
                                                                    <option>Papouane-Néo-Guinéenne
                                                                        (Papouasie-Nouvelle-Guinée)</option>
                                                                    <option>Paraguayenne (Paraguay)</option>
                                                                    <option>Péruvienne (Pérou)</option>
                                                                    <option>Philippine (Philippines)</option>
                                                                    <option>Polonaise (Pologne)</option>
                                                                    <option>Portugaise (Portugal)</option>
                                                                    <option>Qatarienne (Qatar)</option>
                                                                    <option>Roumaine (Roumanie)</option>
                                                                    <option>Russe (Russie)</option>
                                                                    <option>Rwandaise (Rwanda)</option>
                                                                    <option>Saint-Lucienne (Sainte-Lucie)</option>
                                                                    <option>Saint-Marinaise (Saint-Marin)</option>
                                                                    <option>Saint-Vincentaise et Grenadine
                                                                        (Saint-Vincent-et-les Grenadines)</option>
                                                                    <option>Salomonaise (Îles Salomon)</option>
                                                                    <option>Salvadorienne (Salvador)</option>
                                                                    <option>Samoane (Samoa)</option>
                                                                    <option>Santoméenne (Sao Tomé-et-Principe)</option>
                                                                    <option>Saoudienne (Arabie saoudite)</option>
                                                                    <option>Sénégalaise (Sénégal)</option>
                                                                    <option>Serbe (Serbie)</option>
                                                                    <option>Seychelloise (Seychelles)</option>
                                                                    <option>Sierra-Léonaise (Sierra Leone)</option>
                                                                    <option>Singapourienne (Singapour)</option>
                                                                    <option>Slovaque (Slovaquie)</option>
                                                                    <option>Slovène (Slovénie)</option>
                                                                    <option>Somalienne (Somalie)</option>
                                                                    <option>Soudanaise (Soudan)</option>
                                                                    <option>Sri-Lankaise (Sri Lanka)</option>
                                                                    <option>Sud-Africaine (Afrique du Sud)</option>
                                                                    <option>Sud-Coréenne (Corée du Sud)</option>
                                                                    <option>Sud-Soudanaise (Soudan du Sud)</option>
                                                                    <option>Suédoise (Suède)</option>
                                                                    <option>Suisse (Suisse)</option>
                                                                    <option>Surinamaise (Suriname)</option>
                                                                    <option>Swazie (Swaziland)</option>
                                                                    <option>Syrienne (Syrie)</option>
                                                                    <option>Tadjike (Tadjikistan)</option>
                                                                    <option>Tanzanienne (Tanzanie)</option>
                                                                    <option>Tchadienne (Tchad)</option>
                                                                    <option>Tchèque (Tchéquie)</option>
                                                                    <option>Thaïlandaise (Thaïlande)</option>
                                                                    <option>Togolaise (Togo)</option>
                                                                    <option>Tonguienne (Tonga)</option>
                                                                    <option>Trinidadienne (Trinité-et-Tobago)</option>
                                                                    <option>Turkmène (Turkménistan)</option>
                                                                    <option>Turque (Turquie)</option>
                                                                    <option>Tuvaluane (Tuvalu)</option>
                                                                    <option>Ukrainienne (Ukraine)</option>
                                                                    <option>Uruguayenne (Uruguay)</option>
                                                                    <option>Vanuatuane (Vanuatu)</option>
                                                                    <option>Vaticane (Vatican)</option>
                                                                    <option>Vénézuélienne (Venezuela)</option>
                                                                    <option>Vietnamienne (Viêt Nam)</option>
                                                                    <option>Yéménite (Yémen)</option>
                                                                    <option>Zambienne (Zambie)</option>
                                                                    <option>Zimbabwéenne (Zimbabwe)</option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Numéro de téléphone')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number"
                                                                            placeholder="@lang('intranet.Numéro de téléphone')"
                                                                            name="phone"
                                                                            min="20000000"
                                                                            max="99999999"
                                                                            data-purpose="edit-course-title" required
                                                                            id="main[title]" value="">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.CNSS')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number"
                                                                            placeholder="@lang('intranet.CNSS')"
                                                                            name="cnss"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->cnss }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Profession')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Profession')"
                                                                            name="profession"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Employeur')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Employeur')"
                                                                            name="employeur"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Etat Civil')</label>
                                                                </div>
                                                                <select name="etat_civil" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre état civil')
                                                                    </option>

                                                                    <option value="Célibataire">@lang('intranet.Célibataire')
                                                                    </option>
                                                                    <option value="Marié(e)">@lang('intranet.Marié(e)')
                                                                    </option>
                                                                    <option value="Divorcé(é)">@lang('intranet.Divorcé(é)')
                                                                    </option>
                                                                    <option value="Veuf(ve)">@lang('intranet.Veuf(ve)')
                                                                    </option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Etat Militaire')</label>
                                                                </div>
                                                                <select name="etat_militaire" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre état militaire')
                                                                    </option>
                                                                    <option value="Non concerné(e)">@lang('intranet.Non concerné(e)')
                                                                    </option>
                                                                    <option value="Exempté(e)">@lang('intranet.Exempté(e)')
                                                                    </option>
                                                                    <option value="Service accompli">@lang('intranet.Service accompli')
                                                                    </option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Genre')</label>
                                                                </div>
                                                                <select name="genre" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre genre')
                                                                    </option>
                                                                    <option value="Masculin">@lang('intranet.Masculin')
                                                                    </option>
                                                                    <option value="Féminin">@lang('intranet.Féminin')</option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui left icon  swdh19  mt-30 ">
                                                                    <label class="switch">
                                                                        <input type="checkbox" id="require_login"
                                                                            onchange="specificNeed(event)">
                                                                        <span></span>
                                                                    </label>
                                                                    <label for="require_login"
                                                                        class="lbl-quiz">@lang('intranet.Etudiant(e) à besoin spécifique ?')</label>
                                                                </div>
                                                                <div class="ui left icon  swdh19 mt-2" id="besoin"
                                                                    style="display:none;">
                                                                    <textarea class="prompt srch_explore" name="besoin_specifique" id="" rows="8" style="width:100%;"
                                                                        placeholder="  @lang('intranet.Spécifier le besoin...')"></textarea>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label
                                                                    class="label25 text-left mt-30 ">@lang('intranet.Photo')</label>
                                                                <div class="thumb-item ">
                                                                    <img src="images/thumbnail-demo.jpg"
                                                                        alt="">
                                                                    <div class="thumb-dt filerequired p-0">
                                                                        <div class="upload-btn p-4 ">
                                                                            <input class="uploadBtn-main-input"
                                                                                type="file"
                                                                                id="ThumbFile__input--source" required
                                                                                name="avatar" onchange="studentUpload()">

                                                                            <label for="ThumbFile__input--source"
                                                                                title="Zip">@lang("intranet.Déposez votre photo d'identité")</label>
                                                                            <div class="uploadBtn-main-file">
                                                                                @lang('intranet.Size: 590x300 pixels. Supports: jpg,jpeg, or png')</div>
                                                                                <p id="showFileStudent"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-tab-panel step-tab-gallery" id="tab_step2">
                                            <div class="tab-from-content">
                                                <div class="title-icon">
                                                    <h3 class="title"><i
                                                            class="uil uil-notebooks"></i>@lang('intranet.Informations Familiale')
                                                    </h3>
                                                </div>
                                                <div class="course__form">
                                                    <div class="general_info10">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Prénom du pére')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Prénom du pére')"
                                                                            name="prenom_pere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$student->prenom_pere }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Nom du père')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Nom du père')"
                                                                            name="nom_pere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->nom_pere }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Profession du père')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Profession du père')"
                                                                            name="profession_pere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->profession_pere }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Établissement de la profession du père')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Établissement de la profession du père')"
                                                                            name="etablissement_prof_pere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->etablissement_prof_pere }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Prénom de la mère')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Prénom de la mère')"
                                                                            name="prenom_mere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->prenom_mere }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Nom de la mère')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Nom de la mère')"
                                                                            name="nom_mere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->nom_mere }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Profession de la mére')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Profession de la mére')"
                                                                            name="profession_mere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->profession_mere }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Établissement de la profession de la mère')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Établissement de la profession de la mère')"
                                                                            name="etablissement_prof_mere"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->etablissement_prof_mere }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Adresse des parents')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Adresse des parents')"
                                                                            name="adresse_parents"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Code postale des parents')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number" min="1000" max ="9999" required
                                                                            placeholder="@lang('intranet.Code postale des parents')"
                                                                            name="code_postale_parents"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Numéro de téléphone des parents')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number"
                                                                            min="20000000"
                                                                            max="99999999"
                                                                            required
                                                                            placeholder="@lang('intranet.Numéro de téléphone des parents')"
                                                                            name="tel_parents"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Conjoint')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Conjoint')"
                                                                            name="conjoint"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Nom du jeune fille')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Nom du jeune fille')"
                                                                            name="nom_jeune_fille"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->nom_jeune_fille }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Profession du conjoint')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Profession du conjoint')"
                                                                            name="profession_conjoint"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Établissement de la profession du conjoint')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text"
                                                                            placeholder="@lang('intranet.Établissement de la profession du conjoint')"
                                                                            name="etablissement_profession_conjoint"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang("intranet.Nombre d'enfants")</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number"
                                                                            placeholder="@lang("intranet.Nombre d'enfants")"
                                                                            name="nombre_enfants"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="step-tab-panel step-tab-location" id="tab_step3">
                                            <div class="tab-from-content">
                                                <div class="title-icon">
                                                    <h3 class="title"><i class="uil uil-image"></i>@lang('intranet.Baccalauréat')
                                                    </h3>
                                                </div>
                                                <div class="course__form">
                                                    <div class="general_info10">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Année du bac')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number" required
                                                                            placeholder="@lang('intranet.Année du bac')"
                                                                            name="annee_bac" min="1975"
                                                                            max="2013"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->annee_bac }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Moyenne du bac')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="number" step="0.01" min="9" max="20" required
                                                                            placeholder="@lang('intranet.Moyenne du bac')"
                                                                            name="moyenne_bac"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]"
                                                                            value="{{ @$info_student->moyenne_bac }}">
                                                                        <div>@lang('intranet.Champ obligatoire!')</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Session du bac')</label>
                                                                </div>
                                                                <select name="session_bac" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected
                                                                        value="{{ @$info_student->session_bac }}">
                                                                    </option>
                                                                    <option value="Session principale">Session
                                                                        principale</option>
                                                                    <option value="Session de contrôle">Session de
                                                                        contrôle </option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Mention du bac')</label>
                                                                </div>
                                                                <select name="mention_bac" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected
                                                                        value="{{ @$info_student->mention_bac }}">
                                                                    </option>
                                                                    <option value="Très bien">Très bien</option>
                                                                    <option value="Bien">Bien</option>
                                                                    <option value="Assez bien">Assez bien</option>
                                                                    <option value="Passable">Passable</option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>


                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Section du bac')</label>
                                                                </div>
                                                                <select name="section_bac" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected
                                                                        value="{{ @$info_student->section_bac }}">
                                                                    </option>
                                                                    <option value="Sciences de l'Informatique">Sciences
                                                                        de l'Informatique</option>
                                                                    <option value="Sciences Expérimentales">Sciences
                                                                        Expérimentales </option>
                                                                    <option value="Sciences Techniques">Sciences
                                                                        Techniques </option>
                                                                    <option value="Mathematiques">Mathematiques
                                                                    </option>
                                                                    <option value="Economie et gestion">Economie et
                                                                        gestion </option>
                                                                    <option value="Lettres">Lettres </option>
                                                                    <option value="Sport">Sport </option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 select dropdown2">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Pays du bac')</label>
                                                                </div>
                                                                {{-- class="dropdown specifique_css form-select"  old class select --}}
                                                                <select class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css" name="pays_bac" required
                                                                     id="basic-usage" >
                                                                    <option disabled selected
                                                                        value="{{ @$info_student->pays_bac }}">
                                                                    </option>
                                                                    <option value="Tunisie" >Tunisie </option>
                                                                    <option value="Afghanistan">Afghanistan </option>
                                                                    <option value="Afrique_Centrale">Afrique_Centrale
                                                                    </option>
                                                                    <option value="Afrique_du_sud">Afrique_du_Sud
                                                                    </option>
                                                                    <option value="Albanie">Albanie </option>
                                                                    <option value="Algerie">Algerie </option>
                                                                    <option value="Allemagne">Allemagne </option>
                                                                    <option value="Andorre">Andorre </option>
                                                                    <option value="Angola">Angola </option>
                                                                    <option value="Anguilla">Anguilla </option>
                                                                    <option value="Arabie_Saoudite">Arabie_Saoudite
                                                                    </option>
                                                                    <option value="Argentine">Argentine </option>
                                                                    <option value="Armenie">Armenie </option>
                                                                    <option value="Australie">Australie </option>
                                                                    <option value="Autriche">Autriche </option>
                                                                    <option value="Azerbaidjan">Azerbaidjan </option>

                                                                    <option value="Bahamas">Bahamas </option>
                                                                    <option value="Bangladesh">Bangladesh </option>
                                                                    <option value="Barbade">Barbade </option>
                                                                    <option value="Bahrein">Bahrein </option>
                                                                    <option value="Belgique">Belgique </option>
                                                                    <option value="Belize">Belize </option>
                                                                    <option value="Benin">Benin </option>
                                                                    <option value="Bermudes">Bermudes </option>
                                                                    <option value="Bielorussie">Bielorussie </option>
                                                                    <option value="Bolivie">Bolivie </option>
                                                                    <option value="Botswana">Botswana </option>
                                                                    <option value="Bhoutan">Bhoutan </option>
                                                                    <option value="Boznie_Herzegovine">
                                                                        Boznie_Herzegovine </option>
                                                                    <option value="Bresil">Bresil </option>
                                                                    <option value="Brunei">Brunei </option>
                                                                    <option value="Bulgarie">Bulgarie </option>
                                                                    <option value="Burkina_Faso">Burkina_Faso </option>
                                                                    <option value="Burundi">Burundi </option>

                                                                    <option value="Caiman">Caiman </option>
                                                                    <option value="Cambodge">Cambodge </option>
                                                                    <option value="Cameroun">Cameroun </option>
                                                                    <option value="Canada">Canada </option>
                                                                    <option value="Canaries">Canaries </option>
                                                                    <option value="Cap_vert">Cap_Vert </option>
                                                                    <option value="Chili">Chili </option>
                                                                    <option value="Chine">Chine </option>
                                                                    <option value="Chypre">Chypre </option>
                                                                    <option value="Colombie">Colombie </option>
                                                                    <option value="Comores">Colombie </option>
                                                                    <option value="Congo">Congo </option>
                                                                    <option value="Congo_democratique">
                                                                        Congo_democratique </option>
                                                                    <option value="Cook">Cook </option>
                                                                    <option value="Coree_du_Nord">Coree_du_Nord
                                                                    </option>
                                                                    <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                                    <option value="Costa_Rica">Costa_Rica </option>
                                                                    <option value="Cote_d_Ivoire">Côte_d_Ivoire
                                                                    </option>
                                                                    <option value="Croatie">Croatie </option>
                                                                    <option value="Cuba">Cuba </option>
                                                                    <option value="Danemark">Danemark </option>
                                                                    <option value="Djibouti">Djibouti </option>
                                                                    <option value="Dominique">Dominique </option>
                                                                    <option value="Egypte">Egypte </option>
                                                                    <option value="Emirats_Arabes_Unis"> Emirats_Arabes_Unis </option>
                                                                    <option value="Equateur">Equateur </option>
                                                                    <option value="Erythree">Erythree </option>
                                                                    <option value="Espagne">Espagne </option>
                                                                    <option value="Estonie">Estonie </option>
                                                                    <option value="Etats_Unis">Etats_Unis </option>
                                                                    <option value="Ethiopie">Ethiopie </option>
                                                                    <option value="Falkland">Falkland </option>
                                                                    <option value="Feroe">Feroe </option>
                                                                    <option value="Fidji">Fidji </option>
                                                                    <option value="Finlande">Finlande </option>
                                                                    <option value="France">France </option>
                                                                    <option value="Gabon">Gabon </option>
                                                                    <option value="Gambie">Gambie </option>
                                                                    <option value="Georgie">Georgie </option>
                                                                    <option value="Ghana">Ghana </option>
                                                                    <option value="Gibraltar">Gibraltar </option>
                                                                    <option value="Grece">Grece </option>
                                                                    <option value="Grenade">Grenade </option>
                                                                    <option value="Groenland">Groenland </option>
                                                                    <option value="Guadeloupe">Guadeloupe </option>
                                                                    <option value="Guam">Guam </option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guernesey">Guernesey </option>
                                                                    <option value="Guinee">Guinee </option>
                                                                    <option value="Guinee_Bissau">Guinee_Bissau
                                                                    </option>
                                                                    <option value="Guinee equatoriale">
                                                                        Guinee_Equatoriale </option>
                                                                    <option value="Guyana">Guyana </option>
                                                                    <option value="Guyane_Francaise ">Guyane_Francaise
                                                                    </option>

                                                                    <option value="Haiti">Haiti </option>
                                                                    <option value="Hawaii">Hawaii </option>
                                                                    <option value="Honduras">Honduras </option>
                                                                    <option value="Hong_Kong">Hong_Kong </option>
                                                                    <option value="Hongrie">Hongrie </option>

                                                                    <option value="Inde">Inde </option>
                                                                    <option value="Indonesie">Indonesie </option>
                                                                    <option value="Iran">Iran </option>
                                                                    <option value="Iraq">Iraq </option>
                                                                    <option value="Irlande">Irlande </option>
                                                                    <option value="Islande">Islande </option>
                                                                    <option value="Italie">italie </option>

                                                                    <option value="Jamaique">Jamaique </option>
                                                                    <option value="Jan Mayen">Jan Mayen </option>
                                                                    <option value="Japon">Japon </option>
                                                                    <option value="Jersey">Jersey </option>
                                                                    <option value="Jordanie">Jordanie </option>

                                                                    <option value="Kazakhstan">Kazakhstan </option>
                                                                    <option value="Kenya">Kenya </option>
                                                                    <option value="Kirghizstan">Kirghizistan </option>
                                                                    <option value="Kiribati">Kiribati </option>
                                                                    <option value="Koweit">Koweit </option>

                                                                    <option value="Laos">Laos </option>
                                                                    <option value="Lesotho">Lesotho </option>
                                                                    <option value="Lettonie">Lettonie </option>
                                                                    <option value="Liban">Liban </option>
                                                                    <option value="Liberia">Liberia </option>
                                                                    <option value="Liechtenstein">Liechtenstein
                                                                    </option>
                                                                    <option value="Lituanie">Lituanie </option>
                                                                    <option value="Luxembourg">Luxembourg </option>
                                                                    <option value="Lybie">Lybie </option>

                                                                    <option value="Macao">Macao </option>
                                                                    <option value="Macedoine">Macedoine </option>
                                                                    <option value="Madagascar">Madagascar </option>
                                                                    <option value="Madère">Madère </option>
                                                                    <option value="Malaisie">Malaisie </option>
                                                                    <option value="Malawi">Malawi </option>
                                                                    <option value="Maldives">Maldives </option>
                                                                    <option value="Mali">Mali </option>
                                                                    <option value="Malte">Malte </option>
                                                                    <option value="Man">Man </option>
                                                                    <option value="Mariannes du Nord">Mariannes du Nord
                                                                    </option>
                                                                    <option value="Maroc">Maroc </option>
                                                                    <option value="Marshall">Marshall </option>
                                                                    <option value="Martinique">Martinique </option>
                                                                    <option value="Maurice">Maurice </option>
                                                                    <option value="Mauritanie">Mauritanie </option>
                                                                    <option value="Mayotte">Mayotte </option>
                                                                    <option value="Mexique">Mexique </option>
                                                                    <option value="Micronesie">Micronesie </option>
                                                                    <option value="Midway">Midway </option>
                                                                    <option value="Moldavie">Moldavie </option>
                                                                    <option value="Monaco">Monaco </option>
                                                                    <option value="Mongolie">Mongolie </option>
                                                                    <option value="Montserrat">Montserrat </option>
                                                                    <option value="Mozambique">Mozambique </option>

                                                                    <option value="Namibie">Namibie </option>
                                                                    <option value="Nauru">Nauru </option>
                                                                    <option value="Nepal">Nepal </option>
                                                                    <option value="Nicaragua">Nicaragua </option>
                                                                    <option value="Niger">Niger </option>
                                                                    <option value="Nigeria">Nigeria </option>
                                                                    <option value="Niue">Niue </option>
                                                                    <option value="Norfolk">Norfolk </option>
                                                                    <option value="Norvege">Norvege </option>
                                                                    <option value="Nouvelle_Caledonie">
                                                                        Nouvelle_Caledonie </option>
                                                                    <option value="Nouvelle_Zelande">Nouvelle_Zelande
                                                                    </option>

                                                                    <option value="Oman">Oman </option>
                                                                    <option value="Ouganda">Ouganda </option>
                                                                    <option value="Ouzbekistan">Ouzbekistan </option>

                                                                    <option value="Pakistan">Pakistan </option>
                                                                    <option value="Palau">Palau </option>
                                                                    <option value="Palestine">Palestine </option>
                                                                    <option value="Panama">Panama </option>
                                                                    <option value="Papouasie_Nouvelle_Guinee">
                                                                        Papouasie_Nouvelle_Guinee </option>
                                                                    <option value="Paraguay">Paraguay </option>
                                                                    <option value="Pays_Bas">Pays_Bas </option>
                                                                    <option value="Perou">Perou </option>
                                                                    <option value="Philippines">Philippines </option>
                                                                    <option value="Pologne">Pologne </option>
                                                                    <option value="Polynesie">Polynesie </option>
                                                                    <option value="Porto_Rico">Porto_Rico </option>
                                                                    <option value="Portugal">Portugal </option>

                                                                    <option value="Qatar">Qatar </option>

                                                                    <option value="Republique_Dominicaine">
                                                                        Republique_Dominicaine </option>
                                                                    <option value="Republique_Tcheque">
                                                                        Republique_Tcheque </option>
                                                                    <option value="Reunion">Reunion </option>
                                                                    <option value="Roumanie">Roumanie </option>
                                                                    <option value="Royaume_Uni">Royaume_Uni </option>
                                                                    <option value="Russie">Russie </option>
                                                                    <option value="Rwanda">Rwanda </option>

                                                                    <option value="Sahara Occidental">Sahara Occidental
                                                                    </option>
                                                                    <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                                    <option value="Saint_Marin">Saint_Marin </option>
                                                                    <option value="Salomon">Salomon </option>
                                                                    <option value="Salvador">Salvador </option>
                                                                    <option value="Samoa_Occidentales">
                                                                        Samoa_Occidentales</option>
                                                                    <option value="Samoa_Americaine">Samoa_Americaine
                                                                    </option>
                                                                    <option value="Sao_Tome_et_Principe">
                                                                        Sao_Tome_et_Principe </option>
                                                                    <option value="Senegal">Senegal </option>
                                                                    <option value="Seychelles">Seychelles </option>
                                                                    <option value="Sierra Leone">Sierra Leone </option>
                                                                    <option value="Singapour">Singapour </option>
                                                                    <option value="Slovaquie">Slovaquie </option>
                                                                    <option value="Slovenie">Slovenie</option>
                                                                    <option value="Somalie">Somalie </option>
                                                                    <option value="Soudan">Soudan </option>
                                                                    <option value="Sri_Lanka">Sri_Lanka </option>
                                                                    <option value="Suede">Suede </option>
                                                                    <option value="Suisse">Suisse </option>
                                                                    <option value="Surinam">Surinam </option>
                                                                    <option value="Swaziland">Swaziland </option>
                                                                    <option value="Syrie">Syrie </option>

                                                                    <option value="Tadjikistan">Tadjikistan </option>
                                                                    <option value="Taiwan">Taiwan </option>
                                                                    <option value="Tonga">Tonga </option>
                                                                    <option value="Tanzanie">Tanzanie </option>
                                                                    <option value="Tchad">Tchad </option>
                                                                    <option value="Thailande">Thailande </option>
                                                                    <option value="Tibet">Tibet </option>
                                                                    <option value="Timor_Oriental">Timor_Oriental
                                                                    </option>
                                                                    <option value="Togo">Togo </option>
                                                                    <option value="Trinite_et_Tobago">Trinite_et_Tobago
                                                                    </option>
                                                                    <option value="Tristan da cunha">Tristan de cuncha
                                                                    </option>
                                                                    <option value="Tunisie">Tunisie </option>
                                                                    <option value="Turkmenistan">Turmenistan </option>
                                                                    <option value="Turquie">Turquie </option>

                                                                    <option value="Ukraine">Ukraine </option>
                                                                    <option value="Uruguay">Uruguay </option>

                                                                    <option value="Vanuatu">Vanuatu </option>
                                                                    <option value="Vatican">Vatican </option>
                                                                    <option value="Venezuela">Venezuela </option>
                                                                    <option value="Vierges_Americaines">
                                                                        Vierges_Americaines </option>
                                                                    <option value="Vierges_Britanniques">
                                                                        Vierges_Britanniques </option>
                                                                    <option value="Vietnam">Vietnam </option>

                                                                    <option value="Wake">Wake </option>
                                                                    <option value="Wallis et Futuma">Wallis et Futuma
                                                                    </option>

                                                                    <option value="Yemen">Yemen </option>
                                                                    <option value="Yougoslavie">Yougoslavie </option>

                                                                    <option value="Zambie">Zambie </option>
                                                                    <option value="Zimbabwe">Zimbabwe </option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-tab-panel step-tab-amenities" id="tab_step4">
                                            <div class="tab-from-content">
                                                <div class="title-icon">
                                                    <h3 class="title"><i
                                                            class="uil uil-usd-square"></i>@lang('intranet.Etude Universitaire')
                                                    </h3>
                                                </div>
                                                <div class="course__form">
                                                    <div class="general_info10">
                                                        <div class="row">

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.État')</label>
                                                                </div>
                                                                <select name="etat" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre état')
                                                                    </option>
                                                                    <option value="Nouveau">@lang('intranet.Nouveau')
                                                                    </option>
                                                                    <option value="Redoublant">@lang('intranet.Redoublant')
                                                                    </option>
                                                                    <option value="Muté" onchange="displayOption()">
                                                                        @lang('intranet.Muté')
                                                                    </option>
                                                                    <option value="Réorienté">@lang('intranet.Réorienté')
                                                                    </option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Diplôme')</label>
                                                                </div>
                                                                <select name="diplome_prepare" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre état')
                                                                    </option>
                                                                    @foreach ($type_formations as $type_formation)
                                                                        <option
                                                                            value="{{ $type_formation->$designation }}">
                                                                            {{ $type_formation->$designation }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang('intranet.Specialité')</label>
                                                                </div>
                                                                <select name="specialite" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre état')
                                                                    </option>
                                                                    @foreach ($formations as $formation)
                                                                        <option
                                                                            value="{{ $formation->$designation }}">
                                                                            {{ $formation->$designation }} </option>
                                                                    @endforeach
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang('intranet.Établissement éducatif précédent')</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang('intranet.Établissement éducatif précédent')"
                                                                            name="etablissement_educatif_precedente"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>@lang("intranet.Spécialité dans l'établissement éducatif précédent")</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore"
                                                                            type="text" required
                                                                            placeholder="@lang("intranet.Spécialité dans l'établissement éducatif précédent")"
                                                                            name="specialite_educatif_precedent"
                                                                            data-purpose="edit-course-title"
                                                                            id="main[title]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 select">
                                                                <div class="mt-30 lbel25">
                                                                    <label>@lang("intranet.Niveau dans l'établissement éducatif précédent")</label>
                                                                </div>
                                                                <select name="niveau_etab_educatif_precedent" required
                                                                    class="ui selection dropdown dropdown cntry152 prompt srch_explore specifique_css ">
                                                                    <option disabled selected value> @lang('intranet.Choisir votre état civil')
                                                                    </option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                                <div>@lang('intranet.Champ obligatoire!')</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="step-footer step-tab-pager">
                                        <button data-direction="prev"
                                            class="btn btn-default steps_btn">@lang('intranet.Précédent')</button>
                                        <button data-direction="next"
                                            class="btn btn-default steps_btn">@lang('intranet.Suivant')</button>
                                        <button data-direction="finish"
                                            class="btn btn-default steps_btn">@lang('intranet.Sauvgarder')</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="hide_submit" style="display:none">@lang('intranet.Sauvgarder')</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('intranet.layouts.script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $('#add-course-tab').steps({
            onFinish: function() {
                document.getElementById('hide_submit').click()
                console.log("test")
                // document.getElementById("wissem").submit();
            }
        });
    </script>
    <script>
        $(function() {
            $(".sortable").sortable();
            $(".sortable").disableSelection();
        });
    </script>
    <script>


        function specificNeed(e) {
            if (e.target.checked) {
                document.getElementById('besoin').style.display = "block";
            } else {
                document.getElementById('besoin').style.display = "none";
            }
        }

        $( '#basic-usage' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );

        function studentUpload() {
            var file = document.getElementById("ThumbFile__input--source").files[0];
            document.getElementById("showFileStudent").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }
    </script>

</body>

</html>
