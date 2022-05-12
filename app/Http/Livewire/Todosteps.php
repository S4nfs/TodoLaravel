<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Todosteps extends Component
{
    public $steps = [];

    public function increment (){
        $this->steps[] = count($this->steps);
    }
    public function decrement($index){
        // dd($index);
        unset($this->steps[$index]);
    }
    public function render()
    {
        return view('livewire.todosteps');
    }
}
