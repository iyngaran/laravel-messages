<?php


namespace Iyngaran\LaravelMessages\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Iyngaran\LaravelMessages\Models\Message;

class MessageRepository implements MessageRepositoryInterface
{

    public function find(int $id): ?Message
    {
        return Message::find($id);
    }

    public function getAll(int $messageableId): Collection
    {
        return Message::where('messageable_id', $messageableId)
            ->where('messageable_type', config('iyngaran.messages.messageable_type'))
            ->get();
    }
}
