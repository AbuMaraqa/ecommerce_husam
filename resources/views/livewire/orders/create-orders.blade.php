@section('title', 'انشاء طلبية جديدة')
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="save">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">العميل</label>
                        <select wire:model="data.user_id" class="form-control form-select">
                            <option value="">{{ __('اختر العميل') }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">الخصم</label>
                        <input type="number" class="form-control" wire:model="data.discount">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">تفاصيل الطلبية</label>
                        <textarea type="text" wire:model="data.order_details" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">{{ __('translate.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>