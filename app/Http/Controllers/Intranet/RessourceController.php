<?php

namespace App\Http\Controllers\Intranet;

use App\Ressource;
use App\RessourceCategory;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index(Request $request)
    {
        $query = Ressource::query();

        // Filter by name
        if ($request->has('designation_fr')) {
            $query->where('designation_fr', 'like', '%' . $request->designation_fr . '%');
        }

        // Filter by category
        if ($request->has('ressource_category_id')) {
            $query->where('ressource_category_id', $request->cressource_category_id);
        }

        $ressources = $query->paginate(10);

        return view('intranet.gestionnaire.ressources.index', compact('ressources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
{
    $categories = RessourceCategory::all();  // Get all categories
    $suppliers = Supplier::all();           // Get all suppliers
       
    return view('intranet.gestionnaire.ressources.create', compact('categories', 'suppliers'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ressource_category_id' => 'required|exists:ressource_categories,id',
            'designation_fr' => 'required|string|max:255',
            'designation_en' => 'nullable|string|max:255',
            'designation_ar' => 'nullable|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'quantité' => 'required|integer|min:0',
            'prix' => 'nullable|numeric|min:0',
            'image' => 'nullable|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
        ], [
            'required' => 'Ce champ est obligatoire',
        ], [
            // Override attribute names to be blank or generic
            'ressource_category_id' => 'catégorie',
            'designation_fr' => 'désignation',
            'designation_en' => 'désignation',
            'designation_ar' => 'désignation',
            'description_fr' => 'description',
            'description_en' => 'description',
            'description_ar' => 'description',
            'quantité' => 'quantité',
            'prix' => 'prix',
            'image' => '',
            'supplier_id' => 'fournisseur',
        ]);
        
        

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Ressource::create($request->all());

        return redirect()->route('intranet.ressources.index')
            ->with('success', 'Resource created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ressource = Ressource::findOrFail($id);
        return view('intranet.gestionnaire.ressources.show', compact('ressource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $categories = RessourceCategory::all();
        $ressource = Ressource::findOrFail($id);
        return view('intranet.gestionnaire.ressources.edit', compact('ressource','categories','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ressource_category_id' => 'required|exists:ressource_categories,id',
            'designation_fr' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'prix' => 'nullable|numeric|min:0',
            'quantite' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'description_fr' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ressource = Ressource::findOrFail($id);
        $ressource->update($request->all());

        return redirect()->route('intranet.ressources.index')
            ->with('success', 'Resource updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ressource = Ressource::findOrFail($id);
        $ressource->delete();

        return redirect()->route('intranet.ressources.index')
            ->with('success', 'Resource deleted successfully.');
    }





    public function reserve(Request $request)
{
    $query = Ressource::query();

        // Filter by name
        if ($request->has('designation_fr')) {
            $query->where('designation_fr', 'like', '%' . $request->designation_fr . '%');
        }

        // Filter by category
        if ($request->has('ressource_category_id')) {
            $query->where('ressource_category_id', $request->cressource_category_id);
        }

        $ressources = $query->paginate(10);

        return view('intranet.ressources.reservation.reserve', compact('ressources'));

    // $ressources = Ressource::with(['category', 'supplier'])->paginate(10);
}

}
