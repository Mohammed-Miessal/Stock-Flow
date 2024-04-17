<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Interfaces\UnitInterface;

class UnitRepository implements UnitInterface
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    public function index()
    {
        $units = $this->unit::all();
        return $units;
    }

    public function show($id)
    {
        $unit = $this->unit::find($id);
        return $unit;
    }

    public function create($data)
    {
        $unit = $this->unit::create($data);
        return $unit;
    }

    public function update($id,$data)
    {
        $unit = $this->unit::find($id);
        $unit->update($data);
        return $unit;
    }

    public function delete($id)
    {
        $unit = $this->unit::find($id);
        $unit->delete();
        return $unit;
    }
}
