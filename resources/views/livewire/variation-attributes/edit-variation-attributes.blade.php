@section('title', 'تعديل صفة')
@section('style')
@endsection
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="update">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="attribute_name">اسم القيمة</label>
                        <input wire:model="data.attribute_name" type="text" id="attribute_name"
                            class="form-control @error('data.name') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">{{ __('translate.update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@script
    <script>
        document.addEventListener("livewire:initialized",function(){
            $('.form-select').select2();
            $('.select_labels').on("change", function () {
                $wire.set('data.labels',$(this).val())
            });
            $('.select_tags').on("change", function () {
                $wire.set('data.tags',$(this).val())
            });
            $('.select_categories').on("change", function () {
                $wire.set('data.categories',$(this).val())
            });
        });
    </script>
@endscript
