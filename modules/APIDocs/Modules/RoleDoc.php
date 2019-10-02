<?php

// $api->get('/', ['uses' => 'RoleController@index']);
// $api->post('/', ['uses' => 'RoleController@store']);
// $api->get('/all', ['uses' => 'RoleController@all']);
// $api->get('/{id}', ['uses' => 'RoleController@show']);
// $api->put('/{id}', ['uses' => 'RoleController@update']);
// $api->delete('/{id}', ['uses' => 'RoleController@destroy']);


return [

	'/role' => [

		'get' => [
			'tags' => [
				'Role',
			],
			'summary' => 'List Role with Limit',
			'description' => 'Returns a some role',
			'operationId' => 'getRoleLimited',
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
				'Role',
			],
			'summary' => 'Create Role',
			'description' => 'This can only be done by the logged in user.',
			'operationId' => 'createRole',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'name',
					'in' => 'path',
					'description' => 'Name of Role',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'permission',
					'in' => 'path',
					'description' => 'List of permission',
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

	'/role/all' => [

		'get' => [
			'tags' => [
				'Role',
			],
			'summary' => 'List All Role',
			'description' => 'Returns all role',
			'operationId' => 'getRoleAll',
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

	'/role/{roleId}' => [

		'get' => [
			'tags' => [
				'Role',
			],
			'summary' => 'Find role by ID',
			'description' => 'Returns a single role',
			'operationId' => 'getRoleById',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'roleId',
					'in' => 'path',
					'description' => 'ID of Role to return',
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
				'Role',
			],
			'summary' => 'Updates a Role in the store with form data',
			'description' => '',
			'operationId' => 'updateRoleWithForm',
			'consumes' => [
				'application/x-www-form-urlencoded',
			],
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'roleId',
					'in' => 'path',
					'description' => 'ID of Role that needs to be updated',
					'required' => TRUE,
					'type' => 'integer',
					'format' => 'int64',
				],
				[
					'name' => 'name',
					'in' => 'formData',
					'description' => 'Updated name of the Role',
					'required' => FALSE,
					'type' => 'string',
				],
				[
					'name' => 'permission',
					'in' => 'formData',
					'description' => 'Updated status of the Role',
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
				'Role',
			],
			'summary' => 'Deletes a Role',
			'description' => '',
			'operationId' => 'deleteRole',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'roleId',
					'in' => 'path',
					'description' => 'Role id to delete',
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