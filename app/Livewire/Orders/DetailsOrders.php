<?php

namespace App\Livewire\Orders;

use App\Models\DeliveryArea;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

class DetailsOrders extends Component
{
    public ?array $data;
    public $order;
    public $orderItems = [];
    public $total_amount = 0;

    public function mount($order)
    {
        $this->order = $this->orders($order);
        $this->total_amount = $this->order->total_amount;

        // Load order items into Livewire property
        foreach ($this->order->orderItems as $item) {
            $this->orderItems[$item->id] = [
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->total
            ];
        }
    }

    #[Computed()]
    public function orders($order){
        return Orders::find($order);
    }

    public function updateTotal($itemId)
    {
        if (isset($this->orderItems[$itemId])) {
            $this->orderItems[$itemId]['total'] = $this->orderItems[$itemId]['quantity'] * $this->orderItems[$itemId]['price'];

            // Update database
            $orderItem = OrderItems::find($itemId);
            if ($orderItem) {
                $orderItem->quantity = $this->orderItems[$itemId]['quantity'];
                $orderItem->price = $this->orderItems[$itemId]['price'];
                $orderItem->total = $this->orderItems[$itemId]['total'];
                $orderItem->save();
            }

            // Update total order amount
            $this->total_amount = $this->order->orderItems->sum('total');
            $this->order->total_amount = $this->total_amount;
            $this->order->save();
        }
    }

    // public function updated($field){
    //     $this->data[$field] = $this->data[$field];
    // }


    public function save()
{
    $this->data['order_id'] = $this->order->id;
    $this->data['total'] = $this->data['price'] * $this->data['quantity'];

    // البحث عن المنتج في الطلب الحالي
    $orderItem = OrderItems::where('product_id', $this->data['product_id'])
        ->where('order_id', $this->order->id)
        ->first();

    if ($orderItem) {
        // حفظ القيم القديمة قبل التحديث
        $oldTotal = $orderItem->total;

        // تحديث الكمية وإعادة حساب الإجمالي
        $newQuantity = $orderItem->quantity + $this->data['quantity'];
        $newTotal = $newQuantity * $this->data['price'];

        $orderItem->update([
            'quantity' => $newQuantity,
            'price' => $this->data['price'],
            'total' => $newTotal
        ]);

        // تحديث إجمالي الطلب
        $this->order->total_amount += $newTotal - $oldTotal;
    } else {
        // إضافة منتج جديد إلى الطلب
        OrderItems::create($this->data);
        $this->order->total_amount += $this->data['total'];
    }

    // حفظ التغييرات
    $this->order->save();
    $this->total_amount = $this->order->total_amount;

    // ✅ إعادة تحديث الجدول بالكامل في Livewire 3
    $this->dispatch('refreshTable');
}

public function refreshTable()
{
    $this->order->refresh(); // إعادة تحميل الطلب وعناصره من قاعدة البيانات
}

    public function render()
    {
        return view('livewire.orders.details-orders', [
            'products' => Product::get(),
            'shipping_areas' => DeliveryArea::get()
        ]);
    }
}
