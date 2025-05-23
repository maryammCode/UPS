<ol class="dd-list">

@foreach ($items as $item)

    <li class="dd-item" data-id="{{ $item->id }}">
        <div class="pull-right item_actions">
            <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $item->id }}">
                <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
            </div>
            <div class="btn btn-sm btn-primary pull-right edit"
                data-id="{{ $item->id }}"
                data-title="{{ $item->designation_fr }}"

            >
                <i class="voyager-edit"></i> {{ __('voyager::generic.edit') }}
            </div>
        </div>
        <div class="dd-handle">
            @if($isModelTranslatable)
                @include('voyager::multilingual.input-hidden', [
                    'isModelTranslatable' => true,
                    '_field_name'         => 'title'.$item->id,
                    '_field_trans'        => json_encode($item->getTranslationsOf('title'))
                ])
            @endif
            <span>{{ $item->designation_fr }}</span> <small class="url">{{ $item->link() }}</small>
        </div>
        @if(!$item->children->isEmpty())
            @include('voyager::categs.admin', ['items' => $item->children])
        @endif
    </li>

@endforeach

</ol>
