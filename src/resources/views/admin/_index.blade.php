<div ng-app="typicms" ng-cloak ng-controller="ListController">

    <h1>
        <a href="{{ route('admin.' . $module . '.create') }}" class="btn-add"><i class="fa fa-plus-circle"></i><span class="sr-only">New</span></a>
        <span>@{{ models.length }} @choice('slides::global.slides', 2)</span>
    </h1>

    @include('core::admin._tabs-lang-list')

    <div class="table-responsive">

        <table st-persist="slidesTable" st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="status" class="status st-sort">Status</th>
                    <th st-sort="image" class="image st-sort">Image</th>
                    <th st-sort="position" st-sort-default="true" class="position st-sort">Position</th>
                    <th st-sort="homepage" class="homepage st-sort">Home</th>
                    <th st-sort="title" class="title st-sort">Title</th>
                    <th st-sort="website" class="website st-sort">Website</th>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <input st-search="title" class="form-control input-sm" placeholder="@lang('global.Search')…" type="text">
                    </td>
                    <td>
                        <input st-search="website" class="form-control input-sm" placeholder="@lang('global.Search')…" type="text">
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td typi-btn-delete action="delete(model)"></td>
                    <td>
                        @include('core::admin._button-edit')
                    </td>
                    <td typi-btn-status action="toggleStatus(model)" model="model"></td>
                    <td>
                        <img ng-src="@{{ model.thumb }}" alt="">
                    </td>
                    <td>
                        <input class="form-control input-sm" min="0" type="number" value="@{{ model.position }}" name="position" ng-model="model.position" ng-change="update(model)">
                    </td>
                    <td>@{{ model.homepage }}</td>
                    <td>@{{ model.title }}</td>
                    <td>@{{ model.website }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" typi-pagination></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>
