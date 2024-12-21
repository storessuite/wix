<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;

class WixInstance extends Model
{
    protected $fillable = [];

    public function extractSite(): WixSite {}
}
