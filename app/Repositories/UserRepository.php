<?php 

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user::all();
        return $users;
    }

    public function show($id)
    {
        $user = $this->user::find($id);
        return $user;
    }

    public function store($data)
    {
        $user = $this->user::create($data);
        return $user;
    }

    public function update($id,$data)
    {
        $user = $this->user::find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->user::find($id);
        $user->delete();
        return $user;
    }
}
