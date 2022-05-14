<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Editsteps extends Component
{

    public $steps = [];

    public function mount($steps){
        $this->steps = $steps->toArray();
    }
    public function increment (){
        $this->steps[] = count($this->steps);
    }
    public function decrement($index){
        // dd($index);
        unset($this->steps[$index]);
    }

    public function render()
    {
        return view('livewire.editsteps');
    }
}
