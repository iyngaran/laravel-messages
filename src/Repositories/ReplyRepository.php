<?php


namespace Iyngaran\LaravelMessages\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Iyngaran\LaravelMessages\Models\Reply;

class ReplyRepository implements ReplyRepositoryInterface
{

    public function find(int $id): ?Reply
    {
        return Reply::find($id);
    }

    public function getAll(int $messageId): Collection
    {
        return Reply::where('message_id', $messageId)
            ->get();
    }
}
