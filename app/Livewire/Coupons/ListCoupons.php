<?php

namespace App\Livewire\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class ListCoupons extends Component
{
    public function render()
    {
        return view('livewire.coupons.list-coupons',[
            'coupons' => Coupon::get()
        ]);
    }
}
