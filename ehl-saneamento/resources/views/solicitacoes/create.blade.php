<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Produto</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
    <div class="container">
        <h1>Solicitar Produto</h1>
        <form action="{{ route('solicitacoes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_material">Selecione o Produto:</label>
                <select id="id_material" name="id_material" onchange="updateMaterialName()" required>
                    <option value="">Selecione...</option>
                    @foreach ($materiais as $material)
                        <option value="{{ $material->id }}" data-name="{{ $material->nome }}">{{ $material->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <p><strong>Nome do Produto:</strong> <span id="material_name"></span></p>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" min="1" required>
            </div>

            <button type="submit" class="btn">Solicitar</button>
        </form>
    </div>
</body>
</html>
