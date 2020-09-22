<?php


namespace Iyngaran\LaravelMessages\Http\Controllers\Api;

use Iyngaran\LaravelMessages\Repositories\ReplyRepositoryInterface;
use Iyngaran\LaravelMessages\Http\Resources\Reply as ReplyResource;
use Iyngaran\LaravelMessages\Http\Resources\ReplyCollection;
use Iyngaran\LaravelMessages\Http\Requests\ReplyRequest;
use Iyngaran\ApiResponse\Http\Traits\ApiResponse;
use Iyngaran\LaravelMessages\Models\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ReplyController extends Controller
{
    use ApiResponse;

    private $reply;

    public function __construct(ReplyRepositoryInterface $replyRepository)
    {
        $this->reply = $replyRepository;
    }

    public function store(ReplyRequest $request)
    {
        $reply_message = $request->input('message');
        $message_id = $request->input('message_id');

        $reply = Reply::create(
            [
                'message' => $reply_message,
                'message_id' => $message_id
            ]
        );
        return $this->createdResponse(
            new ReplyResource($reply)
        );
    }

    public function show($id): ?JsonResponse
    {
        return $this->responseWithItem(
            new ReplyResource($this->reply->find($id))
        );
    }

    public function getAllReplies($id): ?JsonResponse
    {
        return $this->responseWithCollection(
            new ReplyCollection($this->reply->getAll($id))
        );
    }
}
