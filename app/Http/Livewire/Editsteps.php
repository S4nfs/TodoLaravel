<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Step;

class Editsteps extends Component
{

    public $steps = [];

    public function mount($post)
    {
        $this->steps = $post->toArray();   //mount is a constructor in livewire
    }
    public function increment()
    {
        $this->steps[] = count($this->steps);
    }
    public function decrement($index)
    {
        $remove = $this->steps[$index];   //remove steps and unset the loop index by stepsId
        Step::find($remove['id'])->delete();
        unset($this->steps[$index]);    
    }

    public function render()
    {
        return view('livewire.editsteps');
    }
}
