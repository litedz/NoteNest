<?php

namespace notenest\notenest\Livewire;

use Livewire\Component;
use notenest\notenest\Models\note as ModelsNote;
use notenest\notenest\traits\status;

class Note extends Component
{
    use status;

    protected static $layout = ['layout' => 'notenest::layouts.note-app', 'section' => 'content'];

    protected static string $view = 'notenest::notes';

    public $AvailableFuncs;

    public $FuncsInProgress;

    public $FuncsEnded;

    protected $rules = [
        'functionName' => 'required',
        'description' => 'required',
    ];

    public $description;

    public $functionName;

    public function mount()
    {
        $this->GetFuncs();
    }

    public function GetFuncs()
    {
        $this->AvailableFuncs = ModelsNote::where('status', status::$AWAIT)->get();
        $this->FuncsInProgress = ModelsNote::where('status', status::$IN_PROGRESS)->get();
        $this->FuncsEnded = ModelsNote::where('status', status::$ENDED)->get();
    }

    public function AddFunction()
    {
        $this->validate();

        ModelsNote::create([
            'function_name' => $this->functionName,
            'description' => $this->description,
        ]);
    }

    public function FunInProgress($func_id)
    {
        $UpdateStatus = $this->FuncsInProgress = ModelsNote::where('id', $func_id)->update([
            'status' => status::$IN_PROGRESS,
        ]);
        $this->GetFuncs();
    }

    public function FunEnded($func_id)
    {
        $UpdateStatus = $this->FuncsInProgress = ModelsNote::where('id', $func_id)->update([
            'status' => status::$ENDED,
            'ended_at' => now(),
        ]);
        $this->GetFuncs();
    }

    public function render()
    {
        return view('notenest::notes');
    }
}
