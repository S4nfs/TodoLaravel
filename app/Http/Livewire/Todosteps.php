<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Todosteps extends Component
{
    public $steps = [];

    public function increment (){
        $this->steps[] = count($this->steps)+1;
    }
    public function decrement($index){
        dd($index);
        $this->steps[] = count($this->steps)-1;
    }
    public function render()
    {
        return view('livewire.todosteps');
    }
}
