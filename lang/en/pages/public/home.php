<?php
$appName = config('app.name');

return [
	'heroSection' => [
		'subtitle' => 'FREE AI Prompt Manager',
		'title' => 'The AI Prompt Manager for Saving and Organizing',
		'decoTitle' => 'prompts',
		'text' => 'Store, organize, and access your AI prompts effortlessly. '.$appName.' helps you manage your prompts for ChatGPT, Midjourney, and other AI tools.',
		'primaryBtn' => 'Start for Free',
		'secondaryBtn' => 'Watch 1-min Tour',
		'bannerImg' => 'AI prompt manager interface ('.$appName.') showing organized AI prompts in categories',
		'videoModal_CloseBtn_ariaLabel' => 'close video',
		'videoModal_videoUnsupported' => 'Your browser does not support HTML video.',
	],
	'featureSection' => [
		'subtitle' => 'Features',
		'title' => 'Everything You Need to Be Organized',
		'text' => 'From organization to quick one-click access, see how '.$appName.' makes managing prompts smooth and simple.',
		'featureCardsTitle' => [
			'promptList_interface' => 'Clean Prompt Overview',
			'promptForm_interface' => 'Quick Prompt Creation & Editing',
			'copying' => 'One-Click Copy to Clipboard',
			'categories' => 'Smart Category Management',
			'security' => 'Private & Secure Storage',
		],
		'featureCardsDesc' => [
			'promptList_interface' => 'Your prompts beautifully organized in a personal library. Filter by categories, use instant search, or browse your complete ChatGPT and Midjourney prompt collection. Switch between light and dark themes for comfortable viewing anytime.',
			'promptForm_interface' => 'Easily create and edit AI prompts through a intuitive form. Label them with titles, choose between prompt types, assign categories, and maintain an orderly prompt library that’s always ready when inspiration strikes.',
			'copying' => 'Copy prompts to clipboard with a single click. Ready to paste into your favorite AI tool',
			'categories' => 'Create custom categories to sort and structure your prompt collection effortlessly.',
			'security' => 'Your prompts are only yours. We store them securely and never share your data with anyone.',
		],
		'featureCardsBtn' => 'Learn More',
		'featureCardsImg' => [
			'promptList_interface' => 'AI prompt library dashboard in dark-mode (in '.$appName.') showing categorized prompts for ChatGPT and Midjourney with search functionality',
			'promptForm_interface' => 'AI prompt form (in '.$appName.') for creating and editing prompts with title, prompt-type selection, category dropdown and content editor',
		],
	],
	'faqSection' => [
		'subtitle' => 'FAQ',
		'title' => 'Frequently Asked Questions',
		'text' => 'Find answers to the most common questions about ' . $appName,
		'faqsQuestion' => [
			/*
			'exampleOfItemWithLink' => 'What browsers are supported?',
			*/
			'0' => 'Is '.$appName.' free to use?',
			'1' => 'How do I get started with '.$appName.'?',
			'2' => 'Which devices and browsers can I use?',
			'3' => 'Will there come new features to '.$appName.'?',
			'4' => 'How secure is my data on '.$appName.'?',
			'5' => 'Which AI tools work with '.$appName.'?',
		],
		'faqsAnswer' => [
			/*
			'exampleOfItemWithLink' => 'Hello. <a href="#" class="underline underline-offset-2 text-primary dark:text-primary-dark">Click here</a> for more info.',
			*/
			'0' => "Yes, ".$appName." is completely free - no subscriptions, no credit card required, no hidden costs. All current features are available at no charge. While we will introduce optional premium features in the future, the core AI prompt management functionality will always remain free.",
			'1' => "Getting started is simple and takes less than a minute! Click 'Sign Up', choose a username (lowercase letters, numbers, and underscores only), enter your email and set a password. That's it — you're in and can start saving and organizing your ChatGPT, Midjourney, and other AI prompts.",
			'2' => "You can access your prompts from anywhere. Simply log into your account using any modern web browser - Chrome, Firefox, Safari, Edge, or others. ".$appName." is fully responsive, ensuring a great experience whether you're on a desktop, tablet, or mobile phone.",
			'3' => $appName." will expand with both free and premium features over time. Planned additions include tags for enhanced organization, AI-powered prompt optimization to help craft perfect prompts, advanced filtering options, export functionality, and secure sharing capabilities with full privacy controls.",
			'4' => "Your AI prompts are protected with modern web security standards. Your data is private by default and will stay that way - even with future sharing features, nothing goes public or gets shared unless you choose it. We don't analyze or sell your data, never share it with third parties, and permanently delete everything if you close your account.",
			'5' => $appName." works as a prompt manager for any AI tool that has a prompt input field. This includes ChatGPT, Claude, Midjourney, DALL-E, Stable Diffusion, and many more AI tools. Whether you're generating text, images, videos, or other content - if it uses prompts, ".$appName." can help you organize those prompts efficiently.",
		],
		'supportMessage' => 'Still have questions? <a href="#" class="underline underline-offset-2 text-primary dark:text-primary-dark">Contact our support</a> for help.',
	],
	'footer' => [
		'otherLinks' => [
			'cookies_and_privacy_policy' => [
				'label' => 'Cookies & Privacy Policy',
			],
			'terms_of_use' => [
				'label' => 'Terms of Use',
			],
		],
		'copyright' => [
			'rights_reserved' => $appName.'. All Rights Reserved.',
		],
		'credits' => [
			'prefix' => 'Developed by',
			'link_label' => 'dgrind.dev',
		],
	],
];