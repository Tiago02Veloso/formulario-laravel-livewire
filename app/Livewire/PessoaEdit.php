<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pessoa;
use Illuminate\Validation\Rule;

class PessoaEdit extends Component
{
    public $pessoaId;

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
            'cpf' => [
                'required',
                'digits:11',
                Rule::unique('pessoas', 'cpf')->ignore($this->pessoaId),
            ],
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório.',
        'email.required' => 'O e-mail é obrigatório.',
        'email.email' => 'Informe um e-mail válido.',
        'telefone.required' => 'O telefone é obrigatório.',
        'cep.required' => 'O CEP é obrigatório.',
        'cpf.required' => 'O CPF é obrigatório.',
        'cpf.digits' => 'O CPF deve ter 11 números.',
    ];

    public function mount($id)
    {
        $pessoa = Pessoa::findOrFail($id);

        $this->pessoaId = $pessoa->id;
        $this->nome = $pessoa->nome;
        $this->email = $pessoa->email;
        $this->telefone = $pessoa->telefone;
        $this->cep = $pessoa->cep;
        $this->cpf = $pessoa->cpf;
    }

    public function atualizar()
    {
        $this->cpf = preg_replace('/\D/', '', $this->cpf);

        $dados = $this->validate();

        Pessoa::findOrFail($this->pessoaId)
            ->update($dados);

        session()->flash('message', 'Registro atualizado com sucesso!');

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.pessoa-edit');
    }
}