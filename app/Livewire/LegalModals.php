<?php

namespace App\Livewire;

use Livewire\Component;

class LegalModals extends Component
{
    public $showPrivacyPolicy = false;
    public $showTermsConditions = false;

    protected $listeners = [
        'openPrivacyPolicy' => 'openPrivacyPolicy',
        'openTermsConditions' => 'openTermsConditions',
        'open-legal-modal' => 'handleLegalModal'
    ];

    /**
     * Handle the open-legal-modal event from Alpine.js
     */
    public function handleLegalModal($modalType)
    {
        if ($modalType === 'privacy-policy') {
            $this->openPrivacyPolicy();
        } elseif ($modalType === 'terms-conditions') {
            $this->openTermsConditions();
        }
    }

    public function openPrivacyPolicy()
    {
        $this->showPrivacyPolicy = true;
        $this->showTermsConditions = false;
    }

    public function openTermsConditions()
    {
        $this->showTermsConditions = true;
        $this->showPrivacyPolicy = false;
    }

    public function closeLegalModal()
    {
        $this->showPrivacyPolicy = false;
        $this->showTermsConditions = false;
    }

    public function render()
    {
        return view('livewire.legal-modals');
    }
}
