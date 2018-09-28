@extends('core::admin.master')

@section('title', __('New slide'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'slides'])
        <h1 class="header-title">@lang('New slide')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-slides'))->multipart()->role('form') !!}
        @include('slides::admin._form')
    {!! BootForm::close() !!}

@endsection
