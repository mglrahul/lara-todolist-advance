<?php

namespace App\Repositories;

use App\User;
use App\Task;
class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->tasks()
                    ->orderBy('created_at', 'asc')
                    ->paginate(2);
                    //->get();
    }
    
    public function taskDetails(Task $task, $id)
    {
        return $task->users()->where('id', $id)->get();
                    
    }
}