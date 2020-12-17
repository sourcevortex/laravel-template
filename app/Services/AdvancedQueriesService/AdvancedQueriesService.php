<?php

namespace App\Services\AdvancedQueriesService;

use App\Services\AdvancedQueriesService\DTO\AdvancedQueriesDTO;
use App\Services\AdvancedQueriesService\DTO\FieldDTO;
use App\Services\AdvancedQueriesService\DTO\SortFieldDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdvancedQueriesService
{
    /**
     * Apply all query filter as possible (where, sort, pagination)
     *
     * @param Builder $builder
     * @param Request $request
     * @param FieldDTO[] $filterFields
     * @param SortFieldDTO[] $sortFields
     *
     * @return self
     */
    public static function applyAll(
        Builder $builder,
        Request $request,
        array $filterFields = [],
        array $sortFields = [],
        bool $api = true
    ): AdvancedQueriesDTO
    {
        $advancedQueriesReturn = new AdvancedQueriesDTO();
        $currentBuilder = $builder;

        if (!empty($filterFields)) {
            $currentBuilder = Filter::apply($builder, $request, $filterFields);

            $appliedFilters = [];
            foreach ($filterFields as $field) {
                $appliedFilters[$field->getFilterField()] = $request->get($field->getFilterField());
            }
            $advancedQueriesReturn->setAppliedFilters($appliedFilters);
        }

        if (!empty($sortFields)) {
            $currentBuilder = Sort::apply($currentBuilder, $request, $sortFields);
        }

        $advancedQueriesReturn->setBuilder($currentBuilder);

        if ($api) {
            $advancedQueriesReturn->setPagination(Pagination::apply($currentBuilder, $request));
        } else {
            $advancedQueriesReturn->setLaravelPagination($currentBuilder->paginate($request->get('limit') ?? 10));
        }

        return $advancedQueriesReturn;
    }
}
