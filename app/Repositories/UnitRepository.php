<?php
namespace App\Repositories;

use App\Models\Unit;
use App\Interfaces\UnitInterface;

class UnitRepository implements UnitInterface
{
    public function index()
    {
        return Unit::all();
    }

    public function show($id)
    {
        return Unit::find($id);
    }

    public function create($data)
    {
        return Unit::create($data);
    }

    public function update($id, $data)
    {
        return Unit::find($id)->update($data);
    }

    public function delete($id)
    {
        return Unit::find($id)->delete();
    }
}