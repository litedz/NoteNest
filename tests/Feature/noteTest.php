<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use notenest\notenest\Models\Draft;
use notenest\notenest\Models\note;
use notenest\notenest\traits\status;

use function Pest\Livewire\livewire;

// uses(RefreshDatabase::class);

test('can render view', function () {
    Livewire('Note')->assertStatus(200);
});
test('Get Available functions', function () {
    $funName = 'test function name';
    note::factory()->create([
        'function_name' => $funName,
        'status' => status::$IN_PROGRESS,
    ]);
    livewire('Note')->assertSee($funName);
});

test('required name', function () {
    // note::unguard();
    livewire('Note')
        ->set('descriptionFunc', '')
        ->set('functionName', '')
        ->call('AddFunction', 1)
        ->assertHasErrors(['functionName', 'descriptionFunc']);
});
test('required description function', function () {
    // note::unguard();
    livewire('Note')
        ->set('descriptionFunc', '')
        ->call('AddFunction', 1)
        ->assertHasErrors('descriptionFunc');
});
test('can add Function', function () {
    Livewire('Note')
        ->set('functionName', 'Add admin panel')
        ->set('descriptionFunc', 'this is descption')
        ->call('AddFunction', 1)
        ->assertHasNoErrors();
});
test('can add function in progress', function () {

    $func = note::factory()->create([
        'status' => status::$AWAIT,
    ]);
    $fun = note::where('status', status::$AWAIT)->get()->pluck('id')->random();
    Livewire('Note')
        ->call('FunInProgress', $fun)
        ->assertHasNoErrors();
});
test('can Finish function', function () {
    $noteFact = note::factory()->create([
        'status' => status::$AWAIT,
    ]);
    $FuncId = note::where('status', status::$AWAIT)->get()->pluck('id')->random();
    Livewire('Note')
        ->call('FunEnded', $FuncId)
        ->assertHasNoErrors();
});
test('can Delete function', function () {
    $noteFact = note::factory()->create([
        'status' => status::$AWAIT,
    ]);
    $FuncId = note::where('status', status::$AWAIT)->get()->pluck('id')->random();
    Livewire('Note')
        ->call('DeleteFunc', $FuncId)
        ->assertHasNoErrors();
});
test('can see How Many functions has', function () {
    $func = note::factory()->count(3)->create([
        'status' => status::$AWAIT,
        'ended_at' => Carbon::now(),
        'created_at' => Carbon::now()->subDays(5),
    ]);
    $CountFuncs = note::where('status', status::$AWAIT)->get()->count();
    Livewire('Note')
        ->assertSee($CountFuncs)
        ->assertHasNoErrors();
});
test('can see How Many functions IN PROGRESS has', function () {
    $func = note::factory()->count(3)->create([
        'status' => status::$IN_PROGRESS,
        'ended_at' => Carbon::now(),
        'created_at' => Carbon::now()->subDays(5),
    ]);
    $CountFuncs = note::where('status', status::$IN_PROGRESS)->get()->count();
    Livewire('Note')
        ->assertSee($CountFuncs)
        ->assertHasNoErrors();
});
test('can see How Many his Finished', function () {
    $func = note::factory()->count(3)->create([
        'status' => status::$ENDED,
        'ended_at' => Carbon::now(),
        'created_at' => Carbon::now()->subDays(5),
    ]);
    $CountFuncs = note::where('status', status::$ENDED)->get()->count();
    Livewire('Note')
        ->assertSee($CountFuncs)
        ->assertHasNoErrors();
});
test('can see finish function date', function () {

    $func = note::factory()->create([
        'status' => status::$ENDED,
        'ended_at' => Carbon::now(),
        'created_at' => Carbon::now()->subDays(5),
    ]);
    $fun_creation = note::where('status', status::$ENDED)->get()->pluck('created_at')->random();
    Livewire('Note')
        ->assertSeeText(Carbon::create($fun_creation)->format('Y M d'))
        ->assertHasNoErrors();
});

test('required draft name ', function () {
    $noteFact = note::factory()->create([
        'status' => status::$AWAIT,
    ]);
    $FuncId = note::where('status', status::$AWAIT)->get()->pluck('id')->random();

    Livewire('Note')
        ->set('DraftName', '')
        ->call('AddDraft')
        ->assertHasErrors('DraftName');
});
test('can add Draft ', function () {
    Livewire('Note')
        ->set('DraftName', 'test draft')
        ->set('DraftDescription', 'test descpiton loremz lmzmz')
        ->call('AddDraft')
        ->assertHasNoErrors();
});
test('can Delete draft ', function () {
    Draft::factory()->create();
    $draftId = Draft::get()->pluck('id')->random();
    Livewire('Note')
        ->call('DeleteDraft', $draftId)
        ->assertHasNoErrors();
});
test('can See All draft ', function () {
    Draft::factory()->count(3)->create();
    $draft = Draft::get()->pluck('name')->random();

    Livewire('Note')
        ->assertSeeText($draft)
        ->assertHasNoErrors();
});
