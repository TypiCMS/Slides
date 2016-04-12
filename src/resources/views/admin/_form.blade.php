@section('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
@endsection

@include('core::admin._buttons-form')

{!! BootForm::hidden('id') !!}

@include('core::admin._image-fieldset', ['field' => 'image'])

<div class="row">
    <div class="col-sm-2 form-group @if($errors->has('position'))has-error @endif">
        {!! BootForm::text(trans('validation.attributes.position'), 'position') !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! BootForm::text(trans('validation.attributes.url'), 'url') !!}
    </div>
</div>

{!! BootForm::select(trans('validation.attributes.page_id'), 'page_id', Pages::allForSelect()) !!}

{!! TranslatableBootForm::hidden('status')->value(0) !!}
{!! TranslatableBootForm::checkbox(trans('validation.attributes.online'), 'status') !!}
{!! TranslatableBootForm::textarea(trans('validation.attributes.body'), 'body')->addClass('ckeditor') !!}
