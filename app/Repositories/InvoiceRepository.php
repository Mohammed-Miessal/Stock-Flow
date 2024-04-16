<?php 
namespace App\Repositories;

use App\Models\Invoice;
use App\Interfaces\InvoiceInterface;

class InvoiceRepository implements InvoiceInterface
{

    protected $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function index()
    {
        $invoices = $this->invoice::all();
        return $invoices;
    }

    public function store($data)
    {
        $invoice = $this->invoice::create($data);
        return $invoice;
    }

    public function show($id)
    {
        $invoice = $this->invoice::find($id);
        return $invoice;    
    }

    // public function update($data, $id)
    // {
    //     $invoice = $this->invoice::find($id);
    //     $invoice->update($data , $id);
    //     return $invoice;
    // }
    public function update($id, $data){
        $invoice = $this->invoice::find($id);
        $invoice->update($data);
        return $invoice;
    }

    public function delete($id)
    {
        $invoice = $this->invoice::find($id);
        $invoice->delete();
        return $invoice;
    }
}
