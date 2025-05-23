<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use TCG\Voyager\Models\DataType;
use App\Imports\DataImport;
use App\Exports\DataExport;
use Illuminate\Support\Facades\Session;

class ImportExportController extends Controller
{
    // Import
    // public function import(){
    //     Excel::import(new UserImport, request()->file('file'));
    //     return back();
    // }

    // Export
    public function export($slug){
        $table_info = DataType::where('slug', $slug)->first();
        return Excel::download( new DataExport($slug), $slug.'.xlsx');
        // return Excel::download( new $table_info->model_exportation($slug), $slug.'.xlsx');
    }

    
        // Excel::import(new $table_info->model_importation ($request->slug), $request->file);
        

        public function Import(Request $request)
        {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv,xls',
            ]);
        
            try {
                $import = new DataImport($request->slug);
                Excel::import($import, $request->file);
        
                if ($import->failures()->isNotEmpty()) {
                    return back()
                        ->with('failures', $import->failures())
                        ->with('error', 'Certaines lignes ont échoué.');
                }
        
                return back()->with('success', 'Importation réussie!');
                
            } catch (\Exception $e) {
                return back()->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
            }
        }
        
        
    }


