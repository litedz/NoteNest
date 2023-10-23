<?php

namespace notenest\notenest\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use notenest\notenest\Models\Draft;
use notenest\notenest\Models\note as ModelsNote;
use notenest\notenest\Rules\priorityRule;
use notenest\notenest\traits\status;

class Note extends Component
{
    use status;

    public Collection $AvailableFuncs;

    public Collection $FuncsInProgress;

    public Collection $FuncsEnded;

    // protected $rules = [
    //     'functionName' => 'required',
    //     'descriptionFunc' => 'required',
    // ];

    public string $descriptionFunc;

    public string $functionName;

    public string $DraftDescription;

    public string $funcPriority;

    public string $DraftName;

    public Collection $Drafts;

    public function rules(): array
    {
        return [
            'functionName' => 'required',
            'descriptionFunc' => 'required',
        ];
    }

    public function mount(): void
    {
        $this->GetFuncs();
    }

    public function booted(): void
    {
        $this->GetFuncs();
    }

    public function GetFuncs(): void
    {
        $this->AvailableFuncs = ModelsNote::where('status', status::$AWAIT)->orderBy('created_at', 'desc')->get();
        $this->FuncsInProgress = ModelsNote::where('status', status::$IN_PROGRESS)->orderBy('created_at', 'desc')->get();
        $this->FuncsEnded = ModelsNote::where('status', status::$ENDED)->orderBy('created_at', 'desc')->get();
        $this->Drafts = collect(Draft::get())->sortByDesc('created_at');
    }

    public function AddFunction(): void
    {
        $validated = $this->validate();

        $validPriority = $this->validate([
            'funcPriority' => new priorityRule,
        ]);
        $createFun = ModelsNote::create([
            'function_name' => $this->functionName,
            'description' => $this->descriptionFunc,
            'priority' => $this->funcPriority,
            'status' => status::$AWAIT,
        ]);
        $createFun ? $this->dispatch('created-func') && $this->dispatch('SweatAlert', title: 'function created', icon: 'success') && $this->GetFuncs() : '';
    }

    public function FunInProgress(int $func_id): void
    {
        $UpdateStatus = ModelsNote::where('id', $func_id)->update([
            'status' => status::$IN_PROGRESS,
        ]);
        $UpdateStatus ? $this->dispatch('SweatAlert', title: 'Status Updated', icon: 'success') && $this->GetFuncs() : '';
    }

    public function FunEnded(int $func_id): void
    {
        $UpdateStatus = ModelsNote::where('id', $func_id)->update([
            'status' => status::$ENDED,
            'ended_at' => now(),
        ]);
        $this->GetFuncs();
    }

    public function DeleteFunc(int $func_id): void
    {
        $DeleteFun = ModelsNote::where('id', $func_id)->delete();
        $DeleteFun ? $this->dispatch('SweatAlert', title: 'function Deleted', icon: 'warning') && $this->GetFuncs() : '';
    }

    public function AddDraft(): void
    {
        $validated = $this->validate([
            'DraftDescription' => 'max:100',
            'DraftName' => 'required',
        ]);

        $createDraft = Draft::create([
            'name' => $this->DraftName,
            'descriptionFunc' => $this->DraftDescription,
        ]);

        $createDraft ? $this->reset(['DraftName', 'DraftDescription']) && $this->GetFuncs() : '';

    }

    public function DeleteDraft(int $func_id): void
    {
        $DeleteDraft = Draft::where('id', $func_id)->delete();
        $this->reset(['DraftName', 'DraftDescription']);
        $this->GetFuncs();
    }

    public function render(): View
    {
        return view('notenest::notes');
    }
}
