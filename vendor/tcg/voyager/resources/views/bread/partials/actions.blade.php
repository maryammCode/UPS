

@if($data)
    @php
        // need to recreate object because policy might depend on record data
        $class = get_class($action);
        $action = new $class($dataType, $data);
    @endphp
    @can ($action->getPolicy(), $data)
        @if ($action->shouldActionDisplayOnRow($data))
            @if(($dataType->slug == "students" || $dataType->slug == "personals") && ($action->getTitle() == "Editer" || $action->getTitle() == "Edit"))
            <a href="{{ route('voyager.users.edit', ['id' => $data->{$data->getKeyName()} ]) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm"></span>
            </a>
            @elseif(($dataType->slug == "students" || $dataType->slug == "personals") && ($action->getTitle() == "Vue" || $action->getTitle() == "View"))
            <a href="{{ route('voyager.users.show', ['id' => $data->{$data->getKeyName()} ]) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm"></span>
            </a>
            @else
            <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm"></span>
            </a>
            @endif
        @endif
        <!-- @if ($action->shouldActionDisplayOnRow($data))
            <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm">{{ $action->getTitle() }}</span>
            </a>
        @endif -->
    @endcan
@elseif (method_exists($action, 'massAction'))
    <form method="post" action="{{ route('voyager.'.$dataType->slug.'.action') }}" style="display:inline">
        {{ csrf_field() }}
        <button type="submit" {!! $action->convertAttributesToHtml() !!}><i class="{{ $action->getIcon() }}"></i>  {{ $action->getTitle() }}</button>
        <input type="hidden" name="action" value="{{ get_class($action) }}">
        <input type="hidden" name="ids" value="" class="selected_ids">
    </form>
@endif
