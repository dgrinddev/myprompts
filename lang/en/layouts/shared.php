<?php
$appName = config('app.name');

return [
	'srOnly' => [
		'skipToMainContent' => 'skip to the main content',
	],
	'aria_label' => [
		'topNavbar' => 'top navigation bar',
		'breadcrumb' => 'breadcrumb',
		'mobileNavToggle' => 'toggle mobile navigation menu',
		'mobileNav' => 'mobile navigation menu',
	],
	'logo' => [
		'title' => $appName.' Logo',
		'desc' => 'Logo for '.$appName.' (AI prompt manager tool for organizing AI prompts)',
	],
];