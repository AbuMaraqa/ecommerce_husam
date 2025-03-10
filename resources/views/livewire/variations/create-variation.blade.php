@section('title', 'اضافة اضافة')
@section('style')
@endsection
<div>
    <x-validation-message />

    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="update">
                <div class="col-md-12">
                    Mohamad
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
