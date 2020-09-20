<?php


namespace Iyngaran\LaravelMessages\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Iyngaran\LaravelMessages\Models\Message;

interface MessageRepositoryInterface
{
    public function find(int $id): ?Message;

    public function getAll(int $messageableId): ?Collection;
}
