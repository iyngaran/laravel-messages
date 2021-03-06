<?php


namespace Iyngaran\LaravelMessages\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    const STATUS_SENT = 1;
    const STATUS_READ = 2;
    const STATUS_REPLIED = 3;

    public function getTable()
    {
        return config('iyngaran.messages.messages_table_name');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
