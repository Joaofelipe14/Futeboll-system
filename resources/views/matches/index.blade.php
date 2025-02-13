<style>
    /* Spinner centralizado */
    #loadingSpinner {
        display: none;
        /* Inicialmente oculto */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 9999;
    }

    .spinner-img {
        width: 50px;
        /* Ajuste o tamanho da GIF */
        height: 50px;
    }

    /* Efeito de fundo desfocado */
    #blurredBackground {
        display: none;
        /* Inicialmente oculto */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2);
        /* Fundo semitransparente */
        backdrop-filter: blur(10px);
        /* Aplica o desfoque */
        z-index: 9998;
        /* Coloca o desfoque abaixo do spinner */
    }
</style>


<div class="container mt-5">

    <div id="loadingSpinner">
        <img src="{{ asset('images/icons8-loading.gif') }}" alt="Loading..." class="spinner-img">
    </div>

    <div id="blurredBackground"></div>


    <!-- Logica para ver um filtro o outro-->
    @include('matches.filter_form_team')

    <!-- Inclui a tabela de partidas -->
    <div id="matchesContainer">
        @include('matches.matches_table')
    </div>
</div>


<script>
</script>