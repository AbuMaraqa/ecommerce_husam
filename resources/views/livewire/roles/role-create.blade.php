@section('title', 'انشاء صلاحية جديدة')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form wire:submit.prevent="createRole">
                                <div class="form-group">
                                    <label for="name">{{ __('translate.role_name') }}</label>
                                    <input type="text" wire:model="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mt-3">
                                    <label>الصلاحيات</label>
                                    <div class="d-flex align-items-center mb-3">
                                        <!-- زر اختيار الكل -->
                                        <div class="form-check me-3">
                                            <input type="checkbox"
                                                class="form-check-input" id="selectAll" wire:click="toggleSelectAll($event.target.checked)" >
                                            <label class="form-check-label" id="selectAll" for="selectAll">
                                                تحديد الكل
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap">
                                        @foreach ($allPermissions as $permission)
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="permission_{{ $permission->id }}"
                                                    wire:model="permissions" value="{{ $permission->name }}"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-sm btn-primary mt-3">إنشاء دور</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
