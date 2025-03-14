<?php

namespace App\Livewire\Coupons;

use App\Enums\CouponStatus;
use App\Enums\CouponTypes;
use App\Models\Coupon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateCoupons extends Component
{
    public ?array $data;
    public function generateCoupon()
{
    do{
        $code = strtoupper(Str::random(8)); // توليد كود عشوائي
    } while (Coupon::where('code', $code)->exists()); // التحقق من عدم التكرار

    $this->data['code'] = $code;

    $coupon = Coupon::create($this->data);

    // إرسال إشعار إلى الواجهة
    session()->flash('message', "تم إنشاء الكوبون: {$code}");
}

    #[Computed()]
    public function getCouponStatus(){
        return CouponStatus::toArray();
    }

    #[Computed()]
    public function getCouponTypes(){
        return CouponTypes::toArray();
    }

    public function render()
    {
        return view('livewire.coupons.create-coupons');
    }
}
