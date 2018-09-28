@push('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
@endpush

@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}

<filepicker related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></filepicker>
<file-field type="image" field="image_id" data="{{ $model->image }}"></file-field>

<div class="row">
    <div class="col-sm-6">
        {!! BootForm::text(__('Url'), 'url') !!}
    </div>
</div>

{!! BootForm::select(__('Page'), 'page_id', Pages::allForSelect()) !!}

<div class="form-group">
    {!! TranslatableBootForm::hidden('status')->value(0) !!}
    {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
</div>
{!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor') !!}
