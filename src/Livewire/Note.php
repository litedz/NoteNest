<?php

namespace notenest\notenest\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use notenest\notenest\Models\note as ModelsNote;
use notenest\notenest\Models\project;

class Note extends Component
{
    protected static $layout = ['layout' => 'notenest::layouts.note-app', 'section' => 'content'];
    protected static string $view = 'notenest::notes';
    public $AvailableFuncs;
    protected $rules = [
        'functionName' => 'required',
        'description' => 'required',
    ];

    public $description;
    public $functionName;



    public function mount()
    {
        $this->AvailableFuncs = ModelsNote::get();
    }
    public function Hello()
    {
        dd('Hello');
    }

    public function AddFunction()
    {
        $this->validate();

        ModelsNote::create([
            'name' => $this->functionName,
            'description' => $this->description
        ]);
        return response()->json('success');
    }

    #[On('start-time')]
    public function startTimeProgression()
    {
        dd('time started');
    }
    public function render()
    {
        return view('notenest::notes');
    }
}
