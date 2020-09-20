<?php


namespace Iyngaran\LaravelMessages\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Iyngaran\LaravelMessages\Models\Reply;

interface ReplyRepositoryInterface
{
    public function find(int $id): ?Reply;

    public function getAll(int $messageId): ?Collection;
}
