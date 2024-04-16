<?php 
namespace App\Services;

use App\Interfaces\InvoiceInterface;

class InvoiceService
{

    protected $invoice;

    public function __construct(InvoiceInterface $invoice)
    {
        $this->invoice = $invoice;
    }

    public function index()
    {
        $invoices = $this->invoice->index();
        return $invoices;
    }

    public function store($data)
    {
        $invoice = $this->invoice->store($data);
        return $invoice;
    }

    public function show($id)
    {
        $invoice = $this->invoice->show($id);
        return $invoice;    
    }

    public function update($data, $id)
    {
        $invoice = $this->invoice->update($data, $id);
        return $invoice;
    }

    public function delete($id)
    {
        $invoice = $this->invoice->delete($id);
        return $invoice;
    }
}
