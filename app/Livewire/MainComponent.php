<?php
namespace App\Livewire;

use Livewire\Component;

class MainComponent extends Component
{
    public $currentComponent = 'welcome';

    protected $listeners = ['showComponent'];

    public function showComponent($component)
    {
        $this->currentComponent = $component;
    }

    public function render()
    {
        return view('livewire.main-component', [
            'currentComponent' => $this->currentComponent,
        ])->layout('layouts.main');
    }
}