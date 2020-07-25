## Introdução

LifeApps integration é um pacote de metodos que facilitam a integração do seu e-commerce com a LifeApps SuperON. Sempre que surgir alguma dúvida de como que está sendo feit a integração com o seu ERP, acesse o [Swaggerhub da Life Apps](https://app.swaggerhub.com/apis/LifeApps/superon-commerce/4.24.6#/). Todos os parametros aqui setados, seguem explicitamente toda a sua documentação. 

## Instalação
Primeiro, instale o Intrgration através do gerenciador de pacotes Composer:

```bash
"adiliogobira/lifeapps-integration": "^1.0@dev",
```

ou via comando:

```bash
composer require adiliogobira/lifeapps-integration
```

## Documentação

Para mais detalhes de como usar o lifeapps-integration, siga os passos aqui.

Depois de instalar o Integration, você deve publicar a configuração do Integration usando o comando Artisan vendor:publish. Este comando publicará o arquivo de configuração scout.php no seu diretório config.

```bash
php artisan vendor:publish --provider="Lifeapps\src\LifeAppsServiceProvider"
```

Crie em seu arquivo de ambiente .env as constantes 

```bash
LIFE_APPS_TOKEN='o seu idfornecedor'
```
e

```bash
LIFE_APPS_TOKEN_SPLIT='o token split informado no Swaggerhub'
```

## Como usar

```php
<?php
// Para fazer um get do cliente, fazer login ou cadastro
require __DIR__ . "/../vendor/autoload.php";

$Cliente = new \Lifeapps\Integra\Cliente();

//autenticação do cliente

//Lembrando que a variavel usuario deve corresponder aos dados que o swaggerhub solicita para fazer a autenticação do usuario

$usuario=[
    'cpf'=>'xxx.xxx.xxx-xx',
    'senha'=>'xxxxx',
    'tokenOrigin'=>''
];
// o conector já faz a conversão em json para o envio dos dados

$Cliente->getClientByLogin($usuario);

$image = new CoffeeCode\Uploader\Image("uploads", "images", 600);

if ($_FILES) {
    try {
        $upload = $image->upload($_FILES['image'], $_POST['name']);
        echo "<img src='{$upload}' width='100%'>";
    } catch (Exception $e) {
        echo "<p>(!) {$e->getMessage()}</p>";
    }
}
```

## Notas importantes

Nem todos os métodos aqui aplicados estão no [Swaggerhub da Life Apps](https://app.swaggerhub.com/apis/LifeApps/superon-commerce/4.24.6#/), devida a falta de alimentação de suas descrições, não é por falta de informações, sim pela complexidade de fazer a documentação de toda a plataforma sendo que o time da LifeApps ainda é pequeno, mas, conseguem entregar um produto viável para produção.

-----------------------------------------------------------------------------------------------------------------------------------------

# English version:

## Introduction

LifeApps integration is a package of methods that facilitate the integration of your e-commerce with LifeApps SuperON. Whenever you have any questions about how to integrate with your ERP, access the [Swaggerhub from Life Apps] (https://app.swaggerhub.com/apis/LifeApps/superon-commerce/4.24.6#/ ). All parameters set here, explicitly follow all their documentation.

## Important notes

Not all methods applied here are in the [Swaggerhub of Life Apps] (https://app.swaggerhub.com/apis/LifeApps/superon-commerce/4.24.6#/), due to the lack of power in their descriptions, no it is due to lack of information, but due to the complexity of making documentation for the entire platform, and the LifeApps team is still small, but they are able to deliver a viable product for production.
