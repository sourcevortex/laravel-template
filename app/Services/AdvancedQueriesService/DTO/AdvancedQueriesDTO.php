<?php

namespace App\Services\AdvancedQueriesService\DTO;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class AdvancedQueriesDTO
{
    /**
     * @var Builder
     */
    private $builder;

    /**
     * @var PaginationDTO
     */
    private $pagination;

    /**
     * @var LengthAwarePaginator|null
     */
    private $laravelPagination;

    /**
     * @var string[]
     */
    private $appliedFilters = [];

    /**
     * @param Builder $builder
     * @return self
     */
    public function setBuilder(Builder $builder): self
    {
        $this->builder = $builder;
        return $this;
    }

    /**
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->builder;
    }

    /**
     * @param Pagination $pagination
     * @return self
     */
    public function setPagination(PaginationDTO $pagination): self
    {
        $this->pagination = $pagination;
        return $this;
    }

    /**
     * @return Pagination|null
     */
    public function getPagination(): ?PaginationDTO
    {
        return $this->pagination;
    }

    /**
     * @param LengthAwarePaginator $laravelPagination
     * @return self
     */
    public function setLaravelPagination(LengthAwarePaginator $laravelPagination): self
    {
        $this->laravelPagination = $laravelPagination;
        return $this;
    }

    /**
     * @return LengthAwarePaginator|null
     */
    public function getLaravelPagination(): ?LengthAwarePaginator
    {
        return $this->laravelPagination;
    }

    /**
     * @param string[] $appliedFilters
     * @return self
     */
    public function setAppliedFilters(array $appliedFilters): self
    {
        $this->appliedFilters = $appliedFilters;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getAppliedFilters(): array
    {
        return $this->appliedFilters;
    }
}
