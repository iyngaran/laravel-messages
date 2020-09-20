<?php


namespace Iyngaran\LaravelMessages\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

