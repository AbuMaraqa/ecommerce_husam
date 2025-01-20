@section('title', 'انشاء مدينة جديدة')
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="save">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">اسم المدينة</label>
                        <input wire:model="data.name" type="text" wire:model="name" id="name"
                            class="form-control @error('data.name') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">اضافة</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
