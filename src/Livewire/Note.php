<?php

namespace notenest\notenest\Livewire;

use Livewire\Component;
use notenest\notenest\Models\note as ModelsNote;
use notenest\notenest\Models\project;

class Note extends Component
{
    protected static $layout = ['layout' => 'notenest::layouts.note-app', 'section' => 'content'];
    protected static string $view = 'notenest::notes';
    protected $rules =[
        'name' => 'required',
        'description' => 'required',
    ];

    public $description;
    public $functionName;



    public function mount()
    {

        

    }
    public function Hello()
    {
        dd('Hello');
    }

    public function AddFunction()
    {
        $this->validate();
     
        ModelsNote::create([
            'name' => 'test',
            'description' => 'description lorem'
        ]);
        
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
