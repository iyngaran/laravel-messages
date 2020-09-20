<?php


namespace Iyngaran\LaravelMessages\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $guarded = [];
    protected $table = 'categories';

    const STATUS_SENT = 1;
    const STATUS_READ = 2;
    const STATUS_REPLIED = 3;


}
