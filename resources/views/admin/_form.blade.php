<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Slides')])
    @include('core::admin._title', ['default' => __('New slide')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">
    @include('core::admin._form-errors')

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

    <div class="row gx-3">
        <div class="col-sm-6">
            {!! BootForm::text(__('Website'), 'website')->type('url')->placeholder('https://') !!}
        </div>
    </div>

    {!! BootForm::select(__('Page'), 'page_id', Pages::allForSelect()) !!}

    <div class="mb-3">
        {!! TranslatableBootForm::hidden('status')->value(0) !!}
        {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
    </div>
    {!! TranslatableBootForm::textarea(__('Body'), 'body') !!}
</div>
