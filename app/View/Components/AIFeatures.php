<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AIFeatures extends Component
{
    /**
     * The position of the features panel.
     */
    public string $position;

    /**
     * Whether the panel should start expanded.
     */
    public bool $expanded;

    /**
     * The theme color scheme.
     */
    public string $theme;

    /**
     * Active feature tab.
     */
    public string $activeTab;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $position = 'bottom-6 right-6',
        bool $expanded = false,
        string $theme = 'indigo',
        string $activeTab = 'summarize'
    ) {
        $this->position = $position;
        $this->expanded = $expanded;
        $this->theme = $theme;
        $this->activeTab = $activeTab;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.ai-features');
    }
}
