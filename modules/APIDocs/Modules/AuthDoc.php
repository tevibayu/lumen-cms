<?php


return [

	'/auth/login' => [

		'post' => [
			'tags' => [
				'Auth',
			],
			'summary' => 'Sign in to system',
			'description' => '',
			'operationId' => 'authLogin',
			'consumes' => [
				'application/json',
			],
			'produces' => [
				'application/json',
			],
			'parameters' => [
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
					'description' => 'The password for login in clear text',
					'required' => TRUE,
					'type' => 'string',
				],
			],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'headers' => [
						'X-Rate-Limit' => [
							'type' => 'integer',
			                'format' => 'int32',
			                'description' => 'calls per hour allowed by the user',
						],
						'X-Expires-After' => [
							'type' => 'string',
			                'format' => 'date-time',
			                'description' => 'date in UTC when token expires',
						],
					],
				],
				'500' => [
					'description' => 'Invalid username/password supplied.',
				],
			]
			
		]
	],

	'/auth/register' => [

		'post' => [
			'tags' => [
				'Auth',
			],
			'summary' => 'Create a user',
			'description' => '',
			'operationId' => 'authRegister',
			'produces' => [
				'application/json',
			],
			'parameters' => [
				[
					'name' => 'email',
					'in' => 'formData',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'username',
					'in' => 'formData',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'firstname',
					'in' => 'formData',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'lastname',
					'in' => 'formData',
					'description' => '',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'password',
					'in' => 'formData',
					'description' => 'The password for login in clear text',
					'required' => TRUE,
					'type' => 'string',
				],
				[
					'name' => 'password_confirmation',
					'in' => 'formData',
					'description' => 'The password confirmation for login in clear text',
					'required' => TRUE,
					'type' => 'string',
				],
			],
			'responses' => [
				'200' => [
					'description' => 'OK',
					'schema' => [
						'type' => 'object',
					],
				],
				'500' => [
					'description' => 'Invalid data supplied.',
				],
			]
			
		]
	],

];