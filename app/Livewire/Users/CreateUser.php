<?php

namespace App\Livewire\Users;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $city;
    public $current_role_id;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'phone' => 'required',
        'current_role_id' => 'required',
    ];

    public function mount(){

    }

    public function messages(){
        return [
            'name.required' => 'يرجى ادخال اسم المستخدم',
            'email.required' => 'يرجى ادخال البريد الالكتروني',
            'email.email' => 'يرجى ادخال بريد الكتروني صحيح',
            'email.unique' => 'البريد الالكتروني موجود بالفعل',
            'password.required' => 'يرجى ادخال كلمة المرور',
            'phone.required' => 'يرجى ادخال رقم الهاتف',
            'current_role_id.required' => 'يرجى اختيار دور المستخدم',
        ];
    }

    #[Computed]
    public function getRoles(){
        return Role::get();
    }

    public function createUser(){
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
            'status' => UserStatus::ACTIVE,
            'address' => $this->address,
            'city' => $this->city,
            'current_role_id' => $this->current_role_id
        ]);

        $user->syncRoles((int)$this->current_role_id);

        $this->reset();

        $this->dispatch('userCreated');

        session()->flash('success', 'تم اضافة المستخدم بنجاح');

        $this->redirect('/users');
    }

    public function render()
    {
        return view('livewire.users.create-user')->layout('components.layouts.app');
    }
}
