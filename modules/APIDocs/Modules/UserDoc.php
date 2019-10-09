<?php

return [

	'/users' => [

		'get' => [
			'tags' => [
				'Users',
			],
			'summary' => 'List User with Limit',
			'description' => 'Returns a some users',
			'operationId' => 'getUserLimited',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'page',
					'in' => 'query',
					'description' => '',
					'type' => 'integer',
					'format' => 'int64',
				],
				[
					'name' => 'limit',
					'in' => 'query',
					'description' => '',
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

		'post' => [
			'tags' => [
				'Users',
			],
			'summary' => 'Create User',
			'description' => 'This can only be done by the logged in user.',
			'operationId' => 'createUser',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'name',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'username',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'email',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'password',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'role',
					'in' => 'query',
					'description' => '',
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

	'/users/all' => [

		'get' => [
			'tags' => [
				'Users',
			],
			'summary' => 'List All User',
			'description' => 'Returns all users',
			'operationId' => 'getUserAll',
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

	'/users/{usersId}' => [

		'get' => [
			'tags' => [
				'Users',
			],
			'summary' => 'Find users by ID',
			'description' => 'Returns a single users',
			'operationId' => 'getUserById',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'usersId',
					'in' => 'path',
					'description' => 'ID of User to return',
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
				'Users',
			],
			'summary' => 'Update user data',
			'description' => '',
			'operationId' => 'updateUserWithForm',
			'consumes' => [
				'application/x-www-form-urlencoded',
			],
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'usersId',
					'in' => 'path',
					'description' => 'ID of User that needs to be updated',
					'required' => TRUE,
					'type' => 'integer',
					'format' => 'int64',
				],
				[
					'name' => 'name',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'username',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'email',
					'in' => 'query',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'role',
					'in' => 'query',
					'description' => '',
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
		],

		'delete' => [
			'tags' => [
				'Users',
			],
			'summary' => 'Delete user by ID',
			'description' => '',
			'operationId' => 'deleteUser',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'usersId',
					'in' => 'path',
					'description' => 'User id to delete',
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