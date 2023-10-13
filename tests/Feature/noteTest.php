<?php

use notenest\notenest\Models\note;

use function Pest\Livewire\livewire;
test('can render view', function () {
    Livewire('Note')->assertHasNoErrors();
});
test('can add  function', function () {
    livewire('Note')->call('AddFunction')->assertHasNoErrors();
});
test('required name and description', function () {
    // note::unguard();
    livewire('Note')->call('AddFunction')
    ->set('description','')
    ->set('name','')
    ->assertHasNoErrors();
});
