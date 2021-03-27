<?php


namespace Module\ProductModule\Domain;


use Module\ProductModule\Exception\SearchCriteriaInvalidLimitException;
use Module\ProductModule\Exception\SearchCriteriaInvalidPageException;


class ProductSearchCriteria
{
    private int $limit;
    private int $page;
    private string $category;
    private string $name;

    public function __construct(int $limit = 10, int $page = 1, string $category = "", string $name = "" )
    {
        if($limit <= 0){
            throw new SearchCriteriaInvalidLimitException();
        }
        if($page <= 0){
            throw new SearchCriteriaInvalidPageException();
        }
        $this->limit = $limit;
        $this->page = $page;
        $this->category = $category;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}