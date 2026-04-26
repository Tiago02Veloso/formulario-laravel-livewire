<div
    style="
        max-width: 900px;
        margin: auto;
        padding: 20px;
        width: 100%;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    "
>

    <h2 style="text-align: center; margin-bottom: 20px;">
        Lista de Pessoas
    </h2>

    {{-- Botão Novo Cadastro --}}
    <div style="margin-bottom: 15px; text-align: right;">
        <a href="{{ route('pessoas.create') }}"
           style="
                background: #2563eb;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 6px;
                font-weight: bold;
           ">
            + Novo Cadastro
        </a>
    </div>

    {{-- Mensagem --}}
    @if (session()->has('message'))
        <div style="
            color: #065f46;
            background: #d1fae5;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
        ">
            {{ session('message') }}
        </div>
    @endif

    <div style="overflow-x: auto;">

        <table style="width: 100%; border-collapse: collapse;">

            <thead>
                <tr style="background: #f3f4f6;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Nome</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Telefone</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">CEP</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">CPF</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Ações</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($pessoas as $pessoa)

                    <tr wire:key="pessoa-{{ $pessoa->id }}">

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $pessoa->nome }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $pessoa->email }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $pessoa->telefone }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $pessoa->cep }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $pessoa->cpf }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">

                            {{-- Editar --}}
                            <a href="{{ route('pessoas.edit', $pessoa->id) }}"
                               style="
                                    background: #f59e0b;
                                    color: white;
                                    padding: 6px 10px;
                                    text-decoration: none;
                                    border-radius: 4px;
                                    margin-right: 5px;
                               ">
                                Editar
                            </a>

                            {{-- Excluir Livewire --}}
                            <button
                                wire:click="excluir({{ $pessoa->id }})"
                                onclick="return confirm('Tem certeza que deseja excluir?')"
                                style="
                                    background: #dc2626;
                                    color: white;
                                    padding: 6px 10px;
                                    border: none;
                                    border-radius: 4px;
                                    cursor: pointer;
                                ">
                                Excluir
                            </button>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6"
                            style="padding: 15px; text-align: center; color: #6b7280;">
                            Nenhum registro encontrado.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <br>

        {{ $pessoas->links() }}

    </div>

</div>