@extends('core::admin.master')

@section('title', __('Slides'))

@section('content')

<item-list
    url-base="/api/slides"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,position,body"
    translatable-fields="status,body"
    table="slides"
    title="slides"
    :searchable="['id']"
    :sorting="['position']">

    <template slot="add-button">
        @include('core::admin._button-create', ['module' => 'slides'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox"></item-list-column-header>
        <item-list-column-header name="edit"></item-list-column-header>
        <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="body_translated" :label="$t('Content')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td>@include('core::admin._button-edit', ['module' => 'slides'])</td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td><img :src="model.thumb" alt=""></td>
        <td>@{{ model.body_translated }}</td>
    </template>

</item-list>

@endsection
