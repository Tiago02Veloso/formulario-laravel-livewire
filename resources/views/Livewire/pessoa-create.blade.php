<div
    style="
        max-width: 600px;
        margin: auto;
        padding: 20px;
        width: 100%;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    "
>

    <h2 style="text-align: center; margin-bottom: 20px;">
        Cadastro de Pessoa
    </h2>

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

    <form wire:submit.prevent="salvar">

        {{-- Nome --}}

<div style="margin-bottom:10px;">

    <input type="text"
           wire:model.defer="nome"
           placeholder="Nome"
           style="
                width:100%;
                padding:12px 14px;
                border:1px solid #ccc;
                border-radius:4px;
                outline:none;
           ">

    @error('nome')
        <span style="color:red;font-size:13px;">{{ $message }}</span>
    @enderror

</div>

        {{-- Email + Telefone --}}
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:10px;">

            <div style="flex:1; min-width:200px;">
                <input type="email"
                       wire:model.defer="email"
                       placeholder="Email"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">

                @error('email')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            {{-- TELEFONE --}}
            <div style="flex:1; min-width:200px;">
                <input type="text"
                       wire:model.defer="telefone"
                       placeholder="(61) 99999-9999"
                       maxlength="15"
                       oninput="mascaraTelefone(this)"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">

                @error('telefone')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

        </div>

        {{-- CEP + CPF --}}
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:10px;">

            {{-- CEP --}}
            <div style="flex:1; min-width:200px;">
                <input type="text"
                       wire:model.defer="cep"
                       placeholder="00000-000"
                       maxlength="9"
                       oninput="mascaraCep(this); $wire.set('cep', this.value.replace(/\D/g,''))"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">

                @error('cep')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            {{-- CPF --}}
            <div style="flex:1; min-width:200px;">
                <input type="text"
                       wire:model.defer="cpf"
                       placeholder="000.000.000-00"
                       maxlength="14"
                       oninput="mascaraCpf(this); $wire.set('cpf', this.value.replace(/\D/g,''))"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">

                @error('cpf')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

        </div>

        {{-- Botão --}}
        <button type="submit"
                wire:loading.attr="disabled"
                style="
                    width: 100%;
                    padding: 12px;
                    background: #2563eb;
                    color: white;
                    border: none;
                    cursor: pointer;
                    border-radius: 6px;
                    font-weight: bold;
                ">
            <span wire:loading.remove>Salvar</span>
            <span wire:loading>Salvando...</span>
        </button>

    </form>

    <br>

    <a href="{{ route('pessoas.list') }}"
       style="
            display:block;
            text-align:center;
            text-decoration:none;
            color:#2563eb;
            font-weight:bold;
        ">
        Ver Lista
    </a>

</div>