<?php


namespace Iyngaran\LaravelMessages\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReplyCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

