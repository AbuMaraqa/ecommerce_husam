@section('title', 'قائمة الادوار')
<div>
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">اضافة صلاحية</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
