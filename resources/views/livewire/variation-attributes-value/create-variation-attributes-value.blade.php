@section('title', 'اضافة قيمة لصفة')
@section('style')
@endsection
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="save">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="value">اسم القيمة</label>
                        <input wire:model="data.value" type="text" id="value"
                            class="form-control @error('data.value') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="attribute_name">اسم القيمة</label>
                        <select name="attribute_id" id="attribute_id" wire:change='getVariationType()' wire:model="data.attribute_id" class="form-control @error('data.attribute_id') is-invalid @enderror">
                            <option value="">اختر صفة</option>
                            @foreach ($variationAttributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($attribute_type == \App\Enums\VariationType::COLOR)
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="color">اللون</label>
                            <input wire:model="data.color_code" type="color" id="color"
                                class="form-control @error('data.color') is-invalid @enderror" />
                        </div>
                    </div>
                    @elseif ($attribute_type == \App\Enums\VariationType::IMAGE)
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input wire:model="data.image" type="file" id="image"
                                class="form-control @error('data.image') is-invalid @enderror" />
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">{{ __('translate.save') }}</button>
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
