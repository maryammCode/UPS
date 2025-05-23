<?php

namespace TCG\Voyager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
class TranslationController extends Controller
{
    public function index(Request $request,$lang)
    {

        $filePath = base_path("resources/lang/$lang/translate.php");
        $filePath = str_replace('/', DIRECTORY_SEPARATOR, $filePath);
        if (file_exists($filePath)) {
            // Le fichier existe, vous pouvez l'inclure
            $translations = include $filePath;
            // Convertir le tableau associatif en tableau de paires clé-valeur pour l'affichage
            $translations = collect($translations)->map(function ($value, $key) {
                Log::info('key', ['value' => $value]);
                return ['key' => $key, 'value' => $value];
            });
        }

        return View::Make('voyager::lang', compact('translations', 'lang'));

    }
    public function save(Request $request,$lang)
    {
        // Chemin du fichier de traduction
        $translationFilePath = base_path("resources/lang/$lang/translate.php");
        // Récupérer les données postées
        $data = $request->except('_token');
        // Lire le contenu du fichier de traduction
        $translations = include $translationFilePath;
        // Merge the new translations with the existing translations
        if (isset($data['translations'])) {
            $newTranslations = $data['translations'];
            $translations = array_merge($translations, $newTranslations);
        }
        // Merge the new translations from new_translations
        if (isset($data['new_translations']['key']) && isset($data['new_translations']['value'])) {
            foreach ($data['new_translations']['key'] as $index => $key) {
                $value = $data['new_translations']['value'][$index];
                if ($key !== null && $value !== null) {
                    $translations[$key] = $value;
                }
                if ($key !== null && $value === null) {
                    $translations[$key] = $key; // Assign key as value
                }
            }

        }
        // Convertir le tableau associatif en chaîne de caractères PHP valide
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";

        // Écrire le contenu mis à jour dans le fichier de traduction
        try {
            // Écrire le contenu mis à jour dans le fichier de traduction
            File::put($translationFilePath, $content);
        } catch (\Exception $e) {
            return back()->with([
                'message' => 'An error occurred while saving translations',
                'alert-type' => 'error',
            ]);
        }
        return back()->with([
            'message' => 'Les traductions ont été sauvegardées avec succès.',
            'alert-type' => 'success',
        ]);
    }


    public function indexTranslationIntranet(Request $request,$lang)
    {

        $filePath = base_path("resources/lang/$lang/intranet.php");
        $filePath = str_replace('/', DIRECTORY_SEPARATOR, $filePath);
        if (file_exists($filePath)) {
            // Le fichier existe, vous pouvez l'inclure
            $translations = include $filePath;
            // Convertir le tableau associatif en tableau de paires clé-valeur pour l'affichage
            $translations = collect($translations)->map(function ($value, $key) {
                Log::info('key', ['value' => $value]);
                return ['key' => $key, 'value' => $value];
            });
        }

        return View::Make('voyager::lang_intranet', compact('translations', 'lang'));

    }

    public function saveTranslationIntranet(Request $request,$lang)
    {
        // Chemin du fichier de traduction
        $translationFilePath = base_path("resources/lang/$lang/intranet.php");
        // Récupérer les données postées
        $data = $request->except('_token');
        // Lire le contenu du fichier de traduction
        $translations = include $translationFilePath;
        // Merge the new translations with the existing translations
        if (isset($data['translations'])) {
            $newTranslations = $data['translations'];
            $translations = array_merge($translations, $newTranslations);
        }
        // Merge the new translations from new_translations
        if (isset($data['new_translations']['key']) && isset($data['new_translations']['value'])) {
            foreach ($data['new_translations']['key'] as $index => $key) {
                $value = $data['new_translations']['value'][$index];
                if ($key !== null && $value !== null) {
                    $translations[$key] = $value;
                }
                if ($key !== null && $value === null) {
                    $translations[$key] = $key; // Assign key as value
                }
            }

        }
        // Convertir le tableau associatif en chaîne de caractères PHP valide
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";

        // Écrire le contenu mis à jour dans le fichier de traduction
        try {
            // Écrire le contenu mis à jour dans le fichier de traduction
            File::put($translationFilePath, $content);
        } catch (\Exception $e) {
            return back()->with([
                'message' => 'An error occurred while saving translations',
                'alert-type' => 'error',
            ]);
        }
        return back()->with([
            'message' => 'Les traductions ont été sauvegardées avec succès.',
            'alert-type' => 'success',
        ]);
    }



}
