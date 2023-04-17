@extends('core::admin.master')

@section('title', $model->present()->title)

@section('content')

    {!! BootForm::open()->put()->action(route('admin::update-slide', $model->id))->multipart()->role('form') !!}
    {!! BootForm::bind($model) !!}
    @include('slides::admin._form')
    {!! BootForm::close() !!}

@endsection
