<?php

return [
	'header' => [
		'user__user_prompts__all' => '{0} You have no prompts|{1} You have :count prompt in total|[2,*] You have :count prompts in total',
		'user__user_prompts__uncategorized' => '{0} You have no uncategorized prompts|{1} You have :count uncategorized prompt|[2,*] You have :count uncategorized prompts',
		'user__user_categories__show' => '{0} No prompts in category "|{1} :count prompt in category "|[2,*] :count prompts in category "',
	],
	'subHeader' => [
		'search' => 'That contains the phrase "',
	],
	'promptCard' => [
		'copy' => [
			'aria_label' => 'Copy prompt',
			'title' => 'Copy',
		],
		'copied' => [
			'title' => 'Copied',
		],
		'edit' => array_fill_keys(['aria_label', 'title'], 'Edit'),
		'delete' => array_merge(
			array_fill_keys(['aria_label', 'title'], 'Delete'),
			[
				'confirm' => 'Are you sure you want to delete this prompt?',
			],
		),
	],
	'no_result' => 'No results found',
];