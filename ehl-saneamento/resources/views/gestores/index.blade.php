<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Materiais</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Gestão de Materiais</h1>

    <div>
        <canvas id="materiaisChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Obtendo os dados dos materiais do backend
        const materiais = @json($materiais);

        // Preparando os dados para o gráfico
        const nomesMateriais = materiais.map(material => material.nome);
        const quantidades = materiais.map(material => material.quantidade);

        // Criando o gráfico
        const ctx = document.getElementById('materiaisChart').getContext('2d');
        const materiaisChart = new Chart(ctx, {
            type: 'bar', // tipo de gráfico (bar, line, etc.)
            data: {
                labels: nomesMateriais, // rótulos das barras (nomes dos materiais)
                datasets: [{
                    label: 'Quantidade de Materiais',
                    data: quantidades, // os dados para o gráfico
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
