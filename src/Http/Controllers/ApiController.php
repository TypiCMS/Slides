<?php

namespace TypiCMS\Modules\Slides\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Slides\Models\Slide;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Slide::class)
            ->selectFields($request->input('fields.slides'))
            ->allowedSorts(['status_translated', 'position', 'body_translated'])
            ->allowedFilters([
                AllowedFilter::custom('body', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        $data->setCollection(
            collect($data->items())
                ->map(
                    function ($item) {
                        $item->body_translated = trim(strip_tags(html_entity_decode($item->body_translated)), '"');

                        return $item;
                    }
                )
        );

        return $data;
    }

    protected function updatePartial(Slide $slide, Request $request): JsonResponse
    {
        $data = [];
        foreach ($request->all() as $column => $content) {
            if (is_array($content)) {
                foreach ($content as $key => $value) {
                    $data[$column.'->'.$key] = $value;
                }
            } else {
                $data[$column] = $content;
            }
        }

        foreach ($data as $key => $value) {
            $slide->$key = $value;
        }
        $saved = $slide->save();

        return response()->json([
            'error' => !$saved,
        ]);
    }

    public function destroy(Slide $slide): JsonResponse
    {
        $deleted = $slide->delete();

        return response()->json([
            'error' => !$deleted,
        ]);
    }
}
