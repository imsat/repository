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
            ->map->format();


//        return Customer::orderBy('name')
//            ->with('user')
//            ->where('active', 1)
//            ->get()
//            ->map(function ($customer){
////                return $this->transform($customer);
//                return $customer->format();
//            });
    }

    public function findById($customer)
    {
        return Customer::findOrFail($customer)->format();
//        $customer = Customer::findOrFail($customer);
//        return $this->transform($customer);
    }

    public function findByUserName($userName)
    {
        return Customer::where('user_name', $userName)->firstOrFail()->format();
//        $customer = Customer::where('user_name', $userName)->firstOrFail();
//        return $this->transform($customer);
    }

    public function update($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->update(request()->only('name'));
    }


    public function delete($customerId)
    {
//        $customer = Customer::findOrFail($customerId)->delete();
        $customer = Customer::findOrFail($customerId)->delete();
    }


//    protected function transform($customer)
//    {
//        return [
//            'customer_id' => $customer->id,
//            'customer_name' => $customer->name,
//            'customer_user_name' => $customer->user_name,
//            'created_by' => $customer->user->email,
//            'last_updated' => $customer->updated_at->diffForHumans(),
//        ];
//    }
}
