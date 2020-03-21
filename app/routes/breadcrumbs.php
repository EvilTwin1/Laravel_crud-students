<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

//$student = \App\Student::all();

// Home
Breadcrumbs::for('list', function ($trail) {
    $trail->push('Home', route('list'));
});

// Home > Create
Breadcrumbs::for('create', function ($trail) {
    $trail->parent('list');
    $trail->push('Create Student Info', route('create'));
});

// Home > Show
Breadcrumbs::for('show', function ($trail, $student) {
    $trail->parent('list');
    $trail->push("Show Student ID $student", route('show', $student));
});

// Home > Edit
Breadcrumbs::for('edit', function ($trail, $student) {
    $trail->parent('list');
    $trail->push("Edit Student ID $student", route('edit', $student));
});

Breadcrumbs::for('search', function ($trail) {
    $trail->parent('list');
    $trail->push("Search", route('search'));
});
