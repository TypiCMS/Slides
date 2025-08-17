@extends('core::admin.master')

@section('title', __('New slide'))

@section('content')
    {!! BootForm::open()->action(route('admin::index-slides'))->addClass('main-content') !!}
    @include('slides::admin._form')
    {!! BootForm::close() !!}
@endsection
