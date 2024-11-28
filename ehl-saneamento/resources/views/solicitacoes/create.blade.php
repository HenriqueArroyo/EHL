<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Produto</title>
    <link rel="stylesheet" href="{{ asset('assets/css/solicitarMateriais.css') }}">
    <script>
        // Função para buscar o nome do material ao selecionar o ID
        function updateMaterialName() {
            const materialId = document.getElementById('id_material').value;
            const materialNameField = document.getElementById('material_name');

            // Pega o nome do material do atributo "data-name"
            const selectedOption = document.querySelector(`#id_material option[value="${materialId}"]`);
            materialNameField.textContent = selectedOption ? selectedOption.dataset.name : '';
        }
    </script>
</head>
<body>
    <img id="background" src="{{asset('assets/img/Solicitacao-de-materiais.png')}}" alt="">
    <div class="container">
        <h1>Solicitar Produto</h1>
        <form action="{{ route('solicitacoes.store') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="id_material">Selecione o Produto</label><br>
                <select id="id_material" name="id_material" onchange="updateMaterialName()" required>
                    <option value="">Selecione...</option>
                    @foreach ($materiais as $material)
                        <option value="{{ $material->id }}" data-name="{{ $material->nome }}">{{ $material->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <p><strong>Nome do Produto</strong><br> <span id="material_name"></span></p>
            </div>

            <div class="input-group">
                <label for="quantidade">Quantidade</label><br>
                <input type="number" id="quantidade" name="quantidade" min="1" required>
            </div> @error('quantidade')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="login-button">Solicitar</button>
        </form>
    </div>
</body>
</html>
