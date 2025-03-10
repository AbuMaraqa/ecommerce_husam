@section('title', 'انشاء ملصق جديد')
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
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">{{ __('translation.delivery_area price') }}</label>
                        <input wire:model="data.price" type="text" id="price"
                            class="form-control @error('data.price') is-invalid @enderror" />
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
