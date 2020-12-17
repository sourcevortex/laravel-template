<?php

namespace App\Services\AdvancedQueriesService\DTO;

final class SortFieldDTO
{
    /**
     * @var string
     */
    private $column;

    /**
     * @param string $column
     * @return self
     */
    public function setColumn(string $column): self
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }
}
