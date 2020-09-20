<?php


namespace Iyngaran\LaravelMessages\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'messages',
                'message_id' => $this->id,
                'attributes' => [
                    'id' => $this->id,
                    'from_name' => $this->message_from_name,
                    'from_email' => $this->message_from_email,
                    'from_phone' => $this->message_from_phone,
                    'message' => $this->message,
                    'user_id' => $this->user_id,
                    'messageable_id' => $this->messageable_id,
                    'messageable_type' => $this->messageable_type,
                ]
            ],
            'links' => [

                'self' => url("api/messages/".$this->id),
            ]
        ];
    }
}
