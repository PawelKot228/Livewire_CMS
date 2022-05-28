<div class="card">
    <div class="card-header">@lang('admin.nav.seo')</div>
    <div class="card-body">
        {{--                @dd($form)--}}


        {!! $form->renderFormElement('slug') !!}
        {!! $form->renderFormElement('seo_title') !!}
        {!! $form->renderFormElement('seo_description') !!}
        {!! $form->renderFormElement('seo_keywords') !!}

        @if($messages)
            <hr>
            <div class="messages">
                @foreach($messages as $type => $message)
                    <div class="alert alert-{{$type}}"><span>{{$message}}</span></div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-end">
        @if($seo)
            <button class="btn btn-sm btn-danger mr-2" type="button"
                    onclick="confirm('@lang('admin.alert.delete_prompt')') || event.stopImmediatePropagation();" wire:click="delete">
                @lang('admin.label.delete')
            </button>
        @endif
        <button class="btn btn-sm btn-primary" type="button" wire:click="save">@lang('admin.label.save')</button>
    </div>
</div>

