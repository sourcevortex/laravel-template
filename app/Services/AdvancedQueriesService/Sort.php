<?php

namespace App\Services\AdvancedQueriesService;

use App\Services\AdvancedQueriesService\DTO\SortFieldDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Sort
{
    /**
     * Apply filters in query with "AND" SQL operator
     *
     * @param Builder $builder
     * @param SortFieldDTO[] $sortFields
     *
     * @return Builder
     */
    public static function apply(Builder $builder, Request $request, array $sortFields): Builder
    {
        foreach ($sortFields as $field) {
            $fieldColumn = $field->getColumn();
            $columnOrder = $request->get($fieldColumn);

            if (!$columnOrder) {
                continue;
            }

            $fieldToOrder = str_replace('sort_', '', $fieldColumn);
            $builder->orderBy($fieldToOrder, $columnOrder);
        }

        return $builder;
    }
}
