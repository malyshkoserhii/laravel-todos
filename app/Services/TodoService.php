<?php

namespace App\Services;

use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Repositories\TodoRepository;
use Illuminate\Support\Facades\Auth;

class TodoService
{
    public function __construct(private TodoRepository $todoRepository) {}

    public function getAllTodos($completed)
    {

        $todos = $this->todoRepository->getAllTodos($completed);
        return new TodoCollection($todos);
    }

    public function getTodoById(int $id)
    {
        $todo = $this->todoRepository->getTodoById($id);

        if (!$todo) {
            throw new \Exception('Todo with ID ' . $id . ' not found');
        }

        return new TodoResource($todo);
    }

    public function createTodo(array $data)
    {
        $user = Auth::user();
        $userId = $user->id;
        $payload = [
            'user_id' => $userId,
            ...$data
        ];
        return new TodoResource($this->todoRepository->createTodo($payload));
    }

    public function updateTodo(int $id, array $data)
    {
        $todo = $this->todoRepository->getTodoById($id);

        if (!$todo) {
            throw new \Exception('Todo with ID ' . $id . ' not found');
        }

        return new TodoResource($this->todoRepository->updateTodo($id, $data));
    }

    public function deleteTodo(int $id)
    {
        $todo = $this->todoRepository->getTodoById($id);

        if (!$todo) {
            throw new \Exception('Todo with ID ' . $id . ' not found');
        }

        return $this->todoRepository->deleteTodo($id);
    }
}
