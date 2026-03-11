<?php

namespace App\Services;

use App\Repositories\TodoRepository;

class TodoService
{
    public function __construct(private TodoRepository $todoRepository) {}

    public function getAllTodos()
    {

        return $this->todoRepository->getAllTodos();
    }

    public function getTodoById(int $id)
    {
        $todo = $this->todoRepository->getTodoById($id);

        if (!$todo) {
            throw new \Exception('Todo with ID ' . $id . ' not found');
        }

        return $this->todoRepository->getTodoById($id);
    }

    public function createTodo(array $data)
    {
        return $this->todoRepository->createTodo($data);
    }

    public function updateTodo(int $id, array $data)
    {
        $todo = $this->todoRepository->getTodoById($id);

        if (!$todo) {
            throw new \Exception('Todo with ID ' . $id . ' not found');
        }

        return $this->todoRepository->updateTodo($id, $data);
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
