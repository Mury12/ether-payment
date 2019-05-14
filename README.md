# My Mini

MyMini é um micro ambiente de trabalho para Web Developers focado na rapidez de desenvolvimento
sobre uma base sólida e concretizada para que o desenvolvedor tenha total liberdade ao iniciar seu projeto,
partindo de um pre-made project. Contém, em suas dependências:
 - Bootstrap
 - jQuery
 - VueJs
 - RequireJS
 - Browserify e Babelify
 - Wordpress com um tema pré montado
 - Grunt
 - Uglify
 * Outras depenências checar `package.json`.

# Iniciando o Projeto

Para iniciar seu trabalho, será necessário Node.js v10 ou superior instalado, para utilizar-se do Node Package Manager (npm)
Dentro do diretório do seu projeto, rode o npm:

* `$ npm install -g grunt ` 
* `$ npm install -g solc`    //Solidity Compiler
* `$ npm install -g truffle` //Truffle contract deployer
* `$ npm install `

## Para executar seu projeto:
** Certifique-se de fazer o download correto da blockchain (Ganache)[https://truffleframework.com/ganache] e executar na porta 8545.

* `$ grunt dev ` //Roda o servidor local
* `$ truffle compile` //Compila os contratos na pasta truffle/contracts
* `$ truffle migrate` //faz deploy dos contratos
** Note que este comando irá rodar um servidor em sua máquina em `localhost:3000`. Certifique-se de que possui Node 10.6+ e php7.0+ instalado.

* `$ sudo apt-get install php`

## Para construir seu projeto, minificando arquivos *.js e *.sass:

* `$ grunt build `

# Roteamento

O roteamento é simples e existem duas formas de ser feito:

* Roteamento fixo:
- Feito em `app/routes.php` como padrão da estrutura do arquivo:

```
return [
   'routename' => $l = new Layout,
      $layout->setPage('page-name') //pagina contida em app/pages
      ->otherSettings()
      ->otherSettings()
      ->otherSettings()
   , // <-- Vírgula separa uma rota de outra
   'routename-2' => $l = new Layout,
      $layout->setPage('page-name')
   ,   
]
```

* Roteamento dinâmico
- O roteamento dinâmico é definido pelas rotas salvas no banco de dados em `mm_vc_adv`.`pages`, podendo ser inseridas
a partir do painel de administrador na rota `/admin`.

# Páginas dinâmicas

As páginas dinâmicas são páginas que podem ser criadas pelo próŕio usuário o qual possui tais privilégios. A autenticação na requisição ainda não foi implementada no back-end, portanto não estando apto para uso.

## O que podemos fazer nas páginas dinâmicas?

 * [X] Criar uma nova rota
 * [ ] Modificar a rota
 * [ ] Excluir uma rota
 * [X] Alterar o título da página
 * [X] Alterar o título de uma seção
 * [X] Adicionar seções
 * [X] Excluir seções
 * [X] Alterar a posição das seções
 * [X] Alterar título de subseções
 * [X] Alterar o conteúdo de subseções 
 * [X] Adicionar subseções
 * [X] Excluir subseções
 * [X] Alterar a posição das subseções

 *Rota para admin: /admin*

 **Para que as páginas dinâmicas funcionem corretamente é necessário a configuração correta do banco de dados e das tabelas requisitadas.*


 # Organização do Projeto

 O projeto é organizado em diretórios da seguinte forma:

    - Ether-payment
    ├── app
    │   ├── pages
    │   │   ├── api (Webservices e comunicações com serviços)
    │   │   └── errors (Páginas de erro)
    │   ├── partials
    │   │   ├── navbars
    │   │   ├── classes
    │   │   └── pieces
    │   ├── sql
    │   │   └── `mmproj.sql` (Arquivo com o banco de dados)
    │   ├── `config.php` (Configurações do website, inclusive conexão DB)
    │   ├── `routes.php` (Rotas fixas)
    |   ├── `dynamic-routes` (Rotas dinâmicas. Não alterar!)
    │   └── `functions.php` (Funções globais do site)
    ├── assets
    │   ├── css (saida do scss)
    │   ├── fonts
    │   ├── img
    │   ├── js
    │   │   ├── libs (Libs JS Próprias)
    │   │   ├── `main.js` (Arquivo js principal)
    |   ├── pjs (Saída do Babelify)
    │   └── sass
    │   │   └── partials
    ├── truffle
    │   ├── contracts
    │   │   └── Contracts.sol
    │   ├── build (Build files)
    │   └── migrations (Migrations scripts)
    ├── node_modules
    │ `index.php` (Não alterar)
    └── *Dependency Files*
    

# Utilidades

## Snippet VueJS

```
let data = {
   prop1,
   prop2,
   prop3,
}
let varName = new Vue({
   el: '#el-id',
   data: data,
   
   methods: {
      metod1: function(param)
      {
         this.prop1 = 3;
      },
      method2: function (param)
      {
         console.log(this.prop1);
      },
   },
   created: function {
      method1(param); //Chamada na criação do elemento `el`
   }
})
```
