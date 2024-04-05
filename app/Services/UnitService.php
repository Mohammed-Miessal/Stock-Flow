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
        // return Unit::all();
        $units = $this->unit->index();
        return $units;
    }

    public function show($id)
    {
        // return Unit::find($id);
        $unit = $this->unit->show($id);
        return $unit;
    }

    public function create($data)
    {
        // return Unit::create($data);
        $unit = $this->unit->create($data);
        return $unit;
    }

    public function update($id, $data)
    {
        // return Unit::find($id)->update($data);
        $unit = $this->unit->update($id, $data);
        return $unit;
    }

    public function delete($id)
    {
        // return Unit::find($id)->delete();
        $unit = $this->unit->delete($id);
        return $unit;
    }
}