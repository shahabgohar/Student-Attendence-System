<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
        return view('livewire.side-bar');
    }
    public function goto($routeName){
       return $this->redirect($routeName);
    }

}
