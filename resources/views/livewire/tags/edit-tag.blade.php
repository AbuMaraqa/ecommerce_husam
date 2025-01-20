@section('title', 'تعديل علامة')
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="update">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">{{ __('translation.tag name') }}</label>
                        <input wire:model="data.text" type="text" id="name"
                            class="form-control @error('data.text') is-invalid @enderror" />
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
