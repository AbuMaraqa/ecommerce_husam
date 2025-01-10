@section('title', 'انشاء مستخدم جديد')
<div>
    <div class="row mb-4">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <x-validation-message />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" wire:submit.prevent="createUser">
                        <div class="col-md-12 p-3">
                            <div class="form-group">
                                <label for="name">اسم المستخدم</label>
                                <input type="text" wire:model="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" />
                            </div>
                        </div>
                        <div class="col-md-6 p-3">
                            <div class="form-group">
                                <label for="email">الايميل</label>
                                <input type="email" wire:model="email" id="email"
                                    class="form-control @error('name') is-invalid @enderror" />
                            </div>
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
                                <input type="city" wire:model="city" id="city"
                                    class="form-control @error('city') is-invalid @enderror" />
                            </div>
                        </div>
                        <div class="col-md-12 p-3">
                            <div class="form-group">
                                <label for="address">الدور</label>
                                <select name="roles" wire:model="roles" class="form-control" id="roles">
                                    @foreach ($roles as $key)
                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 p-3">
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <textarea name="address" wire:model="address" id="address" cols="30" rows="3" class="form-control @error('address') is-invalid @enderror"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 p-3">
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="ti ti-save"></span> <span>اضافة</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
