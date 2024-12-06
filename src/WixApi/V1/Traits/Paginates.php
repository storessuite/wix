<?php

namespace StoresSuite\Wix\WixApi\V1\Traits;

trait Paginates
{
    public $page = 1;

    public function page(int $page)
    {
        $this->page = $page;
        return $this;
    }
}
