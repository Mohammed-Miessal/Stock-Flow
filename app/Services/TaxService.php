<?php
namespace App\Services;

use App\Models\Tax;
use App\Interfaces\TaxInterface;

class TaxService implements TaxInterface
{
    protected $tax;
    public function __construct(TaxInterface $tax)
    {
        $this->tax = $tax;
    }


    public function index()
    {
    $users = $this->tax->index();
    return $users;
    }

    public function show(Tax $tax)
    {
        $user = $this->tax->show($tax);
        return $user;
    }

    public function store(array $data)
    {
        $user = $this->tax->store($data);
        return $user;
    }

    public function update(array $data, Tax $tax)
    {
        $user = $this->tax->update($data, $tax);
        return $user;
    }

    public function delete(Tax $tax)
    {
        $user = $this->tax->delete($tax);
        return $user;
    }
}
