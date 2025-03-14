@section('title', 'قائمة الكوبونات')
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
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        اضافة مستخدم
                    </button> --}}
                    <a href="{{ route('coupons.create') }}" type="button" class="btn btn-primary">
                        اضافة كوبون
                    </a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            <div class="col-md-12">
                <table class="table table-striped table-hover text-right">
                    <thead>
                        <tr>
                            <th>الكوبون</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($coupons->count() > 0)
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                    class="ti ti-trash text-danger ti-md"></i>
                                            </a>
                                            <a href="{{ route('coupons.edit', $coupon->id) }}"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-edit"><i
                                                    class="ti ti-edit ti-md"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2">{{ __('translate.No Data') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="container p-3">
                    {{-- {{ $this->getCategory->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
