<?php

namespace App\Services\AdvancedQueriesService;

use App\Services\AdvancedQueriesService\DTO\FieldDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Filter
{
    /**
     * Apply filters in query with "AND" SQL operator
     *
     * @param Builder $builder
     * @param Request $request
     * @param FieldDTO[] $filterFields
     *
     * @return Builder
     */
    public static function apply(Builder $builder, Request $request, array $filterFields): Builder
    {
        foreach ($filterFields as $field) {
            $fieldColumn = $field->getColumn();
            $fieldFilter = $field->getFilterField();
            $fieldOperator = $field->getOperator();
            $fieldValue = $request->get($fieldFilter ?? $fieldColumn);

            if (!$fieldValue) {
                continue;
            }

            if ($fieldOperator === 'like') {
                $fieldValue = "%{$fieldValue}%";
            }

            $builder->where($fieldColumn, $fieldOperator, $fieldValue);
        }

        return $builder;
    }
}
