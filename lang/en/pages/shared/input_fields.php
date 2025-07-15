<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Input Fields Language Lines
    |--------------------------------------------------------------------------
    |
    | Disse language lines er brugt til at bestemme følgende for input felter: label (label-elementet, labels for options, aria-label), placeholder, title/popover, value (hvis der er en standard værdi), description (aria-description eller en synlig beskrivelse udover label).
    | BEMÆRK: validerings-meddelser findes i `lang/en/validation.php`
    |
    */

		// eksempel: placeholder til et input med name "eksempel-navn" har short key "eksempel_navn.placeholder"
		'eksempel_navn' => [
			'placeholder' => 'bla bla bla bla bla bla bla bla ',
		],
		// eksempel: et input med name "eksempel-navn2"
		'eksempel_navn2' => array_merge(
			// eksempel hvor label-elementet og aria-label har samme værdi
			array_fill_keys(['label', 'aria_label'], 'Her er et label bla bla bla bla bla bla'),
			// Anden gruppe med en anden fælles værdi
			array_fill_keys(['description', 'aria_description'], 'Her er en beskrivelse bla bla bla bla bla bla'),
			// Individuelle værdier
			[
				'title' => 'Dette er en titel bla bla bla bla bla bla',
				'placeholder' => 'Dette er en placeholder bla bla bla bla bla bla',
			],
		),

];