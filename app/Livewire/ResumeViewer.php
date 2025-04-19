<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ResumeViewer extends Component
{
    public $showResumeModal = false;
    public $previewMode = true; // true for preview, false for download options
    public $isDownloading = null; // Tracks which format is being downloaded (pdf, docx, txt, vcf)
    public $isRegenerating = false; // Tracks if resume is being regenerated
    public $fileDetails = [];
    public $downloadError = null;

    protected $listeners = [
        'openResumeViewer' => 'openResume',
        'open-resume-viewer' => 'openResume',
        'resetDownloadState' => 'resetDownloadState'
    ];

    public function mount()
    {
        $this->refreshFileDetails();
    }

    /**
     * Refresh the file details for all resume formats
     */
    public function refreshFileDetails()
    {
        $formats = ['pdf', 'docx', 'txt', 'vcf'];

        foreach ($formats as $format) {
            $filePath = public_path("documents/abraham-opuba-resume.{$format}");
            $fileExists = File::exists($filePath);

            $this->fileDetails[$format] = [
                'format' => $this->getFormatName($format),
                'exists' => $fileExists,
                'size' => $fileExists ? $this->formatFileSize(File::size($filePath)) : 'N/A',
                'lastModified' => $fileExists ? date('M d, Y', File::lastModified($filePath)) : 'N/A',
            ];
        }
    }

    /**
     * Format the file size in a human-readable format
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return round($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    /**
     * Get a human-readable format name
     */
    private function getFormatName($format)
    {
        $formatNames = [
            'pdf' => 'PDF Document',
            'docx' => 'Word Document',
            'txt' => 'Plain Text',
            'vcf' => 'Contact Card',
        ];

        return $formatNames[$format] ?? ucfirst($format);
    }

    /**
     * Open the resume viewer
     */
    public function openResume()
    {
        $this->showResumeModal = true;
        $this->previewMode = true;
        $this->isDownloading = null;
        $this->downloadError = null;

        // Check if we need to generate the resume files first
        $pdfExists = File::exists(public_path('documents/abraham-opuba-resume.pdf'));

        if (!$pdfExists) {
            $this->regenerateResumes();
        } else {
            $this->refreshFileDetails();
        }
    }

    /**
     * Close the resume viewer
     */
    public function closeResume()
    {
        $this->showResumeModal = false;
        $this->isDownloading = null;
        $this->downloadError = null;
    }

    /**
     * Download the resume in a specific format
     */
    public function downloadResume($format = 'pdf')
    {
        // Set the downloading format to show the loading state in the UI
        $this->isDownloading = $format;
        $this->downloadError = null;

        $filePath = public_path("documents/abraham-opuba-resume.{$format}");

        // Check if the file exists, generate it if it doesn't
        if (!File::exists($filePath)) {
            try {
                $exitCode = Artisan::call('resume:generate', ['format' => $format]);

                if ($exitCode !== 0) {
                    $this->downloadError = "Failed to generate the resume in {$format} format.";
                    $this->isDownloading = null;
                    return;
                }
            } catch (\Exception $e) {
                $this->downloadError = "Error: " . $e->getMessage();
                $this->isDownloading = null;
                return;
            }
        }

        // Refresh file details after potential generation
        $this->refreshFileDetails();

        // If the file still doesn't exist after generation attempt, show error
        if (!File::exists($filePath)) {
            $this->downloadError = "The requested resume format is not available.";
            $this->isDownloading = null;
            return;
        }

        // Reset downloading state after short delay to show loading effect
        $this->dispatch('resumeDownloading', [
            'format' => $format,
            'url' => url("resume/download/{$format}")
        ]);

        // The downloading state will be reset by JavaScript after download starts
    }

    /**
     * Regenerate all resume files
     */
    public function regenerateResumes()
    {
        $this->isRegenerating = true;

        try {
            Artisan::call('resume:generate', ['format' => 'all']);
            $this->refreshFileDetails();
            $this->isRegenerating = false;
        } catch (\Exception $e) {
            $this->isRegenerating = false;
            $this->downloadError = "Failed to regenerate resume files: " . $e->getMessage();
        }
    }

    /**
     * Get file details for a specific format
     */
    public function getFileDetails($format)
    {
        if (isset($this->fileDetails[$format])) {
            return $this->fileDetails[$format];
        }

        return [
            'format' => $this->getFormatName($format),
            'exists' => false,
            'size' => 'Unknown',
            'lastModified' => 'N/A',
        ];
    }

    /**
     * Reset the download state
     */
    public function resetDownloadState()
    {
        $this->isDownloading = null;
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.resume-viewer');
    }
}
