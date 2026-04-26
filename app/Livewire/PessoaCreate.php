<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pessoa;

class PessoaCreate extends Component
{
    public $nome;
    public $email;
    public $telefone;
    public $cep;
    public $cpf;

    protected function rules()
    {
        return [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'telefone' => 'required',
            'cep' => 'required',
            'cpf' => 'required|digits:11|unique:pessoas,cpf',
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório.',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
        'email.required' => 'O e-mail é obrigatório.',
        'email.email' => 'Informe um e-mail válido.',
        'telefone.required' => 'O telefone é obrigatório.',
        'cep.required' => 'O CEP é obrigatório.',
        'cpf.required' => 'O CPF é obrigatório.',
        'cpf.digits' => 'O CPF deve ter 11 números.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
    ];

    public function salvar()
    {
       
        $this->cpf = preg_replace('/\D/', '', $this->cpf);

        $dados = $this->validate();

        Pessoa::create($dados);

        $this->dispatch('atualizarLista');

        session()->flash('message', 'Cadastro realizado com sucesso!');

        $this->reset([
            'nome',
            'email',
            'telefone',
            'cep',
            'cpf'
        ]);
    }

    public function render()
    {
        return view('livewire.pessoa-create');
    }
}