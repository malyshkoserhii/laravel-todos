<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function getCommentById(int $id)
    {

        return Comment::find($id);
    }

    public function getAllCommentsByTodoId(int $todoId)
    {
        return Comment::with('user')
            ->where('todo_id', $todoId)
            ->paginate(10);
    }

    public function createComment(array $data)
    {
        return Comment::create($data);
    }

    public function updateComment(int $todoId, array $data)
    {
        $comment = Comment::findOrFail($todoId);
        $comment->update($data);
        return $comment;
    }

    public function deleteComment(int $todoId)
    {
        return Comment::where('id', $todoId)->delete();
    }
}
