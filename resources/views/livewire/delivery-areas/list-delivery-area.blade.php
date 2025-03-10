@section('title', 'قائمة مناطق التوصيل')
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
                                    class="d-none d-sm-inline-block">Export</span></span></button></div> <a href="{{ route('delivery_areas.create') }}"
                        class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0"
                        aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">{{ __('translation.delivery_area add') }}</span></span></a>
                </div>
            </div>
        </div>
        <div class="card-datatable">
            <div class="col-md-12">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <td>{{ __('translation.label name') }}</td>
                            <td>{{ __('translation.delivery_area price') }}</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($delivery_areas->count() > 0)
                            @foreach ($delivery_areas as $delivery_area)
                                <tr>
                                    <td>{{ $delivery_area->getTranslation('name', app()->getLocale()) }}</td>
                                    <td>{{ $delivery_area->price }}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record"><i
                                                    class="ti ti-trash text-danger ti-md"></i>
                                            </a>
                                            <a href="{{ route('delivery_areas.edit', $delivery_area->id) }}"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-edit"><i
                                                    class="ti ti-edit ti-md"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">{{ __('translate.No Data') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="container p-3">
                    {{ $delivery_areas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
