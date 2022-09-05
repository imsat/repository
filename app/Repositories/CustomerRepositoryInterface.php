<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById($customer);

    public function findByUserName($userName);

    public function update($customerId);

    public function delete($customerId);
}
