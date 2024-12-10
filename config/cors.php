<?php

// return [
//     'paths' => ['api/*'],
//     'allowed_methods' => ['*'],  // Permitir todos os métodos
//     'allowed_origins' => ['*'],  // Permitir todas as origens (pode ser substituído por um array com as URLs específicas)
//     'allowed_headers' => ['*'],  // Permitir todos os cabeçalhos
//     'exposed_headers' => [],
//     'max_age' => 0,
//     'supports_credentials' => false,
// ];

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'],  // Permitir apenas o frontend React
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
