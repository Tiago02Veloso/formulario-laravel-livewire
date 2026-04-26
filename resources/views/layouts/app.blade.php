<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Cadastro</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body style="font-family: Arial, sans-serif; background:#f4f4f4; margin:0;">

    <div style="padding:20px;">
        {{ $slot }}
    </div>

    @livewireScripts

    <script>
        
        function mascaraTelefone(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 11);

            if (v.length <= 10) {
                v = v.replace(/(\d{2})(\d)/, '($1) $2');
                v = v.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                v = v.replace(/(\d{2})(\d)/, '($1) $2');
                v = v.replace(/(\d{5})(\d)/, '$1-$2');
            }

            input.value = v;
        }

       
        function mascaraCep(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 8);
            v = v.replace(/(\d{5})(\d)/, '$1-$2');

            input.value = v;
        }

        function mascaraCpf(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 11);

            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

            input.value = v;
        }

        document.addEventListener('input', function (e) {
            if (e.target.name === 'cpf') {
                let v = e.target.value.replace(/\D/g, '');
                e.target.value = v;
            }
        });
    </script>

</body>
</html>