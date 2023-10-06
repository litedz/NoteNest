<?php

use notenest\notenest\app\livewire\Note;

use function Pest\Livewire\livewire;

test('can render view',function ()  {
    livewire(Note::class)->assertHasNoErrors();
 });