@section('title', 'انشاء مستخدم جديد')
<div>
    <x-validation-message />
    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="createUser">
                <div class="col-md-12 p-3">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" wire:model="name" id="name"
                            class="form-control @error('text') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-6 p-3">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" wire:model="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" />
                </div>
                <div class="col-md-6 p-3">
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" wire:model="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" />
                    </div>
                </div>

                <div class="col-md-6 p-3">
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="phone" wire:model="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror" />
                    </div>
                </div>

                <div class="col-md-6 p-3">
                    <div class="form-group">
                        <label for="city">المدينة</label>
                        <input wire:model="city" id="city"
                            class="form-control @error('city') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12 p-3">
                    <div class="form-group">
                        <label for="current_role_id">الدور</label>
                        <select name="current_role_id" wire:model="current_role_id" class="form-control" @error('current_role_id') is-invalid @enderror id="roles">
                            @foreach ($this->getRoles as $key)
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 p-3">
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <textarea name="address" wire:model="address" id="address" cols="30" rows="3"
                            class="form-control @error('address') is-invalid @enderror"></textarea>
                    </div>
                </div>

                <div class="col-md-12 p-3">
                    <div class="form-group">
                        <button wire:loading.class.remove="bg-danger" class="btn btn-primary"><span class="ti ti-save"></span> <span>اضافة</span></button>
                    </div>
                </div>

                <div wire:loading>
                    Loading ...
                </div>
            </form>
        </div>
    </div>
</div>
