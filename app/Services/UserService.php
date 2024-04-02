<?php 
namespace App\Services;

use App\Models\User;
use App\Interfaces\UserInterface;

class UserService implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function update($id, $data)
    {
        return User::find($id)->update($data);
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }
}