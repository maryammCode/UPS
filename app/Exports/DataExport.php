<?php

namespace App\Exports;

// use App\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;
use TCG\Voyager\Models\DataRow;

class DataExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(public $slug)
    {
        $this->slug = $slug;
    }

    // public function collection()
    // {
    //     $tab_filds = array();
    //     $dataType = Voyager::model('DataType')->where('slug', '=', $this->slug)->first();
    //     foreach ($dataType->browseRows as $row){
    //         $tab_filds[] = $this->slug.'.'.$row->getTranslatedAttribute('field');
    //     }
    //     $model_name = $dataType->model_name;
    //     //create_query_start



    //     $query = $model_name::orderby($this->slug.'.'.'created_at');
    //     //distinct_relation_belongsto_attributs_start
    //     foreach($tab_filds as $key => $fild){
    //         if (str_contains($fild, '_belongsto_')) {
    //             $pieces = explode('_belongsto_', $fild);
    //             $info = $pieces[1];
    //             $pieces_2 = explode('_relationship', $info);
    //             $the_info = $pieces_2[0].'_id';
    //             //get_specific_table_name_start
    //             $modelNamespace = 'App\\';
    //             $model_name = $modelNamespace.Str::studly(Str::singular($pieces_2[0]));
    //             $specific_datatype = Voyager::model('DataType')->where('model_name', '=', $model_name)->first();
    //             $second_part = $specific_datatype->name;
    //             //get_specific_table_name_end
    //             $query = $query->join($second_part, $this->slug.'.'.$the_info, $second_part.'.id');
    //             $tab_filds[$key] = $second_part.'.designation_fr as '.$second_part;
    //         }
    //     }
    //     //distinct_relation_belongsto_attributs_end
    //     $query = $query->select($tab_filds)->get();
    //     //create_query_end
    //     return $query;
    // }

    public function collection()
    {
        $tab_filds = array();
        $slug = str_replace('-', '_', $this->slug);
        $dataType = Voyager::model('DataType')->where('slug', '=', $this->slug)->first();

        // nourhene : readRows instead of browseRows
        foreach ($dataType->readRows as $row) {
            $tab_filds[] = $slug . '.' . $row->getTranslatedAttribute('field');
        }
        $model_name = $dataType->model_name;
        //create_query_start
        $query = $model_name::orderby($slug . '.' . 'created_at');
        foreach ($tab_filds as $key => $fild) {
            if (str_contains($fild, '_belongsto_')) {

                $field_info= explode('.', $fild);
                $field_without_slug = $field_info[1];
                $get_data_row_info = DataRow::where('field', '=', $field_without_slug)->first();
                // dd("_belongsto_");
                $the_info = $get_data_row_info->details->column;
                $second_part = $get_data_row_info->details->table;
                $query = $query->leftJoin($second_part, $slug . '.' . $the_info, $second_part . '.'.$get_data_row_info->details->key);
                $tab_filds[$key] = $second_part . '.'.$get_data_row_info->details->label.' as ' . $second_part;
            } elseif (str_contains($fild, '_belongstomany_')) {

                $field_info = explode('.', $fild);
                $field_without_slug = $field_info[1];
                $get_data_row_info = DataRow::where('field', '=', $field_without_slug)->first();

                // Extract necessary details for the BelongsToMany relationship
                $related_table = $get_data_row_info->details->table; // Related table (articles)
                if(substr($get_data_row_info->details->table, -3) == 'ies'){
                    $related_table_singular = substr($get_data_row_info->details->table, 0, -3) . 'y';
                }else{
                    $related_table_singular = substr($get_data_row_info->details->table, 0, -1);
                }
                // Related table (articles)
                $related_key = $get_data_row_info->details->key; // Related table's key (id)
                $related_label = $get_data_row_info->details->label; // Label to display (title)
                $pivot_table = $get_data_row_info->details->pivot_table; // Pivot table (user_articles)
                $local_key = 'id'; // Assuming the local table has 'id' as the primary key
                if ($slug == 'theses') {
                    $pivot_local_key =  'thesis_id'; // Local key in pivot (user_id, for example)
                }else if ($slug == 'news') {
                      $pivot_local_key =  'news_id';
                }

                else {
                    $pivot_local_key =  substr($slug, 0, -1) . '_id'; // Local key in pivot (user_id, for example)
                }


                $pivot_foreign_key = $related_table_singular . '_id'; // Foreign key in pivot (article_id, for example)
                // dd($related_table);

                // Join the pivot table and the related table
                //left join

                $query = $query->leftJoin($pivot_table, $slug . '.id', '=', $pivot_table . '.' . $pivot_local_key)
                               ->leftJoin($related_table, $pivot_table . '.' . $pivot_foreign_key, '=', $related_table . '.' . $related_key);

                // Select the field with aliasing from the related table
                $tab_filds[$key] = $related_table . '.' . $related_label . ' as ' . $related_table;
            } elseif (str_contains($fild, '_hasone_')) {
                $field_info = explode('.', $fild);
                $field_without_slug = $field_info[1];
                $get_data_row_info = DataRow::where('field', '=', $field_without_slug)->first();
                dd("_hasone_");

                // Extract necessary details for the hasOne relationship
                $related_table = $get_data_row_info->details->table; // Related table (e.g., profile)
                $related_key = $get_data_row_info->details->key; // Key in the related table (e.g., user_id)
                $related_label = $get_data_row_info->details->label; // Label to display (e.g., profile_name)
                $local_column = $get_data_row_info->details->column; // Local column that references the related table's key (e.g., id)

                // Generate a unique alias for the related table to avoid duplication
                $related_table_alias = $related_table . '_' . $field_without_slug;

                // Join the related table with a unique alias
                $query = $query->join($related_table . ' as ' . $related_table_alias, $slug . '.' . $local_column, '=', $related_table_alias . '.' . $related_key);

                // Select the field with aliasing from the related table
                $tab_filds[$key] = $related_table_alias . '.' . $related_label . ' as ' . $related_table_alias;
            }



        }
        // dd($tab_filds);
        //distinct_relation_belongsto_attributs_end
        $query = $query->select($tab_filds)->get();
        //create_query_end
        return $query;
    }
    public function headings(): array
    {
        $tab_display_name = array();
        $dataType = Voyager::model('DataType')->where('slug', '=', $this->slug)->first();
        // nourhene : readRows instead of browseRows

        foreach ($dataType->readRows as $row) {
            $tab_display_name[] = $row->getTranslatedAttribute('display_name');
        }
        return $tab_display_name;
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
