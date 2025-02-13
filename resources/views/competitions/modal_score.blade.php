<!-- Botão para abrir o modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#topScorersModal">
    Ver Top Scorers
</button>

<!-- Modal para mostrar os artilheiros -->
<div class="modal fade" id="topScorersModal" tabindex="-1" aria-labelledby="topScorersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topScorersModalLabel">Top Scorers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Indicador de carregamento -->
                <div id="loadingIndicator" style="display: none; text-align: center;">
                    <img src="{{ asset('images/icons8-loading.gif') }}" alt="Carregando...">
                </div>

                <!-- Lista de artilheiros -->
                <ul id="scorersList" class="list-group">
                    <!-- A lista será preenchida dinamicamente via JavaScript -->
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('topScorersModal').addEventListener('show.bs.modal', function() {
        var competitionId = 'PL';

        // Mostrar o indicador de carregamento

        fetch('/competition/' + competitionId + '/top-scorers')
            .then(response => response.json())
            .then(data => {
                document.getElementById('loadingIndicator').style.display = 'none'; // Esconde o loading

                if (data.success) {
                    var scorersList = document.getElementById('scorersList');
                    scorersList.innerHTML = ''; // Limpar lista anterior

                    if (Array.isArray(data.topScorers.scorers)) {
                        // Preencher a lista com os artilheiros
                        data.topScorers.scorers.forEach((scorer, index) => {
                            var listItem = document.createElement('li');
                            listItem.classList.add('list-group-item');

                            let penalties = scorer.penalties === null ? 0 : scorer.penalties;

                            listItem.innerHTML = `
        <strong>#${index + 1} ${scorer.player.name}</strong> (${scorer.team.name})
                                <br>
                                <span class="d-flex align-items-center">
                                    <span class="ms-2">Goals: ${scorer.goals}</span>
                                </span>
                                <span class="d-flex align-items-center">
                                    <span class="ms-2">Assists: ${scorer.assists}</span>
                                </span>
                                <span class="d-flex align-items-center">
                                    <span class="ms-2">Penalties: ${penalties}</span>
                                </span>
                            `;
                            scorersList.appendChild(listItem);
                        });
                    } else {
                        alert('Error');
                    }
                } else {
                    alert('Error');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                document.getElementById('loadingIndicator').style.display = 'none'; // Esconde o loading em caso de erro
            });
    });
</script>