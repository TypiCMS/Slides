@extends('core::admin.master')

@section('title', __('Slides'))

@section('content')
    <item-list url-base="/api/slides" fields="id,image_id,position,status,body" table="slides" title="slides" include="image" :searchable="['body']" :sorting="['position']">
        <template slot="add-button" v-if="$can('create slides')">
            @include('core::admin._button-create', ['module' => 'slides'])
        </template>

        <template slot="columns" slot-scope="{ sortArray }">
            <item-list-column-header name="checkbox" v-if="$can('update slides')||$can('delete slides')"></item-list-column-header>
            <item-list-column-header name="edit" v-if="$can('update slides')"></item-list-column-header>
            <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
            <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
            <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
            <item-list-column-header name="body_translated" sortable :sort-array="sortArray" :label="$t('Content')"></item-list-column-header>
        </template>

        <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
            <td class="checkbox" v-if="$can('update slides')||$can('delete slides')">
                <item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox>
            </td>
            <td v-if="$can('update slides')">
                <item-list-edit-button :url="'/admin/slides/' + model.id + '/edit'"></item-list-edit-button>
            </td>
            <td>
                <item-list-status-button :model="model"></item-list-status-button>
            </td>
            <td>
                <item-list-position-input :model="model"></item-list-position-input>
            </td>
            <td><img :src="model.thumb" alt="" height="27" /></td>
            <td>@{{ model.body_translated }}</td>
        </template>
    </item-list>
@endsection
