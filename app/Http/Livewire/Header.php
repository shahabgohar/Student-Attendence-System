<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $name = "";
    public $width = "70%";
    public $height = "10%";
    public $bgcolor = "white";
    public function render()
    {
        return view('livewire.header');
    }
}
