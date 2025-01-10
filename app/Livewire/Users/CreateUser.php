<?php

namespace App\Livewire\Users;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $city;
    public $roles = [];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'phone' => 'required',
        'roles' => 'required',
    ];

    public function mount(){
        $this->roles = Role::get();
    }

    public function messages(){
        return [
            'name.required' => 'يرجى ادخال اسم المستخدم',
            'email.required' => 'يرجى ادخال البريد الالكتروني',
            'email.email' => 'يرجى ادخال بريد الكتروني صحيح',
            'email.unique' => 'البريد الالكتروني موجود بالفعل',
            'password.required' => 'يرجى ادخال كلمة المرور',
            'phone.required' => 'يرجى ادخال رقم الهاتف',
            'roles.required' => 'يرجى اختيار دور المستخدم',
        ];
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
            'city' => $this->city
        ]);

        $user->syncRoles($this->roles);

        $this->reset();

        session()->flash('success', 'تم اضافة المستخدم بنجاح');
    }

    public function render()
    {
        return view('livewire.users.create-user')->layout('components.layouts.app');
    }
}
