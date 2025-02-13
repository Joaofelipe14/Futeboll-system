
<h4>Squad:</h4>
<table class="table" id="playersTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Posição</th>
            <th>Data de Nascimento</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aqui os jogadores serão inseridos via JavaScript -->
    </tbody>
</table>

<!-- Controles de navegação -->
<div class="pagination">
    <button class="btn btn-primary" onclick="changePage(-1)">Anterior</button>
    <button class="btn btn-primary" onclick="changePage(1)">Próxima</button>
</div>

<script>
    let currentPage = 0;
    const playersChunks = @json($playersChunks);
    const totalPages = playersChunks.length;

    console.log(playersChunks)
    // Função para renderizar os jogadores da página atual
    function renderPlayers() {
        const playersTable = document.getElementById('playersTable').getElementsByTagName('tbody')[0];
        playersTable.innerHTML = ''; // Limpar a tabela

        const players = playersChunks[currentPage]; // Obter os jogadores da página atual
        console.log(players)
        players.forEach(player => {
            const row = playersTable.insertRow();
            row.innerHTML = `
                <td>${player.name}</td>
                <td>${player.position}</td>
                <td>${player.dateOfBirth}</td>
            `;
        });
    }

    // Função para mudar de página
    function changePage(direction) {
        const newPage = currentPage + direction;

        // Verifica se a nova página está dentro do intervalo válido
        if (newPage >= 0 && newPage < totalPages) {
            currentPage = newPage;
            renderPlayers();
        }
    }

    // Inicializar a página com os jogadores da primeira página
    renderPlayers();
</script>
