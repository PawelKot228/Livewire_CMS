<div class="actions">
    @if(isset($edit))
        <a class="btn btn-sm btn-secondary" href="{{$edit}}" title="@lang('admin.label.edit')">
            <i class="fa-solid fa-pen-to-square fa-fw"></i>
        </a>
    @endif
    @if(isset($delete))
        <a class="btn btn-sm btn-danger" href="{{$delete}}" title="@lang('admin.label.delete')">
            <i class="fa-solid fa-eraser fa-fw"></i>
        </a>
    @endif
</div>
