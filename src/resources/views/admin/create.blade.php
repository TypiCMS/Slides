@extends('core::admin.master')

@section('title', __('New slide'))

@section('content')

    @include('core::admin._button-back', ['module' => 'slides'])
    <h1>
        @lang('New slide')
    </h1>

    {!! BootForm::open()->action(route('admin::index-slides'))->multipart()->role('form') !!}
        @include('slides::admin._form')
    {!! BootForm::close() !!}

@endsection
