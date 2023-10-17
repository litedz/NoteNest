<?php

use Livewire\Livewire;
use notenest\notenest\app\livewire\Note;

it('can render view', function () {
    Livewire::test(Note::class)->assertHasNoErrors();
});
