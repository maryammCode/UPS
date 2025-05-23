
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('intranet.layouts.css')
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    <style>
        .fade{opacity: 1;}

        .hide_print{
            display: initial;
        }
        .hide_print{
            display: none;
        }
    </style>
    <title>UPS</title> 
</head>
<body>
    <div class="col-md-12 fcrse_2 hidden-print w_div_btn_print"  >
        <button class=" save_address_btn w_btn_print"  onclick="print()"> <i class="uil uil-print" style="font-size: 20px;"></i> </button> &nbsp; &nbsp;
        <a href="{{route('intranet.home')}}">
            <button class=" save_address_btn" style="margin-top: 5px;" >@lang("intranet.Retour à l'accueil")</button>
        </a>
    </div>
    <div>
        <div class="content container">
            <div>
                <div class="page-content">
                    <div class="row page-row">
                        <article class="contact-form col-md-12 col-sm-7  page-row">
                            <div id="dvContainer">
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-body" style="padding:0px !important;" >
                                            <div class="table-responsive" style="padding: 15px;">
                                                <!--<table width="100%" style="margin:1px 5px 1em 0;">-->
                                                <table width="100%" >
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="row">
                                                                <table class="table" width="100%" >
                                                                    <tr>
                                                                        <td style="width:20%;">
                                                                            <img src="{{Voyager::image($fiche->avatar)}}" style="height: 120px;width:100px;">
                                                                        </td>
                                                                        <td style="text-align:center;width:60%;">
                                                                            <h3 >Fiche de Renseignements Etudiant<br>
                                                                                {{@$student->name}}<br>بطاقة إرشادات
                                                                                الطالب
                                                                            </h3>
                                                                        </td>
                                                                        <td style="text-align:right;width:20%;">
                                                                            <img src="{{Voyager::image($coordinate->logo)}}"
                                                                                style="width:240px;" />
                                                                        </td>
    
                                                                    </tr>
                                                                </table>
                                                                <br/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" style="text-align : center ;color :#ed2a26 ; border-bottom: 1px solid #000 !important;">
                                                            
                                                                <h3 class="h3">ETUDE UNIVERSITAIRE POUR
                                                                    {{$year->designation}} الدراسة الجامعية للسنة
                                                                </h3>
                                                            
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Diplôme à préparer 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->diplome_prepare}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الشهادة المحضرة
                                                            </b>
                                                        </td>
                                                    </tr>
                                            
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Spécialité 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->specialite}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الإختصاص
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Situation Universitaire
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->etat}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الوضعية الدراسية
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                    Etablissement universitaire précédent
                                                                
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->etablissement_educatif_precedente}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    المؤسسة الجامعية
                                                                للسنة الفارطة
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Niveau et Spécialité de l'année précédente
                                                                
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->niveau_etablissement_educatif_precedente}} -
                                                            {{@$fiche->specialite_etablissement_educatif_precedente}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                مستوى و 
                                                                    اختصاص
                                                                السنة الفارطة
                                                            </b>
                                                        </td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td colspan="5" style="text-align : center ; color: #ed2a26; border-bottom: 1px solid #000 !important;">
                                                            
                                                                <h3 class="h3">INFORMATIONS PERSONNELLES البيانات الشخصية</h3>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                CIN/Identifiant
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{Auth::user()->cin}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    رقم ب.ت.و أو الرقم الخاص
                                                                بالطالب في الخارج
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nom et Prénom de l'étudiant 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{Auth::user()->name}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                إسم و لقب الطالب(ة)
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Date et lieu de naissance 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@Auth::user()->date_naissance}} - {{@Auth::user()->lieu_naissance}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    تاريخ  و مكان الولادة
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Numéro de téléphone
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{Auth::user()->phone}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                رقم الهاتف
                                                            </b>
                                                        </td>
                                                    </tr>
                                    
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Genre 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@Auth::user()->genre}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الجنس
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nationalité 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@Auth::user()->nationalite}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الجنسية
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Numéro CNSS
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@Auth::user()->cnss}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b> رقم صندوق الضمان الإجتماعي </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Etat civil 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->etat_civil}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                الحالة الإجتماعية
                                                        </b>
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Besoin spécifique
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->besoin_specifique}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    حالة خاصة
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nom de jeune fille
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->nom_jeune_fille}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                لقب البنت قبل الزواج
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Etat militaire 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->etat_militaire}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الوضعية العسكرية
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Adresse locale (numéro et rue) 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@Auth::user()->address}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    (مكان السكن(الرقم والشارع
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Code Postal 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->code_postale}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الترقيم البريدي
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Téléphone personnel 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@Auth::user()->phone}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    رقم الهاتف الشخصي
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Adresse Email 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{Auth::user()->email}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    العنوان البريدي
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Profession 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->profession}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                المهنة   
                                                                </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Employeur
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->employeur}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                الموظِّف
                                                            </b>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td colspan="5" style="text-align : center ; color: #ed2a26;border-bottom: 1px solid #000 !important;">
                                                            
                                                                <h3 class="h3">INFORMATIONS FAMILIALES بيانات عن العائلة</h3>
                                                            
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nom et prénom du père 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->nom_pere}} {{@$student->prenom_pere}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    لقب الأب
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Profession du père 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->profession_pere}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    مهنة الأب
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Etablissement employeur du père 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->etablissement_prof_pere}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    مكان عمل الأب
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nom et prénom de la mère 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->nom_mere}}&nbsp; {{@$student->prenom_mere}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    لقب الأمّ
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Profession de la mère
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->profession_mere}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                مهنة الأم
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Etablissement employeur de la mère
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->etablissement_prof_mere}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                مكان عمل الأم
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Adresse des Parents (Numéro et Rue) 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->adresse_parents}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    مكان إقامة الوالدين
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Code Postal des Parents 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->code_postale_parents}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    الترقيم البريدي الخاص
                                                                بالوالدين
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Téléphone des Parents 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->tel_parents}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    رقم هاتف الوالدين
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <!--   <tr>
                                                        <td colspan="5" style="text-align : center; color: #ed2a26; border-bottom: 1px solid #000 !important;">
                                                            
                                                                <h3>INFORMATIONS CONJOINT بيانات عن القرين</h3>
                                                            
                                                        </td>
                                                    </tr> -->
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nom et Prénom du conjoint
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->conjoint}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                اسم القرين و لقبه
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Profession du conjoint
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->profession_conjoint}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                مهنة القرين
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Etablissement employeur
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->etablissement_profession_conjoint}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                مكان عمل القرين
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Nombre enfants
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$fiche->nombre_enfants}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                عدد الأبناء
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" style="text-align : center ; color: #ed2a26;border-bottom: 1px solid #000 !important;">
                                                            
                                                                <h3 class="h3">BACCALAUREAT الباكالوريا</h3>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Année du Bac 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->annee_bac}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    سنة البكالوريا
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Session du Bac 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->session_bac}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    دورة البكالوريا
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Section du Bac 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->section_bac}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    شعبة البكالوريا
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Mention du Bac 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->mention_bac}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    ملاحظة البكالوريا
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Moyenne du Bac 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->moyenne_bac}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    معدل البكالوريا
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                Pays du Bac 
                                                            </label>
                                                        </td>
                                                        <td colspan="3">
                                                            {{@$student->pays_bac}}
                                                        </td>
                                                        <td style="text-align : right">
                                                            <b>
                                                                    بلاد اجتياز البكالوريا
                                                            </b>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table width="100%" style="font-size: 55%;">
                                                    <tr>
                                                        <td style="width: 50%;">
                                                            <br><br>
                                                            <h3>
                                                                <font color="blue"><input name="agree" type="checkbox"
                                                                        checked disabled /> Je certifie que toutes les
                                                                    informations sont correctes</font>
                                                            </h3>
                                                        </td>
                                                        <td style="text-align: right">
                                                            <br><br>
                                                            {{-- <h3>Imprimée le  {{today | date:'dd-MM-yyy'}} </h3> --}}
                                                            <h3>Signature &nbsp; &nbsp; &nbsp; الإمضاء &nbsp; &nbsp;</h3>
                                                        </td>
                                                    </tr>
                                                </table>
    
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                        </article>
                        
                    </div>
                    <!--//page-row-->
                </div>
                <!--//page-content-->
            </div>
            <!--//page-->
        </div>
        <!--//content-->
    </div>
</body>
</html>

