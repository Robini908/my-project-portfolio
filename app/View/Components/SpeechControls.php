<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SpeechControls extends Component
{
    /**
     * The position of the controls.
     */
    public string $position;

    /**
     * Whether the controls should start expanded.
     */
    public bool $expanded;

    /**
     * The theme color of the controls.
     */
    public string $theme;

    /**
     * Whether to show the voice selector.
     */
    public bool $showVoiceSelector;

    /**
     * Whether to show the rate control.
     */
    public bool $showRateControl;

    /**
     * Whether to show the control buttons.
     */
    public bool $showControlButtons;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $position = 'top-6 right-6',
        bool $expanded = false,
        string $theme = 'indigo',
        bool $showVoiceSelector = true,
        bool $showRateControl = true,
        bool $showControlButtons = true
    ) {
        $this->position = $position;
        $this->expanded = $expanded;
        $this->theme = $theme;
        $this->showVoiceSelector = $showVoiceSelector;
        $this->showRateControl = $showRateControl;
        $this->showControlButtons = $showControlButtons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.speech-controls');
    }
}
