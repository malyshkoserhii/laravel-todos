<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCommentsByTodoIdRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService) {}

    /**
     * Display a listing of the resource.
     */
    public function getCommentsBytodoId(int $todoId)
    {
        try {

            $comments = $this->commentService->getAllCommentsByTodoId($todoId);
            return response()->json($comments);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        try {
            $data = $request->validated();
            $comment = $this->commentService->createComment($data);
            return response()->json($comment);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            $comment = $this->commentService->updateComment($id, $data);
            return response()->json($comment);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->commentService->deleteComment($id);
            return response()->json(['message' => 'Comment deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
