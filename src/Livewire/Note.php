<?php

namespace notenest\notenest\Livewire;

use Livewire\Component;
use notenest\notenest\Models\Draft;
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
    public $DraftDescription;

    public $DraftName;

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
    public function DeleteFunc($func_id)
    {
        $UpdateStatus = $this->FuncsInProgress = ModelsNote::where('id', $func_id)->delete();
        $this->GetFuncs();
    }
    public function AddDraft()
    {
        $validated = $this->validate([
            'DraftDescription' => 'max:100',
            'DraftName' => 'required'
        ]);

        $UpdateStatus = $this->FuncsInProgress = Draft::create([
            'name' =>$this->DraftName,
            'description' =>$this->DraftDescription,
        ]);
        $this->GetFuncs();
    }
    public function DeleteDraft($func_id)
    {
        $UpdateStatus = $this->FuncsInProgress = Draft::where('id', $func_id)->delete();
        $this->GetFuncs();
    }

    public function render()
    {
        return view('notenest::notes');
    }
}
