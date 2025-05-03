<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AIController extends Controller
{
    /**
     * API endpoint for text summarization
     */
    public function summarize(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string|min:50',
            'max_length' => 'nullable|integer|min:10|max:2000',
            'model' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            // In a real implementation, this would call an AI service API
            // For demonstration, we'll create a simple summary

            $text = $request->text;
            $maxLength = $request->max_length ?? 1000;

            // Simple extractive summarization
            $sentences = preg_split('/(?<=[.?!])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
            $sentences = array_filter($sentences, function($sentence) {
                return strlen(trim($sentence)) > 10;
            });

            // Use about 30% of the original sentences
            $sentenceCount = max(1, floor(count($sentences) * 0.3));
            $summarySentences = array_slice($sentences, 0, $sentenceCount);

            return response()->json([
                'summary' => implode(' ', $summarySentences),
                'original_length' => strlen($text),
                'summary_length' => strlen(implode(' ', $summarySentences)),
                'reduction_percentage' => round((1 - strlen(implode(' ', $summarySentences)) / strlen($text)) * 100)
            ]);
        } catch (\Exception $e) {
            Log::error('Summarization error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate summary'], 500);
        }
    }

    /**
     * API endpoint for image analysis
     */
    public function analyzeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:5120',
            'image_url' => 'nullable|url',
            'detect_faces' => 'nullable|boolean',
            'detect_objects' => 'nullable|boolean',
            'generate_caption' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            // Validate that we have either an image file or URL
            if (!$request->hasFile('image') && !$request->image_url) {
                return response()->json(['error' => 'No image provided'], 422);
            }

            // In a real implementation, you would send the image to an AI service
            // For demonstration, return mock data

            $mockResults = [
                'caption' => 'A sample image showing various elements in a creative composition.',
                'objects' => [
                    ['label' => 'person', 'confidence' => 0.95, 'box' => [10, 10, 100, 200]],
                    ['label' => 'computer', 'confidence' => 0.87, 'box' => [150, 50, 300, 200]],
                ],
                'faces' => [
                    ['confidence' => 0.98, 'box' => [20, 20, 80, 80], 'emotions' => ['happy' => 0.87]],
                ],
                'tags' => ['technology', 'workspace', 'modern', 'design'],
                'dominant_colors' => ['#4B0082', '#800080', '#000000'],
                'processing_time_ms' => rand(300, 1200)
            ];

            return response()->json($mockResults);
        } catch (\Exception $e) {
            Log::error('Image analysis error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to analyze image'], 500);
        }
    }

    /**
     * API endpoint for code explanation
     */
    public function explainCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'language' => 'required|string',
            'level' => 'nullable|string|in:beginner,intermediate,advanced',
            'include_performance' => 'nullable|boolean',
            'highlight_issues' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $code = $request->code;
            $language = $request->language;
            $level = $request->level ?? 'intermediate';

            // In a real implementation, you would call a code analysis AI
            // For demonstration, we'll generate a basic explanation based on the language

            $explanations = [];
            $overview = '';

            switch (strtolower($language)) {
                case 'javascript':
                    $overview = 'This JavaScript code appears to ';
                    if (strpos($code, 'function') !== false) {
                        $overview .= 'define functions for handling data processing.';
                        $explanations[] = 'The function declarations establish reusable blocks of code.';
                    } elseif (strpos($code, 'class') !== false) {
                        $overview .= 'create a class with object-oriented principles.';
                        $explanations[] = 'The class structure encapsulates related functionality.';
                    } elseif (strpos($code, 'fetch') !== false || strpos($code, 'XMLHttpRequest') !== false) {
                        $overview .= 'make API requests to retrieve data from a server.';
                        $explanations[] = 'The networking code handles asynchronous data fetching.';
                    } else {
                        $overview .= 'manipulate data and control program flow.';
                    }
                    break;

                case 'php':
                    $overview = 'This PHP code appears to ';
                    if (strpos($code, 'function') !== false) {
                        $overview .= 'define server-side functions for data processing.';
                    } elseif (strpos($code, 'class') !== false) {
                        $overview .= 'implement object-oriented programming principles with classes.';
                    } elseif (strpos($code, '$_POST') !== false || strpos($code, '$_GET') !== false) {
                        $overview .= 'handle form submissions or URL parameters.';
                    } else {
                        $overview .= 'process server-side logic.';
                    }
                    break;

                default:
                    $overview = "This {$language} code implements various programming concepts.";
            }

            // Add some generic explanations based on code patterns
            if (strpos($code, 'for') !== false || strpos($code, 'while') !== false) {
                $explanations[] = 'Loop structures are used to iterate over collections of data.';
            }

            if (strpos($code, 'if') !== false) {
                $explanations[] = 'Conditional statements control the flow of execution based on specific criteria.';
            }

            if (strpos($code, 'try') !== false) {
                $explanations[] = 'Error handling is implemented to gracefully manage exceptions.';
            }

            // Add performance considerations if requested
            $performance = [];
            if ($request->include_performance) {
                $performance = [
                    'This code appears to have O(n) time complexity.',
                    'Memory usage is efficient with minimal allocation.',
                    'Consider caching results for repeated operations.'
                ];
            }

            // Identify potential issues if requested
            $issues = [];
            if ($request->highlight_issues) {
                if (strpos($code, 'console.log') !== false) {
                    $issues[] = 'Debug statements (console.log) should be removed in production code.';
                }

                if (strpos($code, 'TODO') !== false) {
                    $issues[] = 'Code contains TODO comments indicating incomplete implementation.';
                }

                if (strlen($code) > 500 && substr_count($code, "\n") < 5) {
                    $issues[] = 'Code formatting could be improved with better line breaks and indentation.';
                }
            }

            return response()->json([
                'overview' => $overview,
                'explanations' => $explanations,
                'performance_considerations' => $performance,
                'potential_issues' => $issues,
                'complexity_level' => $level
            ]);
        } catch (\Exception $e) {
            Log::error('Code explanation error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to explain code'], 500);
        }
    }

    /**
     * API endpoint for sentiment analysis
     */
    public function analyzeSentiment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
            'detailed' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $text = $request->text;
            $detailed = $request->detailed ?? false;

            // In a real implementation, you would use a real sentiment analysis model
            // For demonstration, we'll use a simple keyword-based approach

            $positiveWords = ['good', 'great', 'excellent', 'amazing', 'wonderful', 'love', 'best', 'happy', 'positive', 'impressive'];
            $negativeWords = ['bad', 'horrible', 'terrible', 'worst', 'hate', 'disappointing', 'negative', 'poor', 'awful', 'inadequate'];

            $text = strtolower($text);
            $words = preg_split('/\W+/', $text, -1, PREG_SPLIT_NO_EMPTY);

            $positiveCount = 0;
            $negativeCount = 0;

            foreach ($words as $word) {
                if (in_array($word, $positiveWords)) {
                    $positiveCount++;
                } elseif (in_array($word, $negativeWords)) {
                    $negativeCount++;
                }
            }

            $totalSentimentWords = $positiveCount + $negativeCount;

            if ($totalSentimentWords > 0) {
                $sentimentScore = ($positiveCount - $negativeCount) / $totalSentimentWords;
            } else {
                $sentimentScore = 0; // Neutral if no sentiment words found
            }

            // Normalize to range from -1 to 1
            $sentimentScore = max(-1, min(1, $sentimentScore));

            // Determine sentiment label
            $sentimentLabel = 'neutral';
            if ($sentimentScore >= 0.5) {
                $sentimentLabel = 'very positive';
            } elseif ($sentimentScore > 0) {
                $sentimentLabel = 'positive';
            } elseif ($sentimentScore <= -0.5) {
                $sentimentLabel = 'very negative';
            } elseif ($sentimentScore < 0) {
                $sentimentLabel = 'negative';
            }

            $result = [
                'sentiment' => $sentimentLabel,
                'score' => $sentimentScore,
                'confidence' => abs($sentimentScore) * 0.7 + 0.3, // Simulate confidence score
            ];

            if ($detailed) {
                $result['details'] = [
                    'positive_words_count' => $positiveCount,
                    'negative_words_count' => $negativeCount,
                    'positive_words' => array_intersect($words, $positiveWords),
                    'negative_words' => array_intersect($words, $negativeWords),
                ];
            }

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('Sentiment analysis error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to analyze sentiment'], 500);
        }
    }

    /**
     * API endpoint for professional skills analysis
     */
    public function analyzeSkills(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bio' => 'required|string|min:50',
            'current_skills' => 'nullable|array',
            'career_focus' => 'nullable|string',
            'experience_level' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $bio = $request->bio;
            $currentSkills = $request->current_skills ?? [];
            $careerFocus = $request->career_focus ?? 'full stack development';

            // In a real implementation, you would analyze the bio with NLP or LLM
            // For demonstration, we'll create simulated skills analysis

            // Keyword extraction for skills
            $techSkillsKeywords = [
                'Laravel' => ['laravel', 'php framework', 'blade', 'eloquent'],
                'React' => ['react', 'jsx', 'component', 'hooks'],
                'Vue.js' => ['vue', 'vuejs', 'component', 'reactive'],
                'JavaScript' => ['javascript', 'js', 'ecmascript', 'code'],
                'PHP' => ['php', 'server-side', 'backend'],
                'UI/UX' => ['ui', 'ux', 'user interface', 'user experience', 'design'],
                'API' => ['api', 'rest', 'endpoint', 'integration'],
                'Database' => ['database', 'sql', 'mysql', 'postgresql', 'mongodb'],
                'Docker' => ['container', 'docker', 'containerization'],
                'AWS' => ['aws', 'cloud', 'amazon web services'],
                'Testing' => ['test', 'testing', 'unit test', 'automated testing'],
                'CI/CD' => ['ci', 'cd', 'continuous integration', 'deployment'],
                'Responsive Design' => ['responsive', 'mobile-friendly', 'adaptive'],
                'TailwindCSS' => ['tailwind', 'css framework', 'utility-first'],
                'Git' => ['git', 'version control', 'github'],
                'Agile' => ['agile', 'scrum', 'sprint', 'methodology']
            ];

            $softSkillsKeywords = [
                'Problem Solving' => ['problem', 'solve', 'solution', 'resolve', 'approach'],
                'Communication' => ['communicat', 'articulate', 'convey', 'express'],
                'Teamwork' => ['team', 'collaborate', 'cooperation', 'together'],
                'Leadership' => ['lead', 'guide', 'direct', 'mentor'],
                'Time Management' => ['time', 'deadline', 'schedule', 'punctual'],
                'Adaptability' => ['adapt', 'flexible', 'adjust', 'versatile'],
                'Creativity' => ['creative', 'innovate', 'design', 'imagine'],
                'Critical Thinking' => ['critical', 'analyze', 'evaluate', 'assess'],
                'Attention to Detail' => ['detail', 'meticulous', 'thorough', 'precise'],
                'Emotional Intelligence' => ['emotional', 'empathy', 'understand', 'aware']
            ];

            $bioLower = strtolower($bio);

            // Extract detected skills
            $detectedTechSkills = [];
            foreach ($techSkillsKeywords as $skill => $keywords) {
                foreach ($keywords as $keyword) {
                    if (strpos($bioLower, strtolower($keyword)) !== false) {
                        $detectedTechSkills[$skill] = isset($detectedTechSkills[$skill]) ? $detectedTechSkills[$skill] + 1 : 1;
                    }
                }
            }

            $detectedSoftSkills = [];
            foreach ($softSkillsKeywords as $skill => $keywords) {
                foreach ($keywords as $keyword) {
                    if (strpos($bioLower, strtolower($keyword)) !== false) {
                        $detectedSoftSkills[$skill] = isset($detectedSoftSkills[$skill]) ? $detectedSoftSkills[$skill] + 1 : 1;
                    }
                }
            }

            // Sort by frequency
            arsort($detectedTechSkills);
            arsort($detectedSoftSkills);

            // Convert to simple arrays
            $detectedTechSkills = array_keys($detectedTechSkills);
            $detectedSoftSkills = array_keys($detectedSoftSkills);

            // Generate common skill gaps for full stack developers
            $potentialSkillGaps = [];
            $inDemandSkills = [
                'TypeScript', 'Next.js', 'GraphQL', 'Node.js',
                'Redis', 'Kubernetes', 'Microservices', 'Serverless',
                'CI/CD Pipelines', 'Performance Optimization',
                'Security Best Practices', 'Cloud Architecture'
            ];

            // Find skill gaps (skills not mentioned in bio or current skills)
            foreach ($inDemandSkills as $skill) {
                if (!in_array($skill, $detectedTechSkills) && !in_array($skill, $currentSkills)) {
                    $potentialSkillGaps[] = $skill;
                }
            }

            // Shuffle and take a few
            shuffle($potentialSkillGaps);
            $potentialSkillGaps = array_slice($potentialSkillGaps, 0, 4);

            // Generate skill insights
            $skillInsights = [
                'Your strong combination of both technical and soft skills indicates excellent potential for tech leadership roles.',
                'Your experience with web technologies aligns well with current industry demands in ' . $careerFocus . '.',
                'Consider developing expertise in ' . implode(' and ', array_slice($potentialSkillGaps, 0, 2)) . ' to enhance your technical profile.',
                'Your soft skills in ' . implode(' and ', array_slice($detectedSoftSkills, 0, 2)) . ' complement your technical abilities well.'
            ];

            $result = [
                'detected_tech_skills' => $detectedTechSkills,
                'detected_soft_skills' => $detectedSoftSkills,
                'current_skills' => $currentSkills,
                'skill_gaps' => $potentialSkillGaps,
                'skill_insights' => $skillInsights,
                'career_focus' => $careerFocus,
                'experience_level' => $request->experience_level ?? 'mid-level'
            ];

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('Skills analysis error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to analyze skills'], 500);
        }
    }

    /**
     * API endpoint for career path analysis
     */
    public function analyzeCareerPath(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bio' => 'required|string|min:50',
            'skills' => 'nullable|array',
            'current_role' => 'nullable|string',
            'years_experience' => 'nullable|integer|min:0|max:50',
            'career_interests' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $bio = $request->bio;
            $skills = $request->skills ?? [];
            $currentRole = $request->current_role ?? 'Full Stack Developer';
            $yearsExperience = $request->years_experience ?? 5;

            // Determine career stage
            $careerStage = 'mid-level';
            if ($yearsExperience < 3) {
                $careerStage = 'entry-level';
            } elseif ($yearsExperience >= 8) {
                $careerStage = 'senior';
            }

            // In a real implementation, use AI/ML to analyze career data
            // For demo purposes, create career path suggestions based on skills and experience

            // Career paths for developers based on common trajectories
            $careerPaths = [
                'Technical Leadership' => [
                    'title' => 'Technical Leadership Path',
                    'roles' => [
                        'Senior Developer',
                        'Lead Developer',
                        'Technical Lead',
                        'Engineering Manager',
                        'CTO'
                    ],
                    'key_skills' => [
                        'Team Leadership',
                        'System Architecture',
                        'Technical Mentoring',
                        'Project Management',
                        'Strategic Planning'
                    ],
                    'timeframe' => '3-7 years',
                    'learning_resources' => [
                        'Staff Engineer: Leadership Beyond the Management Track by Will Larson',
                        'The Manager\'s Path by Camille Fournier',
                        'Team Leadership & Architecture Courses on Pluralsight'
                    ],
                    'match_score' => 0
                ],
                'Full Stack Specialist' => [
                    'title' => 'Full Stack Specialization',
                    'roles' => [
                        'Senior Full Stack Developer',
                        'Full Stack Architect',
                        'Technical Specialist',
                        'Principal Engineer'
                    ],
                    'key_skills' => [
                        'Advanced Frontend Frameworks',
                        'Backend Architecture',
                        'API Design',
                        'Performance Optimization',
                        'Cloud Architecture'
                    ],
                    'timeframe' => '2-5 years',
                    'learning_resources' => [
                        'Full Stack Serverless by Nader Dabit',
                        'Building Micro-Frontends by Luca Mezzalira',
                        'AWS/Azure/GCP Certification Courses'
                    ],
                    'match_score' => 0
                ],
                'DevOps Transition' => [
                    'title' => 'DevOps Engineering',
                    'roles' => [
                        'DevOps Engineer',
                        'Site Reliability Engineer',
                        'Platform Engineer',
                        'Cloud Architect'
                    ],
                    'key_skills' => [
                        'CI/CD Pipelines',
                        'Cloud Infrastructure',
                        'Containerization & Orchestration',
                        'Infrastructure as Code',
                        'Monitoring & Observability'
                    ],
                    'timeframe' => '1-3 years',
                    'learning_resources' => [
                        'The DevOps Handbook by Gene Kim',
                        'Kubernetes Up & Running by Kelsey Hightower',
                        'Terraform & Docker Certification Courses'
                    ],
                    'match_score' => 0
                ],
                'Product-Focused' => [
                    'title' => 'Product Development',
                    'roles' => [
                        'Technical Product Manager',
                        'Product Owner',
                        'Director of Product',
                        'CPO'
                    ],
                    'key_skills' => [
                        'Product Strategy',
                        'User Experience',
                        'Market Analysis',
                        'Roadmap Planning',
                        'Stakeholder Management'
                    ],
                    'timeframe' => '2-4 years',
                    'learning_resources' => [
                        'Inspired: How to Create Tech Products Customers Love by Marty Cagan',
                        'Product Management Certification Programs',
                        'UX Design Courses'
                    ],
                    'match_score' => 0
                ]
            ];

            // Compute match scores based on bio keywords and skills
            $bioLower = strtolower($bio);

            // Keywords that indicate interest in each path
            $pathKeywords = [
                'Technical Leadership' => ['lead', 'team', 'mentor', 'architect', 'manager', 'guide', 'direct'],
                'Full Stack Specialist' => ['full stack', 'backend', 'frontend', 'web', 'api', 'design', 'performance'],
                'DevOps Transition' => ['devops', 'cloud', 'infrastructure', 'ci/cd', 'automation', 'kubernetes', 'docker'],
                'Product-Focused' => ['product', 'user', 'customer', 'market', 'strategy', 'roadmap', 'business']
            ];

            foreach ($pathKeywords as $path => $keywords) {
                foreach ($keywords as $keyword) {
                    if (strpos($bioLower, $keyword) !== false) {
                        $careerPaths[$path]['match_score'] += 2;
                    }
                }
            }

            // Additional scoring based on skills
            $skillKeywords = [
                'Technical Leadership' => ['leadership', 'architecture', 'mentoring', 'management', 'planning', 'team'],
                'Full Stack Specialist' => ['javascript', 'react', 'node', 'api', 'database', 'laravel', 'vue', 'performance'],
                'DevOps Transition' => ['devops', 'aws', 'azure', 'cloud', 'docker', 'kubernetes', 'ci/cd', 'terraform'],
                'Product-Focused' => ['ui/ux', 'design', 'product', 'agile', 'scrum', 'communication', 'business']
            ];

            foreach ($skills as $skill) {
                $skillLower = strtolower($skill);
                foreach ($skillKeywords as $path => $keywords) {
                    foreach ($keywords as $keyword) {
                        if (strpos($skillLower, $keyword) !== false) {
                            $careerPaths[$path]['match_score'] += 1;
                        }
                    }
                }
            }

            // Add bonus for current role alignment
            $roleScoringMap = [
                'Technical Leadership' => ['lead', 'senior', 'architect', 'manager', 'head'],
                'Full Stack Specialist' => ['full stack', 'full-stack', 'developer', 'engineer', 'programmer'],
                'DevOps Transition' => ['devops', 'reliability', 'infrastructure', 'platform', 'cloud'],
                'Product-Focused' => ['product', 'ux', 'ui', 'owner', 'manager']
            ];

            $currentRoleLower = strtolower($currentRole);
            foreach ($roleScoringMap as $path => $roleKeywords) {
                foreach ($roleKeywords as $keyword) {
                    if (strpos($currentRoleLower, $keyword) !== false) {
                        $careerPaths[$path]['match_score'] += 3;
                    }
                }
            }

            // Sort paths by match score
            uasort($careerPaths, function($a, $b) {
                return $b['match_score'] <=> $a['match_score'];
            });

            // Get top 2 paths
            $topPaths = array_slice($careerPaths, 0, 2, true);

            // Generate personalized insights
            $insights = [
                'Based on your profile, you show strong potential for ' . array_keys($topPaths)[0] . '.',
                'Your ' . $yearsExperience . ' years of experience positions you well for ' . $careerStage . ' roles in your preferred path.',
                'Consider focusing on ' . implode(' and ', array_slice($careerPaths[array_keys($topPaths)[0]]['key_skills'], 0, 2)) . ' to accelerate your career progression.'
            ];

            // Format response
            $result = [
                'current_role' => $currentRole,
                'career_stage' => $careerStage,
                'years_experience' => $yearsExperience,
                'career_paths' => $topPaths,
                'career_insights' => $insights
            ];

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('Career path analysis error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to analyze career path'], 500);
        }
    }

    /**
     * API endpoint for tech stack recommendations
     */
    public function recommendTechStack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_skills' => 'required|array',
            'career_goals' => 'required|string',
            'project_type' => 'required|string',
            'experience_level' => 'nullable|string|in:beginner,intermediate,advanced',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $currentSkills = $request->current_skills;
            $careerGoals = $request->career_goals;
            $projectType = $request->project_type;
            $experienceLevel = $request->experience_level ?? 'intermediate';

            // Technology categories for recommendations
            $techStacks = [
                'Web Development' => [
                    'beginner' => [
                        'frontend' => ['HTML5', 'CSS3', 'JavaScript (ES6+)', 'Bootstrap', 'jQuery'],
                        'backend' => ['Node.js + Express', 'PHP + Laravel', 'Python + Flask'],
                        'database' => ['MySQL', 'SQLite', 'MongoDB (basics)'],
                        'tools' => ['Git', 'GitHub', 'VS Code', 'Chrome DevTools']
                    ],
                    'intermediate' => [
                        'frontend' => ['React', 'Vue.js', 'TypeScript', 'SASS/SCSS', 'Tailwind CSS'],
                        'backend' => ['Node.js + Express', 'Laravel + Livewire', 'Django', 'Ruby on Rails'],
                        'database' => ['PostgreSQL', 'MongoDB', 'Redis'],
                        'tools' => ['Docker', 'CI/CD (GitHub Actions)', 'Jest', 'Webpack/Vite']
                    ],
                    'advanced' => [
                        'frontend' => ['React + Next.js', 'Vue + Nuxt.js', 'GraphQL (Apollo/Relay)', 'Advanced TypeScript', 'Web Components'],
                        'backend' => ['NestJS', 'Laravel + Inertia.js', 'ASP.NET Core', 'Go', 'Rust'],
                        'database' => ['PostgreSQL (advanced)', 'MongoDB Atlas', 'Elasticsearch', 'Graph Databases'],
                        'tools' => ['Kubernetes', 'Terraform', 'Advanced CI/CD', 'Monitoring (Prometheus/Grafana)']
                    ]
                ],
                'Mobile Development' => [
                    'beginner' => [
                        'cross-platform' => ['React Native', 'Flutter (basics)', 'Ionic'],
                        'native' => ['Swift (basics)', 'Kotlin (basics)'],
                        'tools' => ['Expo', 'Firebase', 'Git', 'VS Code']
                    ],
                    'intermediate' => [
                        'cross-platform' => ['React Native + TypeScript', 'Flutter + Provider', 'Capacitor'],
                        'native' => ['Swift + UIKit', 'Kotlin + Jetpack Compose'],
                        'tools' => ['Redux/MobX', 'Firebase', 'Fastlane', 'Analytics']
                    ],
                    'advanced' => [
                        'cross-platform' => ['React Native + GraphQL', 'Flutter + BLoC', 'Performance Optimization'],
                        'native' => ['Swift + SwiftUI + Combine', 'Kotlin + Coroutines + Flow'],
                        'tools' => ['CI/CD for Mobile', 'Advanced State Management', 'Native Modules']
                    ]
                ],
                'Data Science' => [
                    'beginner' => [
                        'languages' => ['Python', 'SQL', 'R (basics)'],
                        'libraries' => ['Pandas', 'NumPy', 'Matplotlib', 'Scikit-learn (basics)'],
                        'tools' => ['Jupyter Notebook', 'Google Colab', 'GitHub', 'VS Code']
                    ],
                    'intermediate' => [
                        'languages' => ['Python', 'SQL (advanced)', 'R'],
                        'libraries' => ['TensorFlow/PyTorch (basics)', 'Scikit-learn', 'Seaborn', 'NLTK'],
                        'tools' => ['Docker', 'Data Pipelines', 'AWS/GCP (basics)', 'Tableau/PowerBI']
                    ],
                    'advanced' => [
                        'languages' => ['Python', 'Scala', 'Julia'],
                        'libraries' => ['TensorFlow/PyTorch (advanced)', 'Keras', 'Spark MLlib', 'Statsmodels'],
                        'tools' => ['Kubernetes', 'MLOps Tools', 'Advanced Cloud Services', 'Airflow/Kubeflow']
                    ]
                ],
                'DevOps' => [
                    'beginner' => [
                        'cloud' => ['AWS (basics)', 'Digital Ocean', 'Heroku'],
                        'cicd' => ['GitHub Actions', 'GitLab CI (basics)'],
                        'tools' => ['Docker', 'Bash Scripting', 'Git', 'Linux Basics']
                    ],
                    'intermediate' => [
                        'cloud' => ['AWS/Azure/GCP', 'Terraform (basics)', 'CloudFormation'],
                        'cicd' => ['Jenkins', 'CircleCI', 'GitLab CI/CD'],
                        'tools' => ['Docker Compose', 'Ansible', 'Monitoring Basics', 'ELK Stack']
                    ],
                    'advanced' => [
                        'cloud' => ['Multi-Cloud Strategies', 'Terraform (advanced)', 'Cloud Security'],
                        'cicd' => ['GitOps', 'Advanced Jenkins Pipelines', 'Argo CD'],
                        'tools' => ['Kubernetes', 'Istio', 'Prometheus/Grafana', 'SRE Practices']
                    ]
                ]
            ];

            // Project type detection
            $projectCategories = [
                'Web Development' => ['website', 'web app', 'web application', 'webapp', 'website', 'web portal', 'ecommerce'],
                'Mobile Development' => ['mobile', 'app', 'android', 'ios', 'cross-platform', 'native app'],
                'Data Science' => ['data', 'analysis', 'analytics', 'machine learning', 'ml', 'ai', 'data science'],
                'DevOps' => ['devops', 'infrastructure', 'cicd', 'cloud', 'deployment', 'pipeline']
            ];

            // Determine project category
            $projectCategory = 'Web Development'; // Default
            $projectTypeLower = strtolower($projectType);

            foreach ($projectCategories as $category => $keywords) {
                foreach ($keywords as $keyword) {
                    if (strpos($projectTypeLower, $keyword) !== false) {
                        $projectCategory = $category;
                        break 2;
                    }
                }
            }

            // Determine skill gaps and complementary technologies
            $userSkillsLower = array_map('strtolower', $currentSkills);
            $complementaryTechStack = [];
            $learningPath = [];

            // Get recommended stack for the project type and experience level
            $recommendedStack = $techStacks[$projectCategory][$experienceLevel];

            // Analyze skill gaps
            $allRecommendedTech = [];
            foreach ($recommendedStack as $category => $technologies) {
                foreach ($technologies as $tech) {
                    $allRecommendedTech[] = $tech;
                }
            }

            // Find existing skills from recommended stack
            $existingSkills = [];
            foreach ($allRecommendedTech as $tech) {
                foreach ($userSkillsLower as $userSkill) {
                    if (strpos(strtolower($tech), $userSkill) !== false) {
                        $existingSkills[] = $tech;
                        break;
                    }
                }
            }

            // Find missing skills (complementary technologies)
            $missingSkills = array_diff($allRecommendedTech, $existingSkills);

            // Prioritize missing skills (simplified for demo)
            $prioritizedSkills = array_slice($missingSkills, 0, 5);

            // Create learning path
            if ($experienceLevel === 'beginner') {
                $learningPathSteps = [
                    'Start with the fundamentals: ' . implode(', ', array_slice($prioritizedSkills, 0, 2)),
                    'Build small projects to practice what you\'ve learned',
                    'Move on to more complex technologies: ' . implode(', ', array_slice($prioritizedSkills, 2, 2)),
                    'Create a portfolio project combining these skills'
                ];
            } elseif ($experienceLevel === 'intermediate') {
                $learningPathSteps = [
                    'Deepen your knowledge of: ' . implode(', ', array_slice($prioritizedSkills, 0, 2)),
                    'Explore architectural patterns and best practices',
                    'Add these technologies to your stack: ' . implode(', ', array_slice($prioritizedSkills, 2, 2)),
                    'Contribute to open source or build a complex personal project'
                ];
            } else { // advanced
                $learningPathSteps = [
                    'Master advanced concepts in: ' . implode(', ', array_slice($prioritizedSkills, 0, 2)),
                    'Study system design and performance optimization',
                    'Explore emerging technologies: ' . implode(', ', array_slice($prioritizedSkills, 2, 2)),
                    'Lead a project or create a specialized tool in your domain'
                ];
            }

            // Format tech stack recommendation
            $techStackRecommendation = [
                'project_category' => $projectCategory,
                'experience_level' => $experienceLevel,
                'recommended_stack' => $recommendedStack,
                'existing_skills' => $existingSkills,
                'complementary_technologies' => array_values($prioritizedSkills),
                'learning_path' => $learningPathSteps,
                'career_alignment' => 'This tech stack aligns with your ' . $careerGoals . ' goals and builds upon your existing expertise.'
            ];

            return response()->json($techStackRecommendation);
        } catch (\Exception $e) {
            Log::error('Tech stack recommendation error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate tech stack recommendations'], 500);
        }
    }
}
