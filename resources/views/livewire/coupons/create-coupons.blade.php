@section('title', 'انشاء كوبون جديد')
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="generateCoupon">
                <div class="col-md-12 mb-3">
                    <label class="form-label">نوع الخصم</label>
                    <select class="form-control" wire:model="data.type">
                        @foreach ($this->getCouponTypes() as $key => $type)
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">الخصم</label>
                    <input class="form-control" type="number" wire:model="data.discount" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">أقصى خصم</label>
                    <input class="form-control" type="number" wire:model="data.max_discount">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">أقل مبلغ للطلب</label>
                    <input class="form-control" type="number" wire:model="data.min_order_amount">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">عدد مرات الاستخدام</label>
                    <input class="form-control" type="number" wire:model="data.usage_limit" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">حالة الكوبون</label>
                    <select class="form-control" wire:model="data.status">
                        @foreach ($this->getCouponStatus() as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">إنشاء كوبون</button>
                </div>
            </form>
        </div>
    </div>
</div>
