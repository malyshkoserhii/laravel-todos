<?php

namespace App\Services;

use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Repositories\CommentRepository;

class CommentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CommentRepository $commentRepository, private TodoService $todoService) {}


    public function getCommentById(int $commentId)
    {
        $comment = $this->commentRepository->getCommentById($commentId);
        if (!$comment) {
            throw new \Exception('Comment with ID ' . $commentId . ' not found');
        }
        return new CommentResource($comment);
    }

    public function getAllCommentsByTodoId(int $todoId)
    {
        $this->todoService->getTodoById($todoId);
        $comments = $this->commentRepository->getAllCommentsByTodoId($todoId);
        return new CommentCollection($comments);
    }

    public function createComment(array $data)
    {
        $comment = $this->commentRepository->createComment($data);
        return new CommentResource($comment);
    }

    public function updateComment(int $todoId, array $data)
    {
        $comment = $this->commentRepository->updateComment($todoId, $data);
        return new CommentResource($comment);
    }

    public function deleteComment(int $commentId)
    {
        $this->getCommentById($commentId);

        return $this->commentRepository->deleteComment($commentId);
    }
}
