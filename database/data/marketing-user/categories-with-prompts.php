<?php

/**
 * Marketing kategorier og prompts data til seeding
 * 
 * Denne fil returnerer et array med kategorier og deres tilhørende prompts
 * som kan bruges på tværs af forskellige seeders.
 */

return [
		/*
		[
				'category_id' => 'Graphic Design',
				'prompts' => [
						[
								'title' => "Modern Infographic Design",
								'type' => "image",
								'content' => "Create a modern infographic showcasing [INSERT_TOPIC]. The design should feature clean lines, vibrant colors, and easy-to-read typography. Include visual elements like charts, icons, and data visualizations that support the information. Use a color scheme that reflects [INSERT_BRAND_COLORS] and ensure the layout is optimized for both print and digital platforms.",
						],
						[
								'title' => "Business Card Design Strategy",
								'type' => "text",
								'content' => "Develop a comprehensive business card design strategy for [INSERT_BUSINESS_TYPE]. Consider the target audience, industry standards, and brand personality. Include recommendations for card dimensions, paper quality, color schemes, typography choices, and essential contact information layout. Ensure the design reflects the company's values: [INSERT_VALUES] and stands out in professional networking situations.",
						],
						[
								'title' => "Packaging Design Concept",
								'type' => "image",
								'content' => "Design innovative packaging for [INSERT_PRODUCT_TYPE] that appeals to [INSERT_TARGET_AUDIENCE]. The packaging should incorporate sustainable materials and reflect the brand's commitment to [INSERT_BRAND_VALUES]. Include product information hierarchy, color psychology elements, and shelf appeal considerations. Ensure the design works across different product sizes and variations.",
						],
						[
								'title' => "Print Advertisement Layout",
								'type' => "image",
								'content' => "Create a compelling print advertisement for [INSERT_PRODUCT/SERVICE] targeting [INSERT_DEMOGRAPHIC]. The layout should include a strong headline, persuasive copy, high-quality visuals, and a clear call-to-action. Design for [INSERT_PUBLICATION_TYPE] with dimensions [INSERT_DIMENSIONS]. Incorporate brand guidelines and ensure readability at various sizes.",
						],
						[
								'title' => "Brand Style Guide Creation",
								'type' => "text",
								'content' => "Develop a comprehensive brand style guide for [INSERT_COMPANY_NAME] operating in the [INSERT_INDUSTRY] sector. Include detailed specifications for logo usage, color palettes with hex codes, typography hierarchy, imagery guidelines, and tone of voice. Create usage examples for various applications including digital, print, and merchandise. Ensure consistency across all brand touchpoints and provide clear do's and don'ts for brand implementation.",
						],
				],
		],
		*/
		[
				'category_id' => 'Advertising and Campaigns',
				'prompts' => [
						[
								'title' => "Multi-Channel Campaign Strategy",
								'type' => "text",
								'content' => "Create a comprehensive multi-channel advertising campaign for [INSERT_PRODUCT/SERVICE] with a budget of [INSERT_BUDGET]. The campaign should target [INSERT_TARGET_AUDIENCE] and run for [INSERT_DURATION]. Include strategies for social media, search engines, display advertising, and traditional media. Define key messaging, creative concepts, and success metrics for each channel while maintaining brand consistency throughout.",
						],
						[
								'title' => "Social Media Ad Creative",
								'type' => "image",
								'content' => "Design eye-catching social media advertisements for [INSERT_PLATFORM] promoting [INSERT_PRODUCT/SERVICE]. The creative should appeal to [INSERT_TARGET_DEMOGRAPHIC] and include compelling visuals, minimal text overlay, and a strong call-to-action. Optimize for mobile viewing and ensure the design follows platform-specific guidelines and best practices for engagement.",
						],
						[
								'title' => "Campaign Performance Analysis",
								'type' => "text",
								'content' => "Analyze the performance of [INSERT_CAMPAIGN_NAME] across [INSERT_CHANNELS]. Examine key metrics including reach, engagement, conversion rates, and ROI. Identify top-performing creative elements, audience segments, and channels. Provide actionable insights and recommendations for optimizing future campaigns. Include comparative analysis against industry benchmarks and competitor performance where relevant.",
						],
						[
								'title' => "Influencer Marketing Campaign",
								'type' => "text",
								'content' => "Develop an influencer marketing campaign for [INSERT_BRAND] targeting [INSERT_AUDIENCE]. Identify suitable influencer tiers (micro, macro, mega) based on budget and goals. Create collaboration guidelines, content requirements, and performance metrics. Include contract templates, brand safety measures, and strategies for authentic content creation that aligns with brand values: [INSERT_VALUES].",
						],
						[
								'title' => "Retargeting Campaign Setup",
								'type' => "text",
								'content' => "Design a comprehensive retargeting campaign strategy for [INSERT_WEBSITE/PRODUCT]. Create audience segments based on user behavior, page visits, and engagement levels. Develop personalized messaging for each segment and design creative assets that encourage conversion. Include frequency capping, budget allocation, and A/B testing strategies to maximize campaign effectiveness and minimize ad fatigue.",
						],
						[
								'title' => "Video Advertisement Script",
								'type' => "text",
								'content' => "Write a compelling video advertisement script for [INSERT_PRODUCT/SERVICE] with a duration of [INSERT_LENGTH]. The script should hook viewers within the first 3 seconds, clearly communicate the value proposition, and end with a strong call-to-action. Include visual cues, music suggestions, and pacing notes. Ensure the message resonates with [INSERT_TARGET_AUDIENCE] and aligns with brand personality.",
						],
				],
		],
		/*
		[
				'category_id' => 'Email Marketing',
				'prompts' => [
						[
								'title' => "Welcome Email Series",
								'type' => "text",
								'content' => "Create a 5-email welcome series for new subscribers to [INSERT_BUSINESS_NAME]. Each email should progressively introduce the brand, showcase key products/services, and nurture the relationship. Include personalization elements, valuable content, and strategic calls-to-action. Design the sequence to maximize engagement and guide subscribers toward their first purchase or desired action.",
						],
						[
								'title' => "Newsletter Template Design",
								'type' => "image",
								'content' => "Design a professional newsletter template for [INSERT_COMPANY] that can be used monthly. The template should include sections for featured content, product highlights, company updates, and social media links. Use brand colors [INSERT_COLORS] and ensure mobile responsiveness. Include placeholder areas for different content types and maintain visual hierarchy for easy scanning.",
						],
						[
								'title' => "Cart Abandonment Recovery",
								'type' => "text",
								'content' => "Develop a cart abandonment email sequence for [INSERT_ECOMMERCE_STORE]. Create 3 emails with increasing urgency and incentives to complete the purchase. Include personalized product recommendations, social proof, and address common purchase hesitations. Design each email with clear visuals of abandoned items and compelling calls-to-action that drive conversions.",
						],
						[
								'title' => "Email Segmentation Strategy",
								'type' => "text",
								'content' => "Create a comprehensive email segmentation strategy for [INSERT_BUSINESS_TYPE] with a subscriber base of [INSERT_SIZE]. Define segments based on demographics, behavior, purchase history, and engagement levels. Develop tailored messaging and content strategies for each segment. Include automation triggers and personalization tactics to improve open rates, click-through rates, and conversions.",
						],
						[
								'title' => "Re-engagement Campaign",
								'type' => "text",
								'content' => "Design a re-engagement campaign for inactive subscribers who haven't opened emails in [INSERT_TIMEFRAME]. Create a series of compelling subject lines and email content that reignites interest in [INSERT_BRAND]. Include special offers, content previews, and feedback requests. Develop a sunset policy for subscribers who remain unengaged after the campaign.",
						],
				],
		],
		*/
		[
				'category_id' => 'Blog Posts',
				'prompts' => [
						[
								'title' => "Industry Trend Analysis",
								'type' => "text",
								'content' => "Write a comprehensive blog post analyzing the latest trends in [INSERT_INDUSTRY] for 2024. Include statistical data, expert opinions, and predictions for the coming year. Structure the post with clear headings, bullet points, and actionable insights that readers can implement. Optimize for SEO with relevant keywords and include internal links to related content on the website.",
						],
						[
								'title' => "How-to Guide Creation",
								'type' => "text",
								'content' => "Create a detailed how-to guide for [INSERT_TOPIC] targeting [INSERT_AUDIENCE_LEVEL]. Break down the process into clear, numbered steps with explanations and tips. Include necessary tools, common mistakes to avoid, and troubleshooting advice. Add relevant images, screenshots, or diagrams to support the instructions. Ensure the content is comprehensive yet accessible to beginners.",
						],
						[
								'title' => "Case Study Template",
								'type' => "text",
								'content' => "Develop a compelling case study showcasing how [INSERT_CLIENT/CUSTOMER] achieved [INSERT_RESULTS] using [INSERT_PRODUCT/SERVICE]. Structure the post with challenge, solution, implementation, and results sections. Include specific metrics, testimonials, and visual elements like before/after comparisons. Make the content relatable to prospects facing similar challenges.",
						],
						[
								'title' => "Thought Leadership Article",
								'type' => "text",
								'content' => "Write a thought-provoking article establishing [INSERT_COMPANY/PERSON] as a leader in [INSERT_FIELD]. Address a controversial or emerging topic with a unique perspective backed by experience and data. Include personal anecdotes, industry insights, and future predictions. Structure the content to encourage discussion and social sharing while positioning the author as an expert.",
						],
						[
								'title' => "Product Comparison Post",
								'type' => "text",
								'content' => "Create an unbiased comparison post between [INSERT_PRODUCTS/SERVICES] in the [INSERT_CATEGORY] space. Include feature comparisons, pricing analysis, pros and cons, and use case scenarios. Present information in easy-to-scan tables and visual formats. Conclude with recommendations for different user types and situations while maintaining objectivity throughout the comparison.",
						],
				],
		],
		[
				'category_id' => 'Logo and Branding',
				'prompts' => [
						[
								'title' => "Unique Logo for Startup",
								'type' => "image",
								'content' => "Design a unique logo for a startup in the [INSERT_INDUSTRY] industry. The logo should reflect the core values of [INSERT_VALUES]. Include elements like [INSERT_ELEMENT] to represent the industry. Use a color palette that reflects the company's mission: [INSERT_MISSION_STATEMENT]",
						],
						[
								'title' => "Brand Identity System",
								'type' => "text",
								'content' => "Develop a comprehensive brand identity system for [INSERT_COMPANY] in the [INSERT_INDUSTRY] sector. Create a cohesive visual language that includes logo variations, color palette, typography hierarchy, iconography, and imagery style. Define brand personality traits and tone of voice guidelines. Ensure all elements work harmoniously across digital and print applications while differentiating from competitors.",
						],
						[
								'title' => "Logo Redesign Strategy",
								'type' => "text",
								'content' => "Create a strategic approach for redesigning the logo of [INSERT_ESTABLISHED_COMPANY]. Analyze the current brand perception, market position, and evolution needs. Propose design directions that honor brand heritage while modernizing for contemporary audiences. Include implementation timeline, stakeholder communication plan, and guidelines for transitioning from old to new logo across all touchpoints.",
						],
						[
								'title' => "Minimalist Logo Design",
								'type' => "image",
								'content' => "Create a minimalist logo for [INSERT_BUSINESS_NAME] specializing in [INSERT_SERVICE]. The design should embody simplicity and elegance while being memorable and scalable. Use no more than 2-3 colors and ensure the logo works in monochrome. Focus on clean geometry and negative space utilization. The final design should be versatile for both digital and print applications.",
						],
						[
								'title' => "Brand Color Psychology",
								'type' => "text",
								'content' => "Develop a color strategy for [INSERT_BRAND] based on psychological principles and target audience preferences. Analyze how different colors affect consumer behavior in the [INSERT_INDUSTRY] market. Create a primary and secondary color palette with specific use cases for each color. Include accessibility considerations and provide hex codes, RGB values, and Pantone matches for consistent reproduction.",
						],
						[
								'title' => "Typography Brand System",
								'type' => "text",
								'content' => "Design a comprehensive typography system for [INSERT_BRAND] that reflects their personality: [INSERT_BRAND_TRAITS]. Select primary and secondary typefaces that work across all media. Create a hierarchy system for headlines, subheadings, body text, and captions. Include pairing recommendations, spacing guidelines, and usage rules. Ensure accessibility and readability across different devices and platforms.",
						],
						[
								'title' => "Brand Mascot Character",
								'type' => "image",
								'content' => "Design a friendly and memorable mascot character for [INSERT_BRAND] targeting [INSERT_AUDIENCE]. The mascot should embody brand values: [INSERT_VALUES] and be versatile for various marketing applications. Create multiple expressions and poses that can be used across social media, packaging, and promotional materials. Ensure the character is culturally appropriate and appealing to the target demographic.",
						],
						[
								'title' => "Luxury Brand Identity",
								'type' => "text",
								'content' => "Develop a sophisticated brand identity for a luxury [INSERT_PRODUCT_CATEGORY] brand. Create an identity that conveys exclusivity, craftsmanship, and premium quality. Define elegant typography, refined color palettes, and premium material specifications. Include guidelines for photography style, copywriting tone, and customer experience touchpoints that maintain the luxury positioning throughout all interactions.",
						],
						[
								'title' => "Brand Icon Set",
								'type' => "image",
								'content' => "Create a cohesive set of 12 custom icons for [INSERT_BRAND] representing their key services/features: [INSERT_SERVICES]. The icons should follow a consistent style with similar line weights, corner radius, and visual approach. Design them to work at various sizes from 16px to 64px while maintaining clarity. Use the brand colors: [INSERT_COLORS] and ensure they complement the overall brand aesthetic.",
						],
						[
								'title' => "Brand Positioning Statement",
								'type' => "text",
								'content' => "Craft a compelling brand positioning statement for [INSERT_COMPANY] that clearly differentiates them in the [INSERT_MARKET] space. Define the target audience, competitive frame of reference, unique value proposition, and supporting reasons to believe. Create a concise statement that can guide all marketing communications and brand decisions. Include messaging variations for different audience segments and use cases.",
						],
						[
								'title' => "Rebranding Communication Plan",
								'type' => "text",
								'content' => "Develop a comprehensive communication strategy for [INSERT_COMPANY]'s rebranding initiative. Create messaging for different stakeholder groups including employees, customers, partners, and media. Design a rollout timeline with key milestones and communication touchpoints. Include crisis management protocols for potential negative reactions and strategies for building excitement and buy-in for the new brand direction.",
						],
						[
								'title' => "Brand Application Guidelines",
								'type' => "text",
								'content' => "Create detailed brand application guidelines for [INSERT_BRAND] covering all potential use cases. Include specifications for business cards, letterheads, signage, vehicle wraps, uniforms, and digital applications. Define minimum sizes, clear space requirements, and approved/prohibited uses. Provide templates and examples for common applications while maintaining brand consistency across all touchpoints.",
						],
						[
								'title' => "Eco-Friendly Brand Symbol",
								'type' => "image",
								'content' => "Design an eco-friendly brand symbol for [INSERT_SUSTAINABLE_COMPANY] that represents their commitment to environmental responsibility. Incorporate natural elements like leaves, water, or earth tones while maintaining modern aesthetics. The symbol should work independently or alongside the company name. Use organic shapes and sustainable color palettes that reflect the brand's environmental values and mission.",
						],
				],
		],
		[
				'category_id' => 'Social Media Posts',
				'prompts' => [
						[
								'title' => "Instagram Story Series",
								'type' => "image",
								'content' => "Create a cohesive Instagram Story series (5 slides) showcasing [INSERT_TOPIC] for [INSERT_BRAND]. Each slide should maintain visual consistency with brand colors and fonts while providing valuable information or entertainment. Include interactive elements like polls, questions, or swipe-up features. Design for optimal mobile viewing with clear hierarchy and engaging visuals that encourage story completion.",
						],
						[
								'title' => "LinkedIn Professional Post",
								'type' => "text",
								'content' => "Write a professional LinkedIn post about [INSERT_INDUSTRY_TOPIC] that positions [INSERT_PERSON/COMPANY] as a thought leader. Include personal insights, industry statistics, and actionable advice. Structure the post with line breaks for easy reading and include relevant hashtags. End with a question to encourage engagement and discussion among professional connections.",
						],
						[
								'title' => "Twitter Thread Strategy",
								'type' => "text",
								'content' => "Create a compelling Twitter thread (8-10 tweets) explaining [INSERT_COMPLEX_TOPIC] in an accessible way. Break down the information into digestible pieces with clear transitions between tweets. Include relevant emojis, hashtags, and mentions where appropriate. Design the thread to provide value while encouraging retweets and engagement throughout the sequence.",
						],
						[
								'title' => "Facebook Event Promotion",
								'type' => "image",
								'content' => "Design an engaging Facebook event cover image and promotional post for [INSERT_EVENT_NAME]. The visual should include event details, date, time, and location in an eye-catching layout. Use colors and imagery that reflect the event's atmosphere and appeal to the target audience. Create urgency and excitement while maintaining brand consistency with [INSERT_BRAND] guidelines.",
						],
						[
								'title' => "TikTok Content Strategy",
								'type' => "text",
								'content' => "Develop a TikTok content strategy for [INSERT_BRAND] targeting [INSERT_DEMOGRAPHIC]. Create concepts for 10 different video types that align with current trends while showcasing products/services. Include hashtag strategies, posting schedules, and engagement tactics. Focus on authentic, entertaining content that encourages user participation and viral potential.",
						],
				],
		],
		[
				'category_id' => 'SEO Optimization',
				'prompts' => [
						[
								'title' => "Keyword Research Strategy",
								'type' => "text",
								'content' => "Conduct comprehensive keyword research for [INSERT_WEBSITE] in the [INSERT_INDUSTRY] niche. Identify primary keywords, long-tail variations, and semantic related terms. Analyze search volume, competition level, and user intent for each keyword. Create a keyword mapping strategy that aligns with content calendar and business objectives. Include local SEO keywords if applicable to [INSERT_LOCATION].",
						],
						[
								'title' => "On-Page SEO Audit",
								'type' => "text",
								'content' => "Perform a detailed on-page SEO audit for [INSERT_URL]. Analyze title tags, meta descriptions, header structure, internal linking, and content optimization. Identify technical issues affecting search performance including page speed, mobile responsiveness, and crawlability. Provide prioritized recommendations with implementation steps and expected impact on search rankings.",
						],
						[
								'title' => "Local SEO Optimization",
								'type' => "text",
								'content' => "Optimize [INSERT_LOCAL_BUSINESS] for local search results in [INSERT_CITY/REGION]. Create Google My Business optimization strategy, local citation building plan, and location-specific content recommendations. Include review management tactics and local keyword integration. Develop strategies for appearing in local pack results and voice search queries.",
						],
						[
								'title' => "Content Gap Analysis",
								'type' => "text",
								'content' => "Identify content gaps and opportunities for [INSERT_WEBSITE] compared to top competitors in [INSERT_INDUSTRY]. Analyze competitor content strategies, keyword rankings, and content formats. Recommend new content topics, formats, and optimization strategies to capture untapped search traffic. Prioritize opportunities based on search volume and competitive difficulty.",
						],
						[
								'title' => "Technical SEO Checklist",
								'type' => "text",
								'content' => "Create a comprehensive technical SEO checklist for [INSERT_WEBSITE_TYPE]. Include site structure optimization, XML sitemaps, robots.txt configuration, and schema markup implementation. Address Core Web Vitals, crawl budget optimization, and indexation issues. Provide step-by-step instructions for technical implementations and tools for monitoring performance improvements.",
						],
						[
								'title' => "Link Building Campaign",
								'type' => "text",
								'content' => "Design a white-hat link building campaign for [INSERT_WEBSITE] targeting [INSERT_KEYWORDS]. Identify high-authority websites in the [INSERT_INDUSTRY] space for outreach opportunities. Create content assets that naturally attract backlinks including infographics, research studies, and resource guides. Develop outreach templates and relationship building strategies for sustainable link acquisition.",
						],
				],
		],
		/*
		[
				'category_id' => 'Product Descriptions',
				'prompts' => [
						[
								'title' => "E-commerce Product Copy",
								'type' => "text",
								'content' => "Write compelling product descriptions for [INSERT_PRODUCT_NAME] targeting [INSERT_TARGET_CUSTOMER]. Highlight key features, benefits, and unique selling points that differentiate from competitors. Include technical specifications, usage instructions, and care information where relevant. Optimize for search engines with relevant keywords while maintaining natural, persuasive copy that drives conversions.",
						],
						[
								'title' => "Luxury Product Positioning",
								'type' => "text",
								'content' => "Create sophisticated product descriptions for luxury [INSERT_PRODUCT_CATEGORY] that justify premium pricing. Focus on craftsmanship, heritage, and exclusive features that appeal to affluent customers. Use elevated language and sensory details that create desire and perceived value. Include storytelling elements about the brand's history or the artisan process behind the product creation.",
						],
						[
								'title' => "Technical Product Specs",
								'type' => "text",
								'content' => "Develop detailed technical specifications for [INSERT_TECHNICAL_PRODUCT] aimed at professional buyers. Include precise measurements, performance data, compatibility information, and industry certifications. Present complex information in an organized, scannable format with bullet points and tables. Balance technical accuracy with accessibility for decision-makers who may not be technical experts.",
						],
						[
								'title' => "Benefit-Focused Copy",
								'type' => "text",
								'content' => "Write benefit-focused product descriptions for [INSERT_PRODUCT] that address specific customer pain points: [INSERT_PAIN_POINTS]. Transform features into meaningful benefits that resonate with the target audience's needs and desires. Include social proof elements and risk-reduction statements. Structure the copy to guide readers toward purchase with clear calls-to-action.",
						],
						[
								'title' => "Bundle Product Description",
								'type' => "text",
								'content' => "Create compelling copy for a product bundle containing [INSERT_PRODUCTS] with a value proposition of [INSERT_VALUE_PROP]. Explain how the products work together synergistically and highlight the cost savings compared to individual purchases. Address potential objections about bundle necessity and create urgency around the limited-time offer. Include clear breakdown of individual vs. bundle pricing.",
						],
				],
		],
		*/
];