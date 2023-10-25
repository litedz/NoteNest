
# NoteNest (Note taking) 

is a powerful PHP and Livewire package, seamlessly integrated with Alpine.js, designed to simplify and enhance your note-taking capabilities Throughout your work on the project

## Installation

To run MyCal on your local machine, follow these steps:

1. Install Package via composer:

   ```bash
   composer require notenest/notenest

2. Publish Migrations:

   ```bash
   vendor:publish --tag=notenest-migrations

3. Publish js files :

   ```bash
   vendor:publish --tag=notenest-js

4. Install sortable js  :

   ```bash
   npm install sortablejs --save
5. In Your vite.config.js add :

   ```bash
   resources/js/sortable.js
6. In root blade add :

   ```bash
    @vite(['resources/js/sortable.js'])
   
6. In root blade add :

   ```bash
    @livewire('Note')

## requirement

- PHP 8.x
- Laravel
- Livewire
- Alpine.js
- Tailwind css