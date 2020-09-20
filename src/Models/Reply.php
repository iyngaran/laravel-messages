<?php


namespace Iyngaran\LaravelMessages\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    const STATUS_SENT = 1;
    const STATUS_READ = 2;
    const STATUS_REPLIED = 3;

    public function getTable()
    {
        return config('iyngaran.messages.replies_table_name');
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
