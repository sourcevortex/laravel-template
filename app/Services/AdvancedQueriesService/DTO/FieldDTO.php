<?php

namespace App\Services\AdvancedQueriesService\DTO;

final class FieldDTO
{
    /**
     * @var string|null
     */
    private $filterField;

    /**
     * @var string
     */
    private $column;

    /**
     * @var string
     */
    private $operator;

    /**
     * @param string|null $filterField
     * @return self
     */
    public function setFilterField(?string $filterField): self
    {
        $this->filterField = $filterField;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilterField(): ?string
    {
        return $this->filterField;
    }

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

    /**
     * @param string $operator
     * @return self
     */
    public function setOperator(string $operator): self
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }
}
