@section('title', 'انشاء منتج جديد')
@section('style')
@endsection
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="save">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">{{ __('translation.delivery_area name') }}</label>
                        <input wire:model="data.name" type="text" id="name"
                            class="form-control @error('data.name') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12 mb-6">
                    <label for="select2Primary" class="form-label">الملصقات</label>
                    <div wire:ignore class="select2primary">
                      <select id="select_categories" wire:model="data.categories" class="select2 select_categories form-select" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->getTranslation('name', app()->getLocale()) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                <div class="col-md-6 mb-6">
                    <label for="select2Primary" class="form-label">الملصقات</label>
                    <div wire:ignore class="select2primary">
                      <select id="select_labels" wire:model="data.labels" class="select2 select_labels form-select" multiple>
                        @foreach ($labels as $label)
                            <option value="{{ $label->id }}">{{ $label->getTranslation('text', app()->getLocale()) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-6">
                    <label for="select2Primary" class="form-label">العلامات </label>
                    <div wire:ignore class="select2primary">
                      <select id="select_tags" wire:model="data.tags" class="select2 select_tags form-select" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->getTranslation('text', app()->getLocale()) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">{{ __('translation.delivery_area price') }}</label>
                        <input wire:model="data.price" type="text" id="price"
                            class="form-control @error('data.price') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">الوصف</label>
                        <textarea name="description" id="" cols="30" rows="3" wire:model="data.description"
                            class="form-control @error('data.description') is-invalid @enderror"></textarea>
                        </textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="sku">Sku</label>
                        <input wire:model="data.sku" type="text" id="sku"
                            class="form-control @error('data.sku') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="wholesale_price">سعر الجملة</label>
                        <input wire:model="data.wholesale_price" type="text" id="wholesale_price"
                            class="form-control @error('data.wholesale_price') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="sale_price">سعر الجملة</label>
                        <input wire:model="data.sale_price" type="text" id="sale_price"
                            class="form-control @error('data.sale_price') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="quantity">الكمية</label>
                        <input wire:model="data.quantity" type="text" id="quantity"
                            class="form-control @error('data.quantity') is-invalid @enderror" />
                    </div>
                </div>
                {{-- <div class="col-md-12 mb-3">
                    @foreach ($attributes as $attribute)
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="الاسم">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <div class="col-md-12">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">الاختلافات</h3>

                        <button type="button" wire:click="addVariation" class="btn btn-primary mt-2">
                            إضافة اختلاف
                        </button>

                        @foreach($variations as $index => $variation)
                            <div class="border p-4 mt-4" wire:key="variation-{{ $index }}">
                                <div class="flex justify-between">
                                    <h4 class="font-medium">الاختلاف #{{ $index + 1 }}</h4>
                                    <button type="button" wire:click="removeVariation({{ $index }})" class="text-red-500">
                                        حذف
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                    <div>
                                        <label>اسم الاختلاف</label>
                                        <input type="text" wire:model="variations.{{ $index }}.variation_name" class="form-control">
                                        @error("variations.{$index}.variation_name") <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label>السمات</label>
                                        <select multiple wire:model="variations.{{ $index }}.attributes" class="select2 form-select">
                                            @foreach($availableAttributes as $attribute)
                                                <optgroup label="{{ $attribute->attribute_name }}">
                                                    @foreach($attribute->values as $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->value }}
                                                            @if($value->color_code)
                                                                ({{ $value->color_code }})
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        @error("variations.{$index}.attributes") <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label>السعر الإضافي</label>
                                        <input type="number" wire:model="variations.{{ $index }}.price" class="form-control">
                                    </div>

                                    <div>
                                        <label>الكمية المتاحة</label>
                                        <input type="number" wire:model="variations.{{ $index }}.stock_quantity" class="form-control">
                                    </div>

                                    <div>
                                        <label>SKU</label>
                                        <input type="text" wire:model="variations.{{ $index }}.sku" class="form-control">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="">الصورة</label>
                        <input type="file" wire:model="data.image" class="form-control">
                    </div>
                </div>
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
