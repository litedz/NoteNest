<?php

namespace notenest\notenest\app\livewire;

use Livewire\Component;

class Note extends Component
{
    public $ss ='Hello from Note';

    public function mount()  {
      
    }
    public function Hello()
    {
        dd('xx');
     
        $this->ss = 'mohamed';
    }

    public function render()
    {
        return view('notenest::notes');
    }
}
