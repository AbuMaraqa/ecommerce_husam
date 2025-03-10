@section('title', 'قائمة الاصناف')
<div>
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
                                    class="d-none d-sm-inline-block">Export</span></span></button></div> <a href="{{ route('products.create') }}"
                        class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0"
                        aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">{{ __('translation.product add') }}</span></span></a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            <div class="col-md-12">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <td></td>
                            <td>{{ __('translate.product name') }}</td>
                            <td>{{ __('translate.product category') }}</td>
                            <td>{{ __('translate.product label') }}</td>
                            <td>{{ __('translate.product tag') }}</td>
                            <td>{{ __('translate.operation') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img style="width: 40px" src="{{ $product->getImage('product_image') }}" alt="">
                                    </td>
                                    <td>{{ $product->getTranslation('name', app()->getLocale()) }}</td>
                                    <td>
                                        @foreach ($product->categories as $category)
                                            <span class="badge bg-primary">{{ $category->getTranslation('name',app()->getLocale()) }}</span>
                                            {{-- {{ $category->getTranslation('name', app()->getLocale()) }} --}}
                                        @endforeach
                                        {{-- {{ $product->category->getTranslation('name', app()->getLocale()) }} --}}
                                    </td>
                                    <td>
                                        @foreach ($product->labels as $label)
                                            <span class="badge" style="background-color: {{ $label->bg_color }};color:{{ $label->text_color }} ">{{ $label->getTranslation('text',app()->getLocale()) }}</span>
                                        @endforeach
                                        {{-- {{ $product->label->getTranslation('text', app()->getLocale()) }} --}}
                                    </td>
                                    <td>
                                        @foreach ($product->tags as $tag)
                                            <span class="badge bg-label-primary">{{ $tag->getTranslation('text',app()->getLocale()) }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                    class="ti ti-trash text-danger ti-md"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-edit"><i
                                                    class="ti ti-edit ti-md"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">{{ __('translate.No Data') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="container p-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
