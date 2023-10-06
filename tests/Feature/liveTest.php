<?php

namespace notenest\notenest\Tests\Feature;

use Livewire\Livewire;
use notenest\notenest\app\livewire\Note;
use notenest\notenest\Tests\TestCase;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

use function Pest\Livewire\livewire;

class liveTest extends TestCase
{
    public function test_render_success()
    {
        Livewire::test(Note::class)->assertStatus(200);
    }
}
