@section('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
@endsection

@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

@include('core::admin._image-fieldset', ['field' => 'image'])

<div class="row">
    <div class="col-sm-2 form-group @if ($errors->has('position'))has-error @endif">
        {!! BootForm::text(__('Position'), 'position')->type('number')->min(1)->required() !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! BootForm::text(__('Url'), 'url') !!}
    </div>
</div>

{!! BootForm::select(__('Page'), 'page_id', Pages::allForSelect()) !!}

{!! TranslatableBootForm::hidden('status')->value(0) !!}
{!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
{!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor') !!}
