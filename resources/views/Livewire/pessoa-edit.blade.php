<div
    style="
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    "
>

    <h2 style="text-align: center; margin-bottom: 20px;">
        Editar Pessoa
    </h2>

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

    <form wire:submit.prevent="atualizar">

        {{-- Nome --}}
        <div style="margin-bottom: 10px;">
            <input type="text"
                   wire:model.defer="nome"
                   placeholder="Nome"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">

            @error('nome')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email --}}
        <div style="margin-bottom: 10px;">
            <input type="email"
                   wire:model.defer="email"
                   placeholder="Email"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">

            @error('email')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        {{-- Telefone --}}
        <div style="margin-bottom: 10px;">
            <input type="text"
                   wire:model.defer="telefone"
                   placeholder="(61) 99999-9999"
                   maxlength="15"
                   oninput="mascaraTelefone(this)"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">

            @error('telefone')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        {{-- CEP --}}
        <div style="margin-bottom: 10px;">
            <input type="text"
                   wire:model.defer="cep"
                   placeholder="00000-000"
                   maxlength="9"
                   oninput="mascaraCep(this)"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">

            @error('cep')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        {{-- CPF --}}
        <div style="margin-bottom: 10px;">
            <input type="text"
                   wire:model.defer="cpf"
                   name="cpf"
                   placeholder="000.000.000-00"
                   maxlength="14"
                   oninput="mascaraCpf(this)"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">

            @error('cpf')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        {{-- Botão --}}
        <button type="submit"
                wire:loading.attr="disabled"
                style="
                    width: 100%;
                    padding: 12px;
                    background: #f59e0b;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    font-weight: bold;
                    cursor: pointer;
                ">
            <span wire:loading.remove>Atualizar</span>
            <span wire:loading>Atualizando...</span>
        </button>

    </form>

    <br>

    <a href="{{ route('pessoas.list') }}"
       style="display:block; text-align:center; color:#2563eb; text-decoration:none;">
        Voltar para Lista
    </a>

</div>