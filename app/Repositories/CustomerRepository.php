<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function all()
    {
        return Customer::orderBy('name')
            ->with('user')
            ->where('active', 1)
            ->get()
            ->map(function ($customer){
                return [
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'created_by' => $customer->user->email,
                    'last_updated' => $customer->updated_at->diffForHumans(),
                ];
            });
    }

    public function findById($customer)
    {
        return Customer::findOrFail($customer);
    }
}
