@section('title', 'قائمة المستخدمين')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-4">
                <div class="col-md-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <div class="mb-4">
                <input type="text" wire:model.live="search" placeholder="البحث" class="form-control">
            </div>
            <div class="dt-action-buttons text-end pt-6 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group"><button
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light border-none"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export ti-xs me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">Export</span></span></button></div> <a href="{{ route('users.create') }}"
                        class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0"
                        aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">اضافة مستخدم</span></span></a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            <div class="col-md-12">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الصلاحيات</th>
                            <th>الحالة</th>
                            <th>الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->loadUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span
                                        class="badge rounded-pill bg-label-warning">{{ $user->roles->first()->name ?? '' }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $user->getStatusBadge() }}">
                                        {!! $user->getStatusBadge() !!}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                class="ti ti-trash text-danger ti-md"></i>
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-edit"><i
                                                class="ti ti-edit ti-md"></i></a>
                                        {{-- <a href="javascript:;"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="ti ti-dots-vertical ti-md"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                            <a href="javascript:;" class="dropdown-item">Edit</a>
                                            <a href="javascript:;" class="dropdown-item">Suspend</a>
                                        </div> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">لا يوجد مستخدمين</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="container p-3">
                    {{ $this->loadUsers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
