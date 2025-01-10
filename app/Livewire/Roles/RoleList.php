<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    public $roles;
    public function mount(){
        $this->roles = Role::get();
    }

    public function render()
    {
        return view('livewire.roles.role-list')->layout('components.layouts.app');
    }
}
