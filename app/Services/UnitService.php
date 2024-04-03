<?php 
namespace App\Services;

use App\Models\Unit;
use App\Interfaces\UnitInterface;

class UnitService implements UnitInterface
{

    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

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