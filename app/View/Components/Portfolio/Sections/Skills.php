<?php

namespace App\View\Components\Portfolio\Sections;

use Illuminate\View\Component;

class Skills extends Component
{
    public $skills;
    public $skillCategories;
    public $tagline;

    public function __construct($skills, $skillCategories, $tagline = null)
    {
        $this->skills = $skills;
        $this->skillCategories = $skillCategories;
        $this->tagline = $tagline;
    }

    public function render()
    {
        return view('partials.portfolio.sections.skills');
    }
}
