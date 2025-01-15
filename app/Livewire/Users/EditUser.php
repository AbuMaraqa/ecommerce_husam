<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $city;
    public $current_role_id;

    protected function rules () {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'phone' => 'required',
            'current_role_id' => 'required',
        ];
    }
    public function mount($id){
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->city = $user->city;
        $this->current_role_id = $user->roles->pluck('id')->first(); // Get role ID
    }

    public function update(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'current_role_id' => $this->current_role_id
        ];

        if($this->password){
            $data['password'] = bcrypt($this->password);
        }

        $user = User::findOrFail($this->user_id);
        $user->update($data);
        $user->syncRoles([(int)($this->current_role_id)]);

        $this->reset(['password']);

        session()->flash('success', 'تم تعديل المستخدم بنجاح');

        $this->redirect('/users');
    }

    public function render()
    {
        $roles = Role::get();
        return view('livewire.users.edit-user' , [
            'roles' => $roles
        ]);
    }
}
