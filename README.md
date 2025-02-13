# Projeto Laravel - Consumo da API de Futebol

Este projeto foi desenvolvido em **Laravel** para consumir dados da [Football Data API](https://www.football-data.org/) e exibir informações sobre times de futebol, como nome, ano de fundação, estádio e jogadores. O projeto segue uma estrutura MVC, com a adição de um **Service** para separar a lógica de negócio da lógica de controle.

## Estrutura do Projeto

- **Service**: Lógica de negócio que se comunica diretamente com a API para buscar dados.
- **Controller**: Recebe requisições do usuário, chama o serviço e passa os dados para a view.
- **View**: Exibe os dados na interface do usuário.

## Pré-visualização do Projeto

As imagens relacionadas aos times de futebol estão armazenadas na pasta `storage/app/public/prints/` e são acessadas via URLs públicas:

- **Tela inicial**: ![Imagem 1](https://github.com/Joaofelipe14/Futeboll-system/blob/main/public/images/prints/1.png)
- **Tela do campeonato**: ![Imagem 2](https://github.com/Joaofelipe14/Futeboll-system/blob/main/public/images/prints/2.png)
- **Tela de infor dos times**: ![Imagem 3](https://github.com/Joaofelipe14/Futeboll-system/blob/main/public/images/prints/3.png)

## Exemplo de Uso

Para acessar os detalhes de um time, basta usar a URL no seguinte formato:

http://localhost/team/{teamId}

Substitua `{teamId}` pelo ID do time que deseja consultar. O controlador irá buscar os dados desse time e exibi-los na view.

## Licença

Este projeto está licenciado sob a Licença MIT.
