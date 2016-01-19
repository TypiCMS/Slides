@extends('pages::public.master')

@section('bodyClass', 'body-slides body-slides-index body-page body-page-' . $page->id)

@section('main')

    {!! $page->present()->body !!}

    @include('galleries::public._galleries', ['model' => $page])

    @if ($models->count())
    @include('slides::public._list', ['items' => $models])
    @endif

@endsection
