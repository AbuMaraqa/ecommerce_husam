@section('title', 'انشاء قسم جديد')
<div>
    <x-validation-message />
    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="createCategory">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label class="form-label" for="name">اسم القسم</label>
                        <input type="text" wire:model="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="select2Icons" class="form-label">مرتبط ب</label>
                    <select id="select2Icons" wire:model='parent_id' class="select2-icons form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-icon="{{ $category->getImage('category_icon') }}" selected>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="name" class="form-label">الوصف</label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <label for="" class="form-label">الرمز</label>

                    <div class="input-group">
                        <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon03">رفع
                            الرمز</button>
                        <input type="file" class="form-control" wire:model="icon" id="inputGroupFile03"
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <label for="" class="form-label">الصورة</label>

                    <div class="input-group">
                        <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon03">رفع
                            الصورة</button>
                        <input type="file" class="form-control" wire:model="image" id="inputGroupFile03"
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary"><span class="ti ti-save"></span> <span>حفظ</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
