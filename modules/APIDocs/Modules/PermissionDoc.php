<?php

// $api->get('/', ['uses' => 'PermissionController@index']);
// $api->post('/', ['uses' => 'PermissionController@store']);
// $api->get('/all', ['uses' => 'PermissionController@all']);
// $api->get('/{id}', ['uses' => 'PermissionController@show']);
// $api->put('/{id}', ['uses' => 'PermissionController@update']);
// $api->delete('/{id}', ['uses' => 'PermissionController@destroy']);


return [

	'/permission' => [

		'get' => [
			'tags' => [
				'Permission',
			],
			'summary' => 'List Permission with Limit',
			'description' => 'Returns a some permission',
			'operationId' => 'getPermissionLimited',
			'produces' => [
				'application/json',
			],
			'parameters' => [],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						
					],
				],
				'401' => [
					'description' => 'Unauthorized',
					'schema' => [
						
					],
				],
				'500' => [
					'description' => 'Internal Server Error.',
					'schema' => [
						
					],
				],
			],
			'security' => [
				[
					'APIKeyHeader' => []
				],
			],
		],

		'post' => [
			'tags' => [
				'Permission',
			],
			'summary' => 'Create Permission',
			'description' => 'This can only be done by the logged in user.',
			'operationId' => 'createPermission',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'name',
					'in' => 'path',
					'description' => 'Name of Permission',
					'required' => TRUE,
					'type' => 'string',
				],
				
			],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						
					],
				],
				'401' => [
					'description' => 'Unauthorized',
					'schema' => [
						
					],
				],
				'500' => [
					'description' => 'Internal Server Error.',
					'schema' => [
						
					],
				],
			],
			'security' => [
				[
					'APIKeyHeader' => []
				],
			],
		]
	],

	'/permission/all' => [

		'get' => [
			'tags' => [
				'Permission',
			],
			'summary' => 'List All Permission',
			'description' => 'Returns all permission',
			'operationId' => 'getPermissionAll',
			'produces' => [
				'application/json',
			],
			'parameters' => [],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						
					],
				],
				'401' => [
					'description' => 'Unauthorized',
					'schema' => [
						
					],
				],
				'500' => [
					'description' => 'Internal Server Error.',
					'schema' => [
						
					],
				],
			],
			'security' => [
				[
					'APIKeyHeader' => []
				],
			],
		]
	],

	'/permission/{permissionId}' => [

		'get' => [
			'tags' => [
				'Permission',
			],
			'summary' => 'Find permission by ID',
			'description' => 'Returns a single permission',
			'operationId' => 'getPermissionById',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'permissionId',
					'in' => 'path',
					'description' => 'ID of Permission to return',
					'required' => TRUE,
					'type' => 'integer',
					'format' => 'int64',
				],
			],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						
					],
				],
				'401' => [
					'description' => 'Unauthorized',
					'schema' => [
						
					],
				],
				'500' => [
					'description' => 'Internal Server Error.',
					'schema' => [
						
					],
				],
			],
			'security' => [
				[
					'APIKeyHeader' => []
				],
			],
		],

		'put' => [
			'tags' => [
				'Permission',
			],
			'summary' => 'Updates a Permission in the store with form data',
			'description' => '',
			'operationId' => 'updatePermissionWithForm',
			'consumes' => [
				'application/x-www-form-urlencoded',
			],
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'permissionId',
					'in' => 'path',
					'description' => 'ID of Permission that needs to be updated',
					'required' => TRUE,
					'type' => 'integer',
					'format' => 'int64',
				],
				[
					'name' => 'name',
					'in' => 'formData',
					'description' => 'Updated name of the Permission',
					'required' => FALSE,
					'type' => 'string',
				],

			],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						
					],
				],
				'401' => [
					'description' => 'Unauthorized',
					'schema' => [
						
					],
				],
				'500' => [
					'description' => 'Internal Server Error.',
					'schema' => [
						
					],
				],
			],
			'security' => [
				[
					'APIKeyHeader' => []
				],
			],
		],

		'delete' => [
			'tags' => [
				'Permission',
			],
			'summary' => 'Deletes a Permission',
			'description' => '',
			'operationId' => 'deletePermission',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'permissionId',
					'in' => 'path',
					'description' => 'Permission id to delete',
					'required' => TRUE,
					'type' => 'integer',
					'format' => 'int64',
				],
			],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						
					],
				],
				'401' => [
					'description' => 'Unauthorized',
					'schema' => [
						
					],
				],
				'500' => [
					'description' => 'Internal Server Error.',
					'schema' => [
						
					],
				],
			],
			'security' => [
				[
					'APIKeyHeader' => []
				]
			]
		]

	]

];