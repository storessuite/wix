<?php

namespace StoresSuite\Wix\WixApi\V1\Traits;

trait FiltersProducts
{
    public $filters = [];

    public function when(bool|null $condition, callable $callable)
    {
        if ($condition)
            $callable($this);

        return $this;
    }

    public function nameIs(string $name)
    {
        $this->filters['name']['$eq'] = $name;
        return $this;
    }

    public function nameIsNot(string $name)
    {
        $this->filters['name']['$ne'] = $name;
        return $this;
    }

    public function nameIn(array $names)
    {
        $this->filters['name']['$hasSome'] = $names;
        return $this;
    }

    public function nameContains(string $name)
    {
        $this->filters['name']['$contains'] = $name;
        return $this;
    }

    public function nameStartsWith(string $keywords)
    {
        $this->filters['name']['$startsWith'] = $keywords;
    }

    public function idIs(string $id)
    {
        $this->filters['id']['$eq'] = $id;
        return $this;
    }

    public function idIsNot(string $id)
    {
        $this->filters['id']['$ne'] = $id;
        return $this;
    }

    public function idIn(array $ids)
    {
        $this->filters['id']['$hasSome'] = $ids;
        return $this;
    }
}
