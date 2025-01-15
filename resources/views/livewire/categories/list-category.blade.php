@section('title', 'قائمة الفئات')
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
                    <a href="{{ route('category.create') }}" type="button" class="btn btn-primary">
                        اضافة قسم
                    </a>

                </div>
            </div>
        </div>
        <div class="card-datatable">
            <div class="col-md-12">
                <table class="table table-striped table-hover text-right">
                    <thead>
                        <tr>
                            <th>{{ __('translate.category image') }}</th>
                            <th>{{ __('translate.category name') }}</th>
                            <th>{{ __('translate.category description') }}</th>
                            <th>{{ __('translate.category status') }}</th>
                            <th>{{ __('translate.operation') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($this->getCategory as $category)
                                <tr>
                                    <td class="justify-items-center">
                                        {{-- {{ $category->getImage() }} --}}
                                        <img style="width: 40px" src="{{ $category->getImage('category_image') }}" alt="">
                                    </td>
                                    <td>{{ $category->getTranslation('name', app()->getLocale()) }}</td>
                                    <td>{{ $category->getTranslation('description', app()->getLocale()) }}</td>
                                    <td>{!! $category->getBadge() !!}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                    class="ti ti-trash text-danger ti-md"></i>
                                            </a>
                                            <a href="{{ route('category.edit', $category->id) }}"
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
                            @endforeach
                    </tbody>
                </table>
                <div class="container p-3">
                    {{ $this->getCategory->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
