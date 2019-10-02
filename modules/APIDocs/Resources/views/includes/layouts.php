<?php

return [
    
    'swagger' => '2.0',
    'info' => [
        'version' => '1.0.0',
        'title' => 'HarmonyPXM API',
    ],
    'host' => api_url(),
    'basePath' => '/',
    'schemes' => [
        
    ],
    'paths' => [],
    'securityDefinitions' => [
        'APIKeyHeader' => [
            'type' => 'apiKey',
            'name' => 'Authorization',
            'in' => 'header',
        ],
        'APIKeyQueryParam' => [
            'type' => 'apiKey',
            'name' => 'token',
            'in' => 'query',
        ],
    ],

    'definitions' => [
        'ApiResponse' => [
            'type' => 'object',
            'properties' => [
                'code' => [
                    'type' => 'integer',
                    'format' => 'int32',
                ],
                'type' => [
                    'type' => 'string',
                ],
                'message' => [
                    'type' => 'string',
                ]
            ]
        ],
    ]
];