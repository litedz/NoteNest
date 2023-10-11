<?php

namespace notenest\notenest\Livewire;

use Livewire\Component; 

class Note extends Component
{
    protected static $layout = ['layout'=>'notenest::layouts.note-app','section' => 'content'];
    protected static string $view = 'notenest::notes';
    public $ss = 'Hello from Note';

    public function mount()
    {
     
        
    }
    public function Hello()
    {
        dd('Hello');
      
    }

    // protected static function layout()
    // {
    //     return ['notenest::note-app'];
    // }

    public function render()
    {
        return view('notenest::notes');
    }
}
