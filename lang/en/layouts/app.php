<?php

return [
	'sideNavbar' => [
		'aria_label' => 'sidebar navigation',
		'searchField' => array_merge(
			array_fill_keys(['placeholder', 'aria_label'], 'Search'),
			[
				//'title' => 'Dette er en titel bla bla bla bla bla bla',
			],
		),
		'collapsibleItems' => [
			'sideNavbar_collapsibleItem_categories' => [
				'btnLabel' => 'Categories',
				'addBtn' => 'Add a category',
				'editBtn' => 'Edit category',
				'noItemsMessage' => 'No categories added',
			],
			'sideNavbar_collapsibleItem_tags' => [
				'btnLabel' => '...',
				'addBtn' => '...',
				'editBtn' => '...',
			],
		],
	],
	'topNavbar' => [
		'sideNavbarToggle_srOnly' => 'sidebar toggle',
		'profileDropdown' => [
			'srOnly' => 'profile settings',
			'avatarAltText' => 'User profile picture',
			'items' => [
				'user__user_pages__eksempel_page' => 'blabla',
			],
		],
	],
];