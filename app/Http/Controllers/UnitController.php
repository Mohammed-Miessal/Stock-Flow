<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Services\UnitService;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{

    protected $unit;
    public function __construct(UnitService $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = $this->unit->index();
        return view('chapters.Unit.read', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chapters.Unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        $data = $request->validated();
        $this->unit->create($data);
        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        $this->unit->show($unit->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        $unit = $this->unit->show($unit->id);
        return view('chapters.Unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $data = $request->validated();
        $this->unit->update($unit->id, $data);
        return redirect()->route('unit.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $this->unit->delete($unit->id);
        return redirect()->route('unit.index');
    }
}
