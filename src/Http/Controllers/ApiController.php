<?php

namespace TypiCMS\Modules\Slides\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Slides\Models\Slide;
use TypiCMS\Modules\Slides\Repositories\EloquentSlide;

class ApiController extends BaseApiController
{
    public function __construct(EloquentSlide $slide)
    {
        parent::__construct($slide);
    }

    public function index(Request $request)
    {
        $models = QueryBuilder::for(Slide::class)
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $models;
    }

    protected function updatePartial(Slide $slide, Request $request)
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

        $this->repository->forgetCache();

        return response()->json([
            'error' => !$saved,
        ]);
    }

    public function destroy(Slide $slide)
    {
        $deleted = $this->repository->delete($slide);

        return response()->json([
            'error' => !$deleted,
        ]);
    }
}
