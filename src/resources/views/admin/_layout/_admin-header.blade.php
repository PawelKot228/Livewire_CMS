<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{$title ?? ''}}</h1>
        <div class="card-tools">
            @if(isset($save))
                <button type="submit" class="btn btn-primary">@lang('admin.label.save')</button>
            @endif
            @if(isset($save_exit))
                <button type="submit" class="btn btn-primary" name="exit" value="1">
                    @lang('admin.label.save-and-exit')
                </button>
            @endif
            @if(isset($exit))
                <a href="{{$exit}}" class="btn btn-secondary">@lang('admin.label.exit')</a>
            @endif
            @if(isset($new))
                <a href="{{$new}}" class="btn btn-secondary">@lang('admin.label.new')</a>
            @endif
        </div>
    </div>
</div>
