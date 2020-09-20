<?php


namespace Iyngaran\LaravelMessages\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Iyngaran\ApiResponse\Http\Traits\ApiResponse;
use Iyngaran\LaravelMessages\Http\Requests\MessageRequest;
use Iyngaran\LaravelMessages\Http\Resources\MessageCollection;
use Iyngaran\LaravelMessages\Models\Message;
use Iyngaran\LaravelMessages\Http\Resources\Message as MessageResource;
use Iyngaran\LaravelMessages\Repositories\MessageRepositoryInterface;

class MessageController extends Controller
{
    use ApiResponse;
    private $message;

    public function __construct(MessageRepositoryInterface $message)
    {
        $this->message = $message;
    }

    public function store(MessageRequest $request)
    {
        $message_from_name = $request->input('from_name');
        $message_from_email = $request->input('from_email');
        $message_from_phone = $request->input('from_phone');
        $message = $request->input('message');
        $messageable_id = $request->input('messageable_id');

        $message = Message::create(
            [
                'message_from_name' => $message_from_name,
                'message_from_email' => $message_from_email,
                'message_from_phone' => $message_from_phone,
                'message' => $message,
                'messageable_id' => $messageable_id,

            ]
        );
        return $this->createdResponse(
            new MessageResource($message)
        );
    }

    public function show($id): ?JsonResponse
    {
        return $this->responseWithItem(
            new MessageResource($this->message->find($id))
        );
    }

    public function getAllMessages($id): ?JsonResponse
    {
        return $this->responseWithCollection(
            new MessageCollection($this->message->getAll($id))
        );
    }
}
