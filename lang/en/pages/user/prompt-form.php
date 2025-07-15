<?php

return [
	'inputs' => [
		'title' => [
			'label' => 'Title',
			'placeholder' => 'My example prompt...',
		],
		'type' => [
			'outerlabel' => 'Choose prompt-type',
			'label' => [
				'text' => 'Text generation',
				'image' => 'Image generation',
				'other' => 'Other',
			],
		],
		'content' => [
			'label' => 'Content',
			'placeholder' => 'This is the content of my example prompt...',
		],
		'category_id' => [
			'label' => 'Category',
			'placeholder' => 'NO CATEGORY CHOSEN',
			'addBtnAriaLabel' => 'Add category',
		],
		'submit_btn' => [
			'create' => 'Create Prompt',
			'update' => 'Save Prompt',
		],
	],
	'header' => [
		'user__user_prompts__create' => 'Create new prompt',
		'user__user_prompts__edit' => 'Edit prompt',
	],



	/*
	'sessionStatus' => [
		'gdsgsdgds' => 'fgsdgsdgsdgdsds',
	],
	*/
];