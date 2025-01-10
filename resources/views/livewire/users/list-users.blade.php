@section('title', 'قائمة المستخدمين')
<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('users.create') }}"><span class="ti-icon ti ti-plus"></span> <span>اضافة
                            مستخدم</span></a>
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
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name ?? 'لا توجد صلاحية' }}</td>
                                <td>
                                    <span class="badge {{ $user->getStatusBadge() }}">
                                        {{ $user->getStatus() }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                            <a href="#"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                    class="ti ti-trash text-danger ti-md"></i>
                                            </a>
                                                <a href="app-user-view-account.html"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"><i
                                                class="ti ti-eye ti-md"></i></a>
                                                <a href="javascript:;"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="ti ti-dots-vertical ti-md"></i>
                                            </a>
                                        <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                            <a
                                                href="javascript:;" "="" class="dropdown-item">Edit</a>
                                                <a href="javascript:;" class="dropdown-item">Suspend</a>
                                            </div>
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
            </div>
        </div>
    </div>
</div>
