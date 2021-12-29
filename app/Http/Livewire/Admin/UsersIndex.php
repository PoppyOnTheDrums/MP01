<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UsersIndex extends Component
{
    use WithPagination;
    public $buscar;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {


        $user = User::paginate();
        return view('livewire.admin.users-index', compact('user'));
    }
}