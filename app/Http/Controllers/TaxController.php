<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Models\Tax;
use App\Services\TaxService;

class TaxController extends Controller
{

    protected $tax;
    public function __construct(TaxService $tax)
    {
        $this->tax = $tax;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = $this->tax->index();
        return view('chapters.Tax.read', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chapters.Tax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxRequest $request)
    {
        $data = $request->validated();
        $this->tax->store($data);
        return redirect()->route('tax.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax)
    {
        $user = $this->tax->show($tax);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        return view('chapters.Tax.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxRequest $request, Tax $tax)
    {
        $data = $request->validated();
        $this->tax->update($tax->id,$data );
        return redirect()->route('tax.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        $this->tax->delete($tax->id);
        return redirect()->route('tax.index');
    }
}
