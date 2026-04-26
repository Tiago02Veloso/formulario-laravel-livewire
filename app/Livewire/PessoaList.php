<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pessoa;

class PessoaList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'atualizarLista' => '$refresh'
    ];

    protected $queryString = [
        'page'
    ];

    public function render()
    {
        $pessoas = Pessoa::orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.pessoa-list', [
            'pessoas' => $pessoas
        ]);
    }

    public function excluir($id)
    {
        $pessoa = Pessoa::findOrFail($id);

        $pessoa->delete();

        session()->flash('message', 'Registro excluído com sucesso!');

        $this->dispatch('atualizarLista');

        $this->resetPage();
    }
}