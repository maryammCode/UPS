@if(@$options->module)
<strong>
@php
$config_module = App\ConfigModule::where('slug', $options->module)->first();
if(@$config_module && count($config_module->keywords) > 0){
    echo ' <br/> Vous pouvez utiliser les mots-clefs suivants : <br/> <span style="color: rgb(18, 69, 165) !important ; font-weight : 600 !important"> ' ;
    foreach($config_module->keywords as $keyword){
        echo $keyword->keyword .' ';
    }
    echo '</span>';
}
@endphp
</strong>
@endif
@php
if(@$dataType->slug == 'nachd-formulaires' && @$dataTypeContent->id ){

    $form_inputs = App\NachdFormulaireInput::where('nachd_formulaire_id', $dataTypeContent->id)->get();
    $inputs = App\NachdInput::whereIn('id', $form_inputs->pluck('nachd_input_id'))->get();

    if(@$inputs && count($inputs) > 0){
    echo ' <br/> Vous pouvez utiliser les mots-clefs suivants : <br/> <span style="color: rgb(18, 69, 165) !important ; font-weight : 600 !important"> ' ;
    foreach($inputs as $keyword){
        echo '{*' .$keyword->name .'*} ';
    }
    echo '{*CurrentDate*} {*CreatedAt*} {*UpdatedAt*} {*CreatedBy*} {*UpdatedBy*} ';
    echo '</span>';
}
}

@endphp
<textarea class="form-control richTextBox" name="{{ $row->field }}" id="richtext{{ $row->field }} classic">
    {{ old($row->field, $dataTypeContent->{$row->field} ?? $options->default ?? '') }}
</textarea>

@push('javascript')

    <script>
        $(document).ready(function() {
            var additionalConfig = {
                selector: 'textarea.richTextBox[name="{{ $row->field }}"]',
                plugins: 'code table link image searchreplace preview quickbars save  visualchars visualblocks  wordcount   ',
                toolbar:  'undo redo | searchreplace pagebreak preview quickbars save  visualchars visualblocks  wordcount |   | styles | bold italic underline| forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | fontselect fontsizeselect  | code | table | hr | link image',
            }

            $.extend(additionalConfig, {!! json_encode($options->tinymceOptions ?? (object)[]) !!})

            tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));
        });
    </script>
@endpush
