<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PessoaCreate;
use App\Livewire\PessoaList;
use App\Livewire\PessoaEdit;

Route::get('/', PessoaList::class)
    ->name('pessoas.list');

Route::get('/cadastro', PessoaCreate::class)
    ->name('pessoas.create');

Route::get('/editar/{id}', PessoaEdit::class)
    ->name('pessoas.edit');