<?php

use notenest\notenest\Models\note;

use function Pest\Livewire\livewire;

test('can render view', function () {
    Livewire('Note')->assertStatus(200);
});
test('Get all functions', function () {
    note::factory()->count(3)->create();
    livewire('Note')->assertSee('first function');
});

test('required name and description', function () {
    // note::unguard();
    livewire('Note')
        ->call('AddFunction')
        ->set('description', '')
        ->set('functionName', '')
        ->assertHasErrors(['functionName', 'description']);
});
test('can add Function', function () {
    Livewire('Note')
        ->set('description', 'this is descption')
        ->set('functionName', 'Add admin panel')
        ->call('AddFunction')
        ->assertHasNoErrors();
});
test('start timer Function', function () {
   Livewire('Note')
   ->dispatch('start-time');
});
