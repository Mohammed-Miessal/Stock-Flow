<?php 
namespace App\Services;

use App\Models\Unit;
use App\Interfaces\UnitInterface;

class UnitService implements UnitInterface
{

    protected $unit;

    public function __construct(UnitInterface $unit)
    {
        $this->unit = $unit;
    }

    public function index()
    {
        $units = $this->unit->index();
        return $units;
    }

    public function show($id)
    {
        $unit = $this->unit->show($id);
        return $unit;
    }

    public function create($data)
    {
        $unit = $this->unit->create($data);
        return $unit;
    }

    public function update($id, $data)
    {
        $unit = $this->unit->update($id, $data);
        return $unit;
    }

    public function delete($id)
    {
        $unit = $this->unit->delete($id);
        return $unit;
    }
}