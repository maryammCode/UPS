<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Facades\Voyager;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsFailures;


class DataImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure

{
    use SkipsFailures; // Permet d'ignorer les lignes erronées tout en les enregistrant

    public function __construct(public $slug)
    {
        $this->slug = $slug;
    }

    public function model(array $row)
    {
        Log::info('Processing row: ', @$row);

        $dataType = Voyager::model('DataType')->where('slug', '=', $this->slug)->first();
        if (!$dataType) {
            throw new \Exception("DataType not found for slug: " . $this->slug);
        }

        $modelName = $dataType->model_name;
        $data = [];

        // If the import is for 'suppliers', create a Supplier instance
        if ($this->slug === 'suppliers') {
        $x = new $modelName([
            'matricule'         => $row['matricule'] ?? null,
            'raisonSocial'      => $row['raison_sociale'] ?? null, 
            'numeroTel'         => $row['numero_telephone'] ?? null,  
            'adresse'           => $row['adresse'] ?? null,
            'email'             => $row['email'] ?? null,
            'nomResponsable'    => $row['nom_responsable'] ?? null,
            'emailResponsable'  => $row['email_responsable'] ?? null,
            'telResponsable'    => $row['telephone_responsable'] ?? null, 
        ]);

        $x->save();
        return;
    } 

        // Création de l'objet à enregistrer
        if ($this->slug != 'users') {
            $x = new $modelName($data);
            if (isset($row['designation_fr'])) {
                $x->slug = Str::slug($row['designation_fr'], "-");
            }
        } else if (!empty($row['email'])) {
            $x = new $modelName([
                'email' => $row['email'],
                'password' => Hash::make($row['email']),
                'name' => $row['name'],
                'slug' => Str::slug($row['name'], "-")
            ]);
        } else {
            return;
        }

        $x->save();

        // Validation et enregistrement des autres champs
        foreach ($dataType->readRows as $row_table) {
            $field = @$row_table->getTranslatedAttribute('field');
            $displayName = @$row_table->getTranslatedAttribute('display_name');
            $specificHeaderName = $this->formatHeaderName($displayName);

            if (isset($row[$specificHeaderName]) && $row[$specificHeaderName] !== null && $row[$specificHeaderName] !== '') {
                $data[$field] = trim($row[$specificHeaderName]);
            }
        }

        $x->update($data);
        return;
    }
        

    public function rules(): array
    {
        return [
            'matricule'             => ['nullable', 'integer'],
            'raison_sociale'        => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'numero_telephone'      => ['required', 'integer'],
            'adresse'               => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'email'                 => ['nullable', 'email'],
            'nom_responsable'       => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'email_responsable'     => ['nullable', 'email'],
            'telephone_responsable' => ['required', 'integer'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'matricule.integer'          => 'Le matricule doit être un nombre.',
            'raison_sociale.required'    => 'Le champ Raison Sociale est obligatoire.',
            'raison_sociale.regex'       => 'Raison Sociale doit contenir uniquement des lettres, espaces et tirets.',
            'numero_telephone.required'  => 'Le champ Numéro Téléphone est obligatoire.',
            'numero_telephone.integer'   => 'Le Numéro Téléphone doit être un nombre.',
            'adresse.required'           => 'L\'adresse est obligatoire.',
            'adresse.regex'              => 'L\'adresse doit contenir uniquement des lettres, espaces et tirets.',
            'email.email'                => 'Le champ Email doit être une adresse email valide.',
            'nom_responsable.required'   => 'Le champ Nom Responsable est obligatoire.',
            'nom_responsable.regex'      => 'Le Nom Responsable doit contenir uniquement des lettres, espaces et tirets.',
            'email_responsable.email'    => 'Le champ Email Responsable doit être une adresse email valide.',
            'telephone_responsable.required' => 'Le champ Téléphone Responsable est obligatoire.',
            'telephone_responsable.integer'  => 'Le Téléphone Responsable doit être un nombre.',
        ];
    }

    private function formatHeaderName($displayName)
    {
        return strtolower(str_replace(
            [' ', 'é', 'è', 'â', 'ç', 'ô', 'î', '(', ')'],
            ['_', 'e', 'e', 'a', 'c', 'o', 'i', '', ''],
            $displayName
        ));
    }
}

?>
