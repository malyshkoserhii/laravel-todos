<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;

class TodoPolicy
{

    public function update(User $user, Todo $todo): bool
    {
        if ($todo->user_id === $user->id) {
            return true;
        }

        if ($user->hasRole(['admin'])) {
            return $todo->user?->hasRole('user') ?? false;
        }

        return false;
    }

    public function delete(User $user, Todo $todo): bool
    {
        return $this->update($user, $todo);
    }
}
