<?php

namespace notenest\notenest\Livewire;

use Livewire\Attributes\On;
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
        $this->AvailableFuncs = ModelsNote::where('status_id', status::$AWAIT)->get();
        $this->FuncsInProgress = ModelsNote::where('status_id', status::$IN_PROGRESS)->get();
        $this->FuncsEnded = ModelsNote::where('status_id', status::$ENDED)->get();
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

        dd($this);
        // dd('');
        // die();
        // $UpdateStatus = $this->FuncsInProgress = ModelsNote::where('id',$func_id)->update([
        //     'status_id' => status::$IN_PROGRESS
        // ]);
        // $this->GetFuncs();
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
