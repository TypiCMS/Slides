@extends('core::admin.master')

@section('title', trans('slides::global.New'))

@section('main')

    @include('core::admin._button-back', ['module' => 'slides'])
    <h1>
        @lang('slides::global.New')
    </h1>

    {!! BootForm::open()->action(route('admin::index-slides'))->multipart()->role('form') !!}
        @include('slides::admin._form')
    {!! BootForm::close() !!}

@endsection
