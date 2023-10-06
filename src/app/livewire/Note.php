<?php

namespace notenest\notenest\app\livewire;

use Livewire\Component;

class Note extends Component
{
    public $ss ='Hello from compssso';

    public function mount()  {
      
    }
    public function Hello()
    {
        $this->ss = 'mohamed';
    }

    public function render()
    {
        return view('notenest::notes')->layout('notenest::app');
    }
}
