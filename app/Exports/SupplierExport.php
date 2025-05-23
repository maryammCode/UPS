<?php

namespace App\Exports;

use App\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupplierExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Supplier::select(
            'matricule',
            'raisonSocial',
            'numeroTel',
            'adresse',
            'email',
            'nomResponsable',
            'emailResponsable',
            'telResponsable',
            'created_at'
        )->get();
    }

    /**
     * Add column headings to the exported file.
     */
    public function headings(): array
    {
        return [
            'Matricule',
            'Raison Sociale',
            'Numéro Téléphone',
            'Adresse',
            'Email',
            'Nom Responsable',
            'Email Responsable',
            'Téléphone Responsable',
            'Date de Création',
        ];
    }
}
