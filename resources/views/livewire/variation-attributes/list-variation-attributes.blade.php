@section('title', 'قائمة الصفات')
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
                                    class="d-none d-sm-inline-block">Export</span></span></button></div> <a href="{{ route('variations_attributes.create') }}"
                        class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0"
                        aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">{{ __('translation.variation attributes add') }}</span></span></a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            <div class="col-md-12">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>القيمة</th>
                            <th>الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($variationAttributes->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">{{ __('translate.No Data') }}</td>
                            </tr>
                        @else
                            @foreach ($variationAttributes as $variation)
                            <tr>
                                <td>{{ $variation->getTranslation('attribute_name', app()->getLocale()) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a wire:click="delete({{ $variation->id }})"
                                            wire:confirm="Are you sure you want to delete this post?"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                class="ti ti-trash text-danger ti-md"></i>
                                        </a>
                                        <a href="{{ route('variations_attributes.edit', $variation->id) }}"
                                            class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-edit"><i
                                                class="ti ti-edit ti-md"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="container p-3">
                    {{ $variationAttributes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
