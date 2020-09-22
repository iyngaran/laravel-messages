<?php


namespace Iyngaran\LaravelMessages\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reply extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'replies',
                'reply_id' => $this->id,
                'attributes' => [
                    'id' => $this->id,
                    'message' => $this->message,
                    'user_id' => $this->user_id,
                    'message_id' => $this->message_id
                ]
            ],
            'links' => [

                'self' => url("api/replies/" . $this->id),
            ]
        ];
    }
}
