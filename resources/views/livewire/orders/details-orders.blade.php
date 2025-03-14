@section('title', 'تفاصيل الطلبية')
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <table>
                        <tr>
                            <td>اسم العميل</td>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-target="#basicModal" data-bs-toggle="modal">اضافة منتج</button>
                </div>
                <div class="col-md-12 mb-3">
                    <table class="table table-bordered" wire:init="refreshTable">
                        <thead>
                            <tr>
                                <th>اسم الصنف</th>
                                <th>الكمية</th>
                                <th>سعر الوحدة</th>
                                <th>الاجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $detail)
                                <tr wire:key="order-item-{{ $detail->id }}">
                                    <td>{{ $detail->product->getTranslation('name', app()->getLocale()) }}</td>
                                    <td class="text-center" style="justify-items: center">
                                        <input style="width: 100px" value="{{ $detail->quantity }}" type="text" class="form-control text-center" wire:model.lazy="orderItems.{{ $detail->id }}.quantity" wire:change="updateTotal({{ $detail->id }})">
                                    </td>
                                    <td style="justify-items: center">
                                        <input style="width: 100px" value="{{ $detail->price }}" type="text" class="form-control text-center" wire:model.lazy="orderItems.{{ $detail->id }}.price" wire:change="updateTotal({{ $detail->id }})">
                                    </td>
                                    <td>{{ $detail->total }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">الاجمالي</td>
                                <td>{{ $total_amount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form wire:submit.prevent="save" class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">اضافة صنف</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col mb-4">
                  <label for="nameBasic" class="form-label">اسم الصنف</label>
                  <select name="" id="" wire:model="data.product_id" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->getTranslation('name', app()->getLocale()) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row g-4">
                <div class="col-md-6 mb-0">
                  <label for="emailBasic" class="form-label">الكمية</label>
                  <input type="text" wire:model="data.quantity"  class="form-control">
                </div>
                <div class="col-md-6 mb-0">
                  <label for="dobBasic"  class="form-label">السعر</label>
                  <input type="text" wire:model='data.price' class="form-control">
                </div>
                <div class="col-md-6 mb-0">
                    <label for="dobBasic"  class="form-label">الخصم</label>
                    <input type="text" wire:model='data.discount' class="form-control">
                </div>
                <div class="col-md-6 mb-0">
                    <label for="dobBasic"  class="form-label">منطقة التوصيل</label>
                    <select name="" id="" wire:model='data.shipping_area' class="form-control">
                        <option value="">...</option>
                        @foreach ($shipping_areas as $shipping_area)
                            <option value="{{ $shipping_area->id }}">{{ $shipping_area->getTranslation('name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">اغلاق</button>
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>