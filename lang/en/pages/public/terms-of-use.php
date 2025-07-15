<?php
$appName = config('app.name');
//$legalEmail = config('app.legal_email');
$lastUpdated = config('app.terms_of_use_updated_formatted');

return [
	'header' => [
		'title' => 'Terms of Use',
		'subtitle' => 'Please read these terms carefully before using ' . $appName . '. By using our service, you agree to be bound by these terms.',
		'lastUpdated' => 'Last updated: ' . $lastUpdated,
	],

	'introduction' => [
		'title' => 'Agreement to Terms',
		'paragraph1' => 'These Terms of Use ("Terms") govern your use of ' . $appName . ' (the "Service"), operated by us ("we," "us," or "our"). The Service provides a platform for managing and organizing AI prompts.',
		'paragraph2' => 'By accessing or using our Service, you agree to be bound by these Terms. If you disagree with any part of these terms, then you may not access the Service.',
		'paragraph3' => 'These Terms apply to all visitors, users, and others who access or use the Service, whether as a guest or registered user.',
	],

	'service' => [
		'title' => 'Description of Service',
		'description' => $appName . ' is a web-based application that allows users to store, organize, and manage AI prompts for various artificial intelligence tools and platforms.',
		'features' => 'Our Service includes the following features:',
		'featuresList' => [
			'storage' => 'Secure storage of AI prompts with categorization',
			'organization' => 'Tools to organize prompts by categories and custom metadata',
			'management' => 'User account management with personal settings and preferences',
			'access' => 'Cross-device access to your prompt library through web browsers',
		],
	],

	'account' => [
		'title' => 'Account Registration and Security',
		'registration' => 'To access certain features of the Service, you must register for an account. You may be required to provide certain personal information, including a valid email address and username.',
		'requirements' => 'When you create an account, you agree to:',
		'requirementsList' => [
			'age' => 'Be at least 13 years old (or the minimum age required in your jurisdiction)',
			'accurate' => 'Provide accurate, current, and complete information',
			'secure' => 'Maintain the security of your password and accept all risks of unauthorized access',
			'responsible' => 'Take responsibility for all activities that occur under your account',
		],
		'security' => 'You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. Please notify us immediately of any unauthorized use of your account.',
	],

	'usage' => [
		'title' => 'Acceptable Use',
		'permitted' => [
			'title' => 'Permitted Use',
			'description' => 'You may use the Service for lawful purposes, including:',
			'list' => [
				'personal' => 'Personal organization and management of AI prompts',
				'professional' => 'Professional work and business-related prompt management',
				'educational' => 'Educational and research purposes',
				'creative' => 'Creative projects and content development',
			],
		],
		'prohibited' => [
			'title' => 'Prohibited Activities',
			'description' => 'You agree not to use the Service to:',
			'list' => [
				'illegal' => 'Engage in any illegal activities or violate any applicable laws',
				'harmful' => 'Upload or store content that is harmful, threatening, or promotes violence',
				'harassment' => 'Harass, abuse, or harm other users or individuals',
				'spam' => 'Send spam, unsolicited communications, or promotional materials',
				'malware' => 'Distribute viruses, malware, or other malicious software',
				'reverse' => 'Reverse engineer, decompile, or attempt to extract source code',
				'overload' => 'Overload or interfere with the proper functioning of our servers',
			],
		],
	],

	'content' => [
		'title' => 'Content and Intellectual Property',
		'ownership' => [
			'title' => 'Your Content',
			'description' => 'You retain all rights to the content you create, upload, or store in the Service, including your AI prompts, categories, and other materials. We do not claim ownership of your content.',
		],
		'responsibility' => [
			'title' => 'Content Responsibility',
			'description' => 'You are solely responsible for the content you store in the Service. You represent and warrant that you have all necessary rights to use and store such content and that it does not violate any third-party rights or applicable laws.',
		],
		'backup' => [
			'title' => 'Content Backup',
			'description' => 'While we implement reasonable backup procedures, you are responsible for maintaining your own copies of important content. We recommend regularly exporting or backing up your prompts and other data.',
		],
	],

	'intellectualProperty' => [
		'title' => 'Intellectual Property Rights',
		'platform' => [
			'title' => 'Platform Ownership',
			'description' => 'The Service, including but not limited to its design, code, features, functionality, user interface, and overall "look and feel" are owned by us and are protected by copyright, trademark, and other intellectual property laws. You may not copy, modify, distribute, sell, or reverse engineer any part of the Service.',
		],
		'proprietary' => [
			'title' => 'Proprietary Technology',
			'description' => 'The underlying technology, algorithms, software code, and business methods that power ' . $appName . ' are proprietary and confidential. Any attempt to access, copy, reverse engineer, or use our systems to create competing services is strictly prohibited.',
		],
		'userContent' => [
			'title' => 'Your Content vs. Our Platform',
			'description' => 'While you retain ownership of your prompts and content as stated above, this does not grant you any rights to our platform technology, features, or methodologies. The platform itself remains our exclusive intellectual property.',
		],
	],

	'availability' => [
		'title' => 'Service Availability',
		'effort' => 'We strive to maintain high availability of the Service, but we cannot guarantee uninterrupted access. The Service may be temporarily unavailable due to maintenance, updates, or technical issues.',
		'infrastructure' => 'Our Service is hosted on professional cloud infrastructure (Laravel Cloud with Cloudflare) located in the EU (Frankfurt, Germany), which provides reliable performance and security.',
		'interruptions' => 'Service interruptions may occur for various reasons, including:',
		'reasons' => [
			'maintenance' => 'Scheduled maintenance and system updates',
			'technical' => 'Technical difficulties or server issues',
			'security' => 'Security measures or investigations',
			'legal' => 'Legal requirements or compliance obligations',
			'provider' => 'Third-party infrastructure provider outages or maintenance',
		],
		'notification' => 'We will make reasonable efforts to provide advance notice of planned maintenance when possible.',
	],

	'privacy' => [
		'title' => 'Privacy and Data Protection',
		'overview' => 'Your privacy is important to us. The collection, use, and protection of your personal information is governed by our separate Privacy Policy, which forms an integral part of these Terms.',
		'reference' => [
			'title' => 'Privacy Policy Reference',
			'description' => 'For detailed information about how we collect, use, store, and protect your personal data, including information about cookies, data processors, and your rights under GDPR, please read our Privacy Policy.',
		],
		'compliance' => 'By using our Service, you acknowledge that you have read and understood our Privacy Policy and consent to the data practices described therein.',
	],

	'termination' => [
		'title' => 'Account Termination',
		'byUser' => [
			'title' => 'Termination by You',
			'description' => 'You may terminate your account at any time through your account settings. Upon termination, your account and all associated data will be permanently deleted.',
		],
		'byUs' => [
			'title' => 'Termination by Us',
			'description' => 'We may terminate or suspend your account immediately, without prior notice, for the following reasons:',
			'reasons' => [
				'violation' => 'Violation of these Terms of Use',
				'illegal' => 'Engaging in illegal activities through the Service',
				'inactive' => 'Account inactivity for an extended period (with prior notice)',
				'discretion' => 'At our sole discretion for business or legal reasons',
			],
		],
		'effect' => [
			'title' => 'Effect of Termination',
			'description' => 'Upon termination, your right to use the Service will cease immediately, and all your data may be deleted from our servers. Provisions that should survive termination will remain in effect.',
		],
	],

	'disclaimers' => [
		'title' => 'Disclaimers and Limitations',
		'warranty' => [
			'title' => 'No Warranty',
			'description' => 'The Service is provided "as is" without any warranties of any kind. We disclaim all warranties, express or implied, including merchantability, fitness for a particular purpose, and non-infringement.',
		],
		'liability' => [
			'title' => 'Limitation of Liability',
			'description' => 'To the maximum extent permitted by law, we shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of the Service.',
		],
		'thirdParty' => [
			'title' => 'Third-Party Services',
			'description' => 'The Service may contain links to third-party websites or services. We are not responsible for the content, privacy policies, or practices of any third-party services.',
		],
	],

	'changes' => [
		'title' => 'Changes to Terms',
		'description' => 'We reserve the right to modify or replace these Terms at any time. Changes will be posted on this page with an updated revision date.',
		'notification' => 'For significant changes, we will provide at least 30 days notice through email or a prominent notice in the Service.',
		'continued' => 'Your continued use of the Service after any changes to these Terms constitutes acceptance of those changes.',
	],

	'law' => [
		'title' => 'Governing Law',
		'governing' => 'These Terms shall be governed by and construed in accordance with applicable laws, without regard to conflict of law principles.',
		'disputes' => 'Any disputes arising from these Terms or your use of the Service will be resolved through binding arbitration or in appropriate courts.',
	],

	'contact' => [
		'title' => 'Contact Information',
		'description' => 'If you have any questions about these Terms of Use, please contact us:',
		'info' => [
			'title' => 'Contact Information:',
			'email' => 'Email: ',
			'response' => 'We will respond to your inquiry within 5 business days.',
		],
	],
];
