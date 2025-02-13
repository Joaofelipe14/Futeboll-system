Projeto Laravel - Consumo da API de Futebol
Este projeto foi desenvolvido em Laravel para consumir dados da Football Data API e exibir informações sobre times de futebol, como nome, ano de fundação, estádio e jogadores. O projeto segue uma estrutura MVC padrão, com a adição de um Service para separar a lógica de negócio da lógica de controle.

Estrutura do Projeto
A estrutura do projeto é composta pelos seguintes componentes:

Service: Contém a lógica de negócio, que se comunica diretamente com a API para buscar os dados.
Controller: Recebe as requisições do usuário, chama o serviço para obter os dados e os passa para a view.
View: Exibe os dados para o usuário na interface.
Além disso, as imagens relacionadas aos times são armazenadas na pasta storage/app/public/prints/ e são exibidas nas views.

Instalação
1. Clonar o Repositório
Primeiro, clone o repositório para o seu ambiente local:


bash
Copiar
composer install
3. Configuração da API Key
Para consumir a API da Football Data, você precisará de uma chave de API. Crie uma conta em Football Data API e obtenha sua chave.

Adicione a chave no arquivo .env do seu projeto:

dotenv
Copiar
FOOTBALL_API_KEY=sua_chave_api_aqui
4. Configuração de Armazenamento de Imagens
Para acessar as imagens armazenadas no diretório storage/app/public/prints/, execute o comando abaixo para criar o link simbólico necessário:

bash
Copiar
php artisan storage:link
5. Estrutura MVC
O projeto segue a estrutura Service, Controller e View.

a. Service (FootballService)
O serviço é responsável por interagir diretamente com a API externa. Ele realiza as requisições HTTP e processa os dados recebidos.

Localização: app/Services/FootballService.php

O serviço faz a requisição para a API da Football Data, utilizando a chave da API configurada no .env.

b. Controller (FootballController)
O controlador gerencia as requisições do usuário, chamando o serviço para obter os dados do time e passando esses dados para a view.

Localização: app/Http/Controllers/FootballController.php

O controlador é responsável por chamar o FootballService e passar os dados para a view renderizada.

c. View (show.blade.php)
A view exibe os dados do time de futebol de forma estruturada na interface do usuário.

Localização: resources/views/team/show.blade.php

Aqui é onde você vai mostrar as informações do time, como nome, fundação, estádio, jogadores e também as imagens associadas.

Armazenamento de Imagens
As imagens relacionadas aos times de futebol estão armazenadas na pasta storage/app/public/prints/. Para exibir as imagens corretamente, o Laravel cria um link simbólico com o comando:

bash
Copiar
php artisan storage:link
Depois de rodar esse comando, as imagens podem ser acessadas pela URL pública, como mostrado abaixo:

Exemplo de Imagens
Imagem 1:
Imagem 2:
Imagem 3:
Exemplo de Uso
Para acessar os detalhes de um time, basta usar a URL no seguinte formato:

arduino
Copiar
http://localhost/team/{teamId}
Substitua {teamId} pelo ID do time que deseja consultar. O controlador irá buscar os dados desse time através do FootballService e exibi-los na view.

Contribuindo
Faça o fork do repositório.
Crie uma branch (git checkout -b feature/nova-funcionalidade).
Faça suas alterações e commit (git commit -am 'Adicionando nova funcionalidade').
Envie para o repositório remoto (git push origin feature/nova-funcionalidade).
Crie um Pull Request.
Licença
Este projeto está licenciado sob a Licença MIT - veja o arquivo LICENSE para mais detalhes.

