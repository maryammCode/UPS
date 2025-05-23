<?php

namespace App\Imports;

use App\Supplier;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class SupplierImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures; // This already handles failures, so no need to redefine $failures

    public function model(array $row)
    {
        return new Supplier([
            'matricule'         => $row['matricule'] ?? null,
            'raisonSocial'      => $row['raison_sociale'] ?? null, 
            'numeroTel'         => $row['numero_telephone'] ?? null,  
            'adresse'           => $row['adresse'] ?? null,
            'email'             => $row['email'] ?? null,
            'nomResponsable'    => $row['nom_responsable'] ?? null,
            'emailResponsable'  => $row['email_responsable'] ?? null,
            'telResponsable'    => $row['telephone_responsable'] ?? null, 
        ]);
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
}
