<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
    public function __construct() {}

    public function getAllTodos(string | null $completed)
    {
        if ($completed) {
            return Todo::orderBy('created_at', 'desc')->where('completed', $completed)->paginate(10);
        }

        return Todo::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getTodoById(int $id): Todo|null
    {
        return Todo::find($id);
    }

    public function createTodo(array $data)
    {
        return Todo::create($data);
    }

    public function updateTodo(int $id, array $data): Todo
    {
        $todo = Todo::findOrFail($id);

        $todo->update($data);

        return $todo;
    }

    public function deleteTodo(int $id)
    {
        return Todo::where('id', $id)->delete();
    }
}
