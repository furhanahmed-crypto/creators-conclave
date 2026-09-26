<?php

$partnerGroups = [
    [
        'id' => 'brands',
        'title' => 'Brand partners',
        'intro' => 'Houses that commission work with a point of view, and stay for the edit.',
        'partners' => [
            ['slug' => 'aureum', 'name' => 'Aureum', 'mark' => 'AU', 'line' => 'Atelier & object'],
            ['slug' => 'orbit', 'name' => 'Orbit', 'mark' => 'OR', 'line' => 'Commerce'],
            ['slug' => 'pulse', 'name' => 'Pulse', 'mark' => 'PU', 'line' => 'Audio'],
        ],
    ],
    [
        'id' => 'sponsors',
        'title' => 'Sponsors',
        'intro' => 'The companies underwriting rooms, stages, and the awards night.',
        'partners' => [
            ['slug' => 'lumen', 'name' => 'Lumen Labs', 'mark' => 'LL', 'line' => 'Light & capture'],
            ['slug' => 'vanta', 'name' => 'Vanta Studio', 'mark' => 'VS', 'line' => 'Post production'],
            ['slug' => 'framehouse', 'name' => 'Framehouse', 'mark' => 'FH', 'line' => 'Cameras'],
        ],
    ],
    [
        'id' => 'media',
        'title' => 'Media partners',
        'intro' => 'Publications and desks that cover the work, not only the guest list.',
        'partners' => [
            ['slug' => 'northline', 'name' => 'Northline', 'mark' => 'NL', 'line' => 'Media house'],
            ['slug' => 'kindred', 'name' => 'Kindred', 'mark' => 'KD', 'line' => 'Culture desk'],
        ],
    ],
    [
        'id' => 'community',
        'title' => 'Community partners',
        'intro' => 'Collectives and guilds that bring working creators into the room.',
        'partners' => [
            ['slug' => 'reel-guild', 'name' => 'Reel Guild', 'mark' => 'RG', 'line' => 'Editors'],
            ['slug' => 'open-mic', 'name' => 'Open Mic Trust', 'mark' => 'OM', 'line' => 'Hosts'],
            ['slug' => 'south-cut', 'name' => 'South Cut', 'mark' => 'SC', 'line' => 'Filmmakers'],
        ],
    ],
];

$partnerStrip = [];
foreach ($partnerGroups as $group) {
    foreach ($group['partners'] as $partner) {
        $partnerStrip[] = $partner;
    }
}
