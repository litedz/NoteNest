<?php

<<<<<<< HEAD
namespace App\notenest\notenest\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use App\notenest\notenest\notenestServiceProvider;
=======
namespace notenest\notenest\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use notenest\notenest\notenestServiceProvider;
>>>>>>> Fixnest

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
<<<<<<< HEAD
            fn (string $modelName) => 'App\notenest\\notenest\\Database\\Factories\\'.class_basename($modelName).'Factory'
=======
            fn (string $modelName) => 'notenest\\notenest\\Database\\Factories\\'.class_basename($modelName).'Factory'
>>>>>>> Fixnest
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            notenestServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_notenest_table.php.stub';
        $migration->up();
        */
    }
}
