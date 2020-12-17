<?php

namespace App\Services\AdvancedQueriesService;

use App\Services\AdvancedQueriesService\DTO\PaginationDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Pagination
{
    /**
     * Add limit and offset in to query
     *
     * @param Builder $builder
     * @param Request $request
     *
     * @return self currentPage, perPage, total and query builder
     */
    public static function apply(Builder $builder, Request $request): PaginationDTO
    {
        $originalTotal = $builder->count();
        $limit = $request->get('limit') ?? 100;
        $page = $request->get('page') ?? 1;
        $offset = ($page - 1) * $limit;

        return (new PaginationDTO())
            ->setCurrentPage((int) $page)
            ->setPerPage((int) $limit)
            ->setTotal($originalTotal)
            ->setBuilder($builder->limit($limit)->offset($offset));
    }
}
