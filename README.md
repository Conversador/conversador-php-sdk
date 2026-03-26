# Conversador PHP SDK

PHP SDK para integração com a API do Conversador, permitindo envio de mensagens de texto e mídia via WhatsApp.

## Requisitos

- PHP 8.2+
- Composer

## Instalação

```bash
composer require conversador/conversador-php-sdk
```

## Configuração

Crie um arquivo `env.php` na raiz do projeto (não commitado no git):

```php
<?php

return [
    'conversador' => [
        'token' => 'SEU_TOKEN_AQUI',
        'base_uri' => 'https://api.conversador.paconstrushop.com.br/api/',
        'test_number' => '5511999999999',
    ],
];
```

**Observações importantes:**
- O token deve ser cadastrado na conexão pelo menu 'Conexões' no painel do Conversador
- O número para envio não deve ter máscara ou caracteres especiais (ex: 558599999999)

## Uso

### Enviando Mensagem de Texto

```php
<?php

require_once 'vendor/autoload.php';

use Conversador\Conversador;
use Conversador\Message;

$conversador = new Conversador(
    'SEU_TOKEN_AQUI',
    'https://api.conversador.paconstrushop.com.br/api/'
);

$message = new Message('558599999999', 'Olá, mundo!');

$response = $conversador->sendMessage($message);

print_r($response);
```

### Enviando Mensagem com Parâmetros Avançados

```php
<?php

require_once 'vendor/autoload.php';

use Conversador\Conversador;
use Conversador\Message;

$conversador = new Conversador(
    'SEU_TOKEN_AQUI',
    'https://api.conversador.paconstrushop.com.br/api/'
);

$message = new Message(
    '558599999999',      // number (obrigatório)
    'Olá, mundo!',       // body (obrigatório)
    'user123',           // userId (opcional) - ID do usuário/atendente
    'queue456',          // queueId (opcional) - ID da fila
    true,                // sendSignature (opcional) - incluir nome do usuário
    false,               // closeTicket (opcional) - encerrar o ticket
    789,                 // ticketId (opcional) - ID do ticket existente
    false                // noRegister (opcional) - não criar ticket
);

$response = $conversador->sendMessage($message);

print_r($response);
```

### Enviando Mensagem para Grupo

```php
<?php

require_once 'vendor/autoload.php';

use Conversador\Conversador;
use Conversador\Message;

$conversador = new Conversador('SEU_TOKEN_AQUI');

// JID do grupo (ex: 120363XXXXXXXXXX@g.us)
$message = new Message(
    '120363XXXXXXXXXX@g.us',
    'Mensagem para o grupo',
    '1',                 // userId
    null,                // queueId
    true,                // sendSignature - incluir nome
    false,               // closeTicket
    null,                // ticketId
    true                 // noRegister - obrigatório para grupos
);

$response = $conversador->sendMessage($message);

print_r($response);
```

### Enviando Mensagem com Mídia

```php
<?php

require_once 'vendor/autoload.php';

use Conversador\Conversador;
use Conversador\MediaMessage;

$conversador = new Conversador('SEU_TOKEN_AQUI');

$mediaMessage = new MediaMessage(
    '558599999999',      // number (obrigatório)
    '/path/to/image.jpg' // mediaPath (obrigatório)
);

$response = $conversador->sendMediaMessage($mediaMessage);

print_r($response);
```

### Enviando Mensagem com Mídia e Caption

```php
<?php

require_once 'vendor/autoload.php';

use Conversador\Conversador;
use Conversador\MediaMessage;

$conversador = new Conversador('SEU_TOKEN_AQUI');

$mediaMessage = new MediaMessage(
    '558599999999',      // number
    '/path/to/image.jpg', // mediaPath
    'Legenda da imagem', // body (caption)
    'user123',           // userId
    'queue456',          // queueId
    true,                // sendSignature
    false,               // closeTicket
    789,                 // ticketId
    false                // noRegister
);

$response = $conversador->sendMediaMessage($mediaMessage);

print_r($response);
```

## Parâmetros Disponíveis

| Parâmetro | Tipo | Descrição |
|-----------|------|-----------|
| `number` | string | Número do destinatário (558599999999) ou JID do grupo |
| `body` | string | Texto da mensagem |
| `userId` | string? | ID do usuário/atendente |
| `queueId` | string? | ID da fila |
| `sendSignature` | bool | Incluir nome do usuário na mensagem |
| `closeTicket` | bool | Encerrar o ticket após envio |
| `ticketId` | int? | ID do ticket existente para vincular |
| `noRegister` | bool | Não criar ticket (obrigatório para grupos) |

## Executando os Testes

```bash
# Instalar dependências
composer install

# Executar todos os testes
./vendor/bin/phpunit

# Executar um arquivo de teste específico
./vendor/bin/phpunit tests/MessageTest.php

# Executar um método de teste específico
./vendor/bin/phpunit tests/MessageTest.php --filter=testGetNumber
```

## Licença

MIT
