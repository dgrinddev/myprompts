<?php

return [
	'name' => [
		'label' => 'Username (lowercase letters, numbers, underscores)',
		'placeholder' => 'my_example_user123',
	],
	'email' => [
		'label' => 'Email address',
		'placeholder' => 'my.example.email@email.com',
	],
	'password' => array_merge(
		array_fill_keys(['label', 'placeholder'], 'Password'),
		[
			//'title' => 'Dette er en titel bla bla bla bla bla bla',
		],
	),
	'password_confirmation' => array_merge(
		array_fill_keys(['label', 'placeholder'], 'Confirm password'),
	),
	'accept_terms' => [
		'label' => 'I accept the <a href=":route_privacy" rel="noopener" target="_blank" class="font-medium text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm">Cookies & Privacy Policy</a><br>and <a href=":route_terms" rel="noopener" target="_blank" class="font-medium text-on-surface dark:text-on-surface-dark underline-offset-2 hover:text-on-surface-strong focus:outline-hidden focus:underline dark:hover:text-primary-dark transition text-sm">Terms of Use</a>',
	],
	'submit_btn' => 'Create account',
];
