<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $users;

    public $search = '';

    protected $listeners = ['userCreated' => 'loadUsers'];

    #[Computed]
    public function loadUsers()
    {
        if ($this->search) {
            return User::with('roles')->where('name', 'like', '%' . $this->search . '%')->paginate(5);
        }
        return User::with('roles')->paginate(1);
    }


    public function mount()
    {
        $this->loadUsers();
    }

    public function render()
    {
        return view('livewire.users.list-users')->layout('components.layouts.app');
    }
}
