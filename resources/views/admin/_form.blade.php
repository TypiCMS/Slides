<div class="header">
    <x-core::back-button :url="$model->indexUrl()" :title="__('Slides')" />
    <x-core::title :$model :default="__('New slide')" />
    <x-core::form-buttons :$model :locales="locales()" />
</div>

<div class="content">
    <x-core::form-errors />

    <file-manager></file-manager>
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
