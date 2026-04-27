<div
   style="
    max-width: 1200px;
    margin: 30px auto;
    padding: 25px;
    width: 100%;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
"
>

    <h2 style="text-align: center; margin-bottom: px;">
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
        <th style="padding: 16px; border: 1px solid #ddd; width: 25%;">Nome</th>
        <th style="padding: 16px; border: 1px solid #ddd; width: 25%;">Email</th>
        <th style="padding: 16px; border: 1px solid #ddd; width: 15%;">Telefone</th>
        <th style="padding: 16px; border: 1px solid #ddd; width: 10%;">CEP</th>
        <th style="padding: 16px; border: 1px solid #ddd; width: 15%;">CPF</th>
        <th style="padding: 16px; border: 1px solid #ddd; width: 10%;">Ações</th>
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

                        <td style="padding: 16px; border: 1px solid #ddd; text-align: center;">

    <div style="
        display: flex;
        justify-content: center;
        gap: 8px;
    ">

        <a href="{{ route('pessoas.edit', $pessoa->id) }}"
           style="
                background: #f59e0b;
                color: white;
                padding: 8px 14px;
                text-decoration: none;
                border-radius: 6px;
                font-size: 14px;
                font-weight: bold;
           ">
            Editar
        </a>

        <button
            wire:click="excluir({{ $pessoa->id }})"
            onclick="return confirm('Tem certeza que deseja excluir?')"
            style="
                background: #dc2626;
                color: white;
                padding: 8px 14px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 14px;
                font-weight: bold;
           ">
            Excluir
        </button>

    </div>

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