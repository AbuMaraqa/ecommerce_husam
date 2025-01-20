@section('title', 'تعديل قسم')
<div>
    <x-validation-message />
    <div class="card">
        <div class="card-body">
            <form class="row" wire:submit.prevent="updateCategory">
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
                            <option @if ($category->id == $parent_id)
                                selected
                            @endif value="{{ $category->id }}" data-icon="{{ $category->getImage('category_icon') }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="name" class="form-label">الوصف</label>
                        <textarea name="description" wire:model="description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <label for="" class="form-label">الرمز</label>
                    <br>
                    <img src="{{ $this->getCategoryImage('category_image') }}" style="width: 80px" alt="">
                    <div class="input-group">
                        <input type="file" class="form-control" wire:model="icon" id="inputGroupFile03"
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <label for="" class="form-label">الصورة</label>
                    <br>
                    <img src="{{ $this->getCategoryImage('category_icon') }}" style="width: 80px" alt="">
                    <div class="input-group">
                        <input type="file" class="form-control" wire:model="image" id="inputGroupFile03"
                            aria-describedby=
                            \"inputGroupFileAddon03" aria-label="Upload">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary"><span class="ti ti-save"></span> <span>حفظ</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
