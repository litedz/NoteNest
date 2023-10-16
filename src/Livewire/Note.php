<?php

namespace notenest\notenest\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use notenest\notenest\Models\note as ModelsNote;
use notenest\notenest\traits\status as TraitsStatus;
use traits\STATUS;

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
    public function AddFunction($status_id)
    {
        $this->validate();

        ModelsNote::create([
            'function_name' => $this->functionName,
            'description' => $this->description,
            'status_id' => $status_id,
        ]);
        return response()->json('success');
    }

    #[On('start-progress-function')]
    public function FunInProgress()
    {
        // dd('start-progress-function');
    }
    #[On('function-ended')]
    public function FunEnded()
    {
        // dd('time started');
    }

    public function render()
    {
        return view('notenest::notes');
    }
}
