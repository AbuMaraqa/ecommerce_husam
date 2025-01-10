<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $name;
    public $permissions = [];
    public $allPermissions;

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'permissions' => 'required|array|min:1',
    ];

    protected function messages()
    {
        return [
            'name.required' => 'يرجى ادخال اسم الدور',
            'name.unique' => 'اسم الدور موجود بالفعل',
            'permissions.required' => 'يرجى اختيار صلاحية',
            'permissions.min' => 'يرجى اختيار صلاحية واحدة على الأقل',
        ];
    }

    public function mount()
    {
        $this->allPermissions = Permission::get();
    }

    public function selectAll()
    {
        $this->permissions = $this->allPermissions->pluck('name')->toArray();
    }

    public function toggleSelectAll($isChecked){
        $this->permissions = $isChecked ? $this->allPermissions->pluck('name')->toArray() : [];
    }

    public function deselectAll()
    {
        $this->permissions = [];
    }

    public function createRole()
    {
        $this->validate();

        // إنشاء الدور
        $role = Role::create(['name' => $this->name]);

        $role->syncPermissions($this->permissions);

        $this->reset(['name', 'permissions']);

        // إشعار النجاح
        session()->flash('success', 'تم إنشاء الدور بنجاح');
    }

    public function render()
    {
        return view('livewire.roles.role-create')->layout('components.layouts.app');
    }
}
