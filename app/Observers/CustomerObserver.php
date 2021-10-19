<?php

namespace App\Observers;

use App\Models\Customer;

class CustomerObserver
{
    public function created(Customer $customer)
    {
        if (! app()->runningInConsole()) {
            $this->configureBasicCustomerSettings($customer);
        }
    }

    public function updated(Customer $customer)
    {
        //
    }

    public function deleted(Customer $customer)
    {
        //
    }

    protected function configureBasicCustomerSettings(Customer $customer)
    {
        $customer->customerLiability()->create([
            'short_term' => request()->get('short_term'),
            'long_term' => request()->get('long_term'),
            'other' => request()->get('other'),
        ]);
    }
}
