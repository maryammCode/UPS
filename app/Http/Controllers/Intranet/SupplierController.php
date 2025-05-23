<?php

namespace App\Http\Controllers\Intranet;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SupplierImport;
use App\Exports\SupplierExport;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\Session;


class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
{
    // Search and filtering logic
    $query = Supplier::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('matricule', 'like', "%$search%")
              ->orWhere('raisonSocial', 'like', "%$search%")
              ->orWhere('numeroTel', 'like', "%$search%")
              ->orWhere('adresse', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('nomResponsable', 'like', "%$search%")
              ->orWhere('emailResponsable', 'like', "%$search%")
              ->orWhere('telResponsable', 'like', "%$search%");
        });
    }

    $suppliers = $query->paginate(10)->appends($request->query());

    // Message logic
    $message = null;
    if ($suppliers->isEmpty()) {
        if ($request->has('search') && $request->search != '') {
            $message = "Aucun résultat ne correspond à votre recherche.";
        } else {
            $message = "Aucun fournisseur n’est disponible.";
        }
    }

    return view('intranet.gestionnaire.index', compact('suppliers', 'message'));
}





    /**
     * Show the form for creating a new supplier.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('intranet.gestionnaire.create');
    }
    

    /**
     * Store a newly created supplier in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'matricule' => 'nullable|integer',
            'raisonSocial' => 'required| regex:/^[\pL\s\-]+$/u',
            'numeroTel' => 'required|integer',
            'adresse' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'nullable|email',
            'nomResponsable' => 'required|regex:/^[\pL\s\-]+$/u',
            'emailResponsable' => 'nullable|email',
            'telResponsable' => 'required|integer',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the supplier
        Supplier::create($request->all());

        return redirect()->route('intranet.suppliers.index')
           ->with('success', 'un nouveau fournisseur est ajouté avec succès.');
    }

    /**
     * Display the specified supplier.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('intranet.gestionnaire.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified supplier.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('intranet.gestionnaire.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in the database.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'matricule' => 'nullable|integer',
            'raisonSocial' => 'required| regex:/^[\pL\s\-]+$/u',
            'numeroTel' => 'required|integer',
            'adresse' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'nullable|email',
            'nomResponsable' => 'required|regex:/^[\pL\s\-]+$/u',
            'emailResponsable' => 'nullable|email',
            'telResponsable' => 'required|integer',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update the supplier
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('intranet.suppliers.index')
            ->with('success', ' le fournisseur a été mis à jour avec succès !');
    }

    /**
     * Remove the specified supplier from the database.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('intranet.suppliers.index')
            ->with('success', 'Le fournisseur est supprimé avec succès.');

    }


    public function import(Request $request)
    {
        $file = $request->file('file');

        if ($file) {

            $import = new SupplierImport();
            Excel::import($import, $file);

            // Check if there were validation failures
            if ($import->failures()->isNotEmpty()) {
                Session::flash('import_errors', $import->failures());
                return redirect()->back()->with('error', 'Certaines lignes contiennent des erreurs.');
            }

            return redirect()->back()->with('success', 'Importation réussie !');
        }

        return redirect()->back()->with('error', 'Veuillez sélectionner un fichier.');
    }


    
    public function export() { 
        return Excel::download(new SupplierExport, 'suppliers_' . now()->format('Y-m-d') . '.xlsx');
    }

}