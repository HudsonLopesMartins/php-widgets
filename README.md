# Repositório PHP-Widgets

Este é um projeto de exemplo que demonstra o uso POO com php para gerar componentes do Bootstrap 3.4, conexão com banco de dados MySQL/MariaDB, geração de páginas HTML dinâmicas, controle de sessão de usuário e filtros de consultas SQL.

## Pré-requisitos
- Servidor web (por exemplo, Apache)
- PHP (versão compatível com a sua aplicação)
- MySQL ou MariaDB
- Bootstrap v3.4
Certifique-se de ter o ambiente de desenvolvimento configurado corretamente antes de prosseguir.

## 📦 Instalação e Configuração
**1.** Clone este repositório para o seu ambiente de desenvolvimento local:
```
git clone https://github.com/HudsonLopesMartins/php-widgets.git
```

**2.** Configure as credenciais do banco de dados editando o arquivo config.php na raiz do projeto:
```
<?php

define("DRV_MYSQL", "mysqli");
define("DSN_MYSQL", "localhost");
define("UID_MYSQL", "seu_usuario");
define("PWD_MYSQL", "sua_senha");
define("DBN_MYSQL", "seu_banco_de_dados");

?>
```

## Estrutura do Projeto
- index.php: Página inicial do projeto.
- config.php: Arquivo de configuração com as credenciais do banco de dados.
- widgets/: Diretório contendo os Objetos PHP reutilizáveis.
- libs/: Diretório contendo arquivos estáticos como CSS, JavaScript e imagens.
## Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.
## 🚀 Sobre mim
Programador desde 2005, com desenvolvimento de ferramentas para área comercial, gestão de arquivos e produção textil.
## Autor

- [@HudsonLopesMartins](https://github.com/HudsonLopesMartins)
- [Linkedin](https://www.linkedin.com/in/hudson-lopes-martins-25123119/)


## Licença

[MIT](https://choosealicense.com/licenses/mit/)
