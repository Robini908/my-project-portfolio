<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        // Sample skills data
        $skills = [
            [
                'name' => 'Frontend Development',
                'percentage' => 90,
                'progress' => 237.6, // 90% of 264 (2 * π * 42)
                'color' => 'text-indigo-500'
            ],
            [
                'name' => 'Backend Development',
                'percentage' => 85,
                'progress' => 224.4, // 85% of 264
                'color' => 'text-purple-500'
            ],
            [
                'name' => 'UI/UX Design',
                'percentage' => 80,
                'progress' => 211.2, // 80% of 264
                'color' => 'text-blue-500'
            ],
            [
                'name' => 'Database Management',
                'percentage' => 75,
                'progress' => 198, // 75% of 264
                'color' => 'text-pink-500'
            ]
        ];

        // Sample skill categories
        $skillCategories = [
            [
                'title' => 'Frontend Development',
                'description' => 'Building responsive and interactive web applications',
                'icon' => '<svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                'items' => [
                    [
                        'name' => 'HTML5',
                        'logo' => '/images/skills/html5.svg'
                    ],
                    [
                        'name' => 'CSS3',
                        'logo' => '/images/skills/css3.svg'
                    ],
                    [
                        'name' => 'JavaScript',
                        'logo' => '/images/skills/javascript.svg'
                    ]
                ]
            ],
            [
                'title' => 'Backend Development',
                'description' => 'Creating robust and scalable server-side applications',
                'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>',
                'items' => [
                    [
                        'name' => 'PHP',
                        'logo' => '/images/skills/php.svg'
                    ],
                    [
                        'name' => 'Laravel',
                        'logo' => '/images/skills/laravel.svg'
                    ],
                    [
                        'name' => 'MySQL',
                        'logo' => '/images/skills/mysql.svg'
                    ]
                ]
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Creating beautiful and intuitive user interfaces',
                'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>',
                'items' => [
                    [
                        'name' => 'Figma',
                        'logo' => '/images/skills/figma.svg'
                    ],
                    [
                        'name' => 'Adobe XD',
                        'logo' => '/images/skills/adobe-xd.svg'
                    ],
                    [
                        'name' => 'Sketch',
                        'logo' => '/images/skills/sketch.svg'
                    ]
                ]
            ]
        ];

        return view('portfolio.index', compact('skills', 'skillCategories'));
    }
}
