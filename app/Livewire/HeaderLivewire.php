<?php

namespace App\Livewire;

use Livewire\Component;

class HeaderLivewire extends Component
{
    public function switchComponent($component)
    {
        $this->emit('showComponent', $component);
    }

    public function render()
    {
        return view('livewire.header-livewire');
    }
}
