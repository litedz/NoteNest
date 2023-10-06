<?php

use Livewire\Component;
use function Pest\Livewire\livewire;
use function Pest\Faker\fake;
use Livewire\Livewire;
use notenest\notenest\app\livewire\Note;

test('can render view', function () {
    Livewire::test(Note::class)->assertStatus(200);
});
