<?php 
namespace App\Services;

use App\Models\User;
use App\Interfaces\UserInterface;

class UserService implements UserInterface
{
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->index();
        return $users ;
    }

    public function show($id)
    {
        $user = $this->user->show($id);
        return $user;
    }

    public function store($data)
    {
        $user = $this->user->store($data);
        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->user->update($id, $data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->delete($id);
        return $user;
    }
}
