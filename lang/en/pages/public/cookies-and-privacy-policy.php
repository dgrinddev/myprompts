<?php
$appName = config('app.name');
//$legalEmail = config('app.legal_email');
$lastUpdated = config('app.privacy_policy_updated_formatted');

return [
	'header' => [
		'title' => 'Cookies & Privacy Policy',
		'subtitle' => 'Learn how we protect your privacy and handle your data when you use ' . $appName . '.',
		'lastUpdated' => 'Last updated: ' . $lastUpdated,
	],

	'introduction' => [
		'title' => 'Introduction',
		'paragraph1' => 'At ' . $appName . ', we are committed to protecting your privacy and being transparent about how we collect, use, and protect your personal information. This Privacy Policy explains our practices regarding data collection and use when you use our AI prompt management service.',
		'paragraph2' => 'By using ' . $appName . ', you agree to the collection and use of information in accordance with this policy. We will not use or share your information with anyone except as described in this Privacy Policy.',
	],

	'noBanner' => [
		'title' => 'Why We Don\'t Show a Cookie Banner',
		'explanation' => 'You may notice that ' . $appName . ' doesn\'t display a cookie consent banner when you visit our website. This is because we only use "strictly necessary" cookies that are essential for the website to function properly.',
		'notice' => '📝 Since we only use essential cookies required for the basic functionality of the website, no additional consent is needed under GDPR and ePrivacy regulations. You are only informed about these cookies as required by law.',
	],

	'cookies' => [
		'title' => 'Cookies and Similar Technologies',
		'description' => 'We use cookies and similar technologies to provide and improve our service. All cookies we use are essential for the proper functioning of the website and cannot be disabled.',
		'essential' => [
			'title' => 'Essential Cookies',
			'description' => 'These cookies are necessary for the website to function and cannot be switched off in our systems. They are usually only set in response to actions made by you which amount to a request for services:',
		],
		'table' => [
			'name' => 'Cookie Name',
			'purpose' => 'Purpose',
			'lifespan' => 'Lifespan',
			'category' => 'Category',
		],
		'list' => [
			'session' => [
				'name' => 'mypromptsio_session',
				'purpose' => 'Maintains your login session and preserves your data while browsing the website',
				'lifespan' => 'Session (deleted when browser closes)',
				'category' => 'Strictly Necessary',
			],
			'csrf' => [
				'name' => 'XSRF-TOKEN',
				'purpose' => 'Protects against cross-site request forgery (CSRF) attacks for your security',
				'lifespan' => 'Session (deleted when browser closes)',
				'category' => 'Strictly Necessary',
			],
			'auth' => [
				'name' => 'Auth Token (varies)',
				'purpose' => 'Additional authentication token that remembers your login status securely',
				'lifespan' => 'Session (deleted when browser closes)',
				'category' => 'Strictly Necessary',
			],
			'cloudflare' => [
				'name' => '_cfuvid',
				'purpose' => 'Cloudflare session affinity cookie for load balancing and security (set by our hosting provider)',
				'lifespan' => 'Session (deleted when browser closes)',
				'category' => 'Strictly Necessary',
			],
		],
	],

	'dataCollection' => [
		'title' => 'Information We Collect',
		'accountInfo' => [
			'title' => 'Account Information',
			'description' => 'When you create an account, we collect the following information:',
			'items' => [
				'username' => 'Username',
				'email' => 'Email address (for account verification and communication)',
				'password' => 'Password (encrypted and securely stored)',
			],
		],
		'contentData' => [
			'title' => 'Content Data',
			'description' => 'The content you create and manage in your account:',
			'items' => [
				'prompts' => 'AI prompts (title, content, type, and associated metadata)',
				'categories' => 'Categories you create to organize your prompts',
				'settings' => 'Your preferences (color mode, and other customizations)',
			],
		],
		'technicalData' => [
			'title' => 'Technical Information',
			'description' => 'We automatically collect certain technical information:',
			'items' => [
				'ipAddress' => 'IP address (for security and fraud prevention)',
				'browserInfo' => 'Browser type and version',
				'deviceInfo' => 'Device information and screen resolution',
			],
		],
	],

	'dataProcessors' => [
		'title' => 'Data Processors and Third-Party Services',
		'description' => 'We work with trusted data processors to provide our service. These processors only handle your data on our behalf and under strict contractual obligations:',
		'hosting' => [
			'title' => 'Hosting Infrastructure',
			'provider' => [
				'title' => 'Laravel Cloud (Primary Hosting)',
				'description' => 'Our primary hosting provider that stores and processes your data on secure servers.',
			],
			'location' => [
				'title' => 'Server Location',
				'description' => 'EU Central (Frankfurt, Germany) - ensuring your data stays within the European Union.',
			],
			'purpose' => [
				'title' => 'Processing Purpose',
				'description' => 'Website hosting, database management, application processing, and data storage.',
			],
		],
		'cloudflare' => [
			'title' => 'Cloudflare (CDN & Security)',
			'provider' => [
				'title' => 'Cloudflare Inc.',
				'description' => 'Global content delivery network and security provider that processes data as it travels to and from our servers.',
			],
			'services' => [
				'title' => 'Services Provided',
				'cdn' => 'Content Delivery Network (CDN) for faster loading',
				'ddos' => 'DDoS protection and threat mitigation',
				'edge' => 'Edge caching for improved performance',
				'security' => 'Security filtering and bot protection',
			],
			'transfer' => [
				'title' => 'International Data Transfers',
				'description' => 'Cloudflare operates globally and may process data in multiple countries, including outside the EU. Transfers are protected by Standard Contractual Clauses.',
			],
		],
		'legal' => [
			'title' => 'Legal Basis for Processing',
			'description' => 'We process your data through these processors based on Art. 6(1)(b) GDPR (contract performance) and Art. 6(1)(f) GDPR (legitimate interests in providing a secure and efficient service).',
		],
	],

	'dataUsage' => [
		'title' => 'How We Use Your Information',
		'description' => 'We use the collected information for the following purposes:',
		'purposes' => [
			'service' => 'To provide and maintain our AI prompt management service',
			'security' => 'To protect against unauthorized access and ensure account security',
			'communication' => 'To send important messages about your account or our service (such as password resets or terms updates)',
			'legal' => 'To comply with legal obligations and protect our rights',
		],
	],

	'dataSharing' => [
		'title' => 'Information Sharing',
		'noSharing' => 'We do not sell, trade, or otherwise transfer your personal information to third parties for their own purposes. Your prompts and personal data remain private and are never shared with external parties for marketing or commercial purposes.',
		'exceptions' => 'We may only disclose your information in the following limited circumstances:',
		'legal' => [
			'compliance' => 'When required by law or to comply with legal processes',
			'safety' => 'To protect the safety and security of our users or others',
			'consent' => 'With your explicit consent for a specific purpose',
		],
	],

	'security' => [
		'title' => 'Data Security',
		'description' => 'We implement appropriate security measures to protect your personal information:',
		'measures' => [
			'encryption' => 'All data transmission is encrypted using HTTPS/TLS protocols',
			'access' => 'Strict access controls limit who can access your data',
			'monitoring' => 'Regular security monitoring and vulnerability assessments',
			'updates' => 'Regular security updates and best practices implementation',
		],
	],

	'rights' => [
		'title' => 'Your Privacy Rights',
		'description' => 'Under GDPR and other privacy laws, you have the following rights:',
		'access' => [
			'title' => 'Right to Access',
			'description' => 'Request a copy of the personal data we hold about you',
		],
		'rectification' => [
			'title' => 'Right to Rectification',
			'description' => 'Correct any inaccurate or incomplete personal data',
		],
		'erasure' => [
			'title' => 'Right to Erasure',
			'description' => 'Request deletion of your personal data (available in your account settings)',
		],
		'portability' => [
			'title' => 'Right to Data Portability',
			'description' => 'Receive your data in a structured, commonly used format',
		],
		'objection' => [
			'title' => 'Right to Object',
			'description' => 'Object to processing of your personal data in certain circumstances',
		],
	],

	'retention' => [
		'title' => 'Data Retention',
		'description' => 'We retain your information for the following periods:',
		'account' => 'Account data: Until you delete your account or request data deletion',
		'inactive' => 'Inactive accounts: May be deleted after 2 years of inactivity with prior notice',
		'legal' => 'Legal requirements: Some data may be retained longer if required by law',
	],

	'changes' => [
		'title' => 'Changes to This Policy',
		'description' => 'We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated revision date.',
		'notification' => 'For significant changes, we will notify you via email or through a prominent notice in our service.',
	],

	'contact' => [
		'title' => 'Contact Us',
		'description' => 'If you have any questions about this Privacy Policy or wish to exercise your privacy rights, please contact us:',
		'info' => [
			'title' => 'Contact Information:',
			'email' => 'Email: ',
			'response' => 'We will respond to your inquiry within 30 days.',
		],
	],
];
