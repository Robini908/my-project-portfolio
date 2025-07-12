<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class ResumeController extends Controller
{
    /**
     * Display the resume
     */
    public function show()
    {
        return view('resume');
    }

    /**
     * Display the resume preview (for iframe embedding)
     */
    public function preview()
    {
        return view('resume-preview');
    }

    /**
     * Download the resume in various formats
     */
    public function download(Request $request, $format = 'pdf')
    {
        $validFormats = ['pdf', 'docx', 'txt', 'vcf'];

        if (!in_array($format, $validFormats)) {
            $format = 'pdf';
        }

        $filePath = public_path("documents/abraham-opuba-resume.{$format}");

        // Check if the file exists
        if (!file_exists($filePath)) {
            // Try to generate the file if it doesn't exist
            try {
                $this->generateFile($format);
            } catch (\Exception $e) {
                Log::error("Failed to generate resume file: {$e->getMessage()}");
                return back()->with('error', "Sorry, there was an issue generating the resume. Please try again later.");
            }

            // Check again if file exists after generation attempt
            if (!file_exists($filePath)) {
                return back()->with('error', "Sorry, the requested resume format is not available at this time.");
            }
        }

        $filename = "abraham-opuba-resume.{$format}";

        // Set proper content type based on format
        $contentType = $this->getContentType($format);

        // Set appropriate cache control and disposition headers
        $headers = [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];

        return response()->file($filePath, $headers);
    }

    /**
     * Get the appropriate content type for the format
     */
    private function getContentType($format)
    {
        switch ($format) {
            case 'pdf':
                return 'application/pdf';
            case 'docx':
                return 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            case 'txt':
                return 'text/plain';
            case 'vcf':
                return 'text/vcard';
            default:
                return 'application/octet-stream';
        }
    }

    /**
     * Generate a resume file using the artisan command
     */
    private function generateFile($format)
    {
        $exitCode = Artisan::call('resume:generate', [
            'format' => $format
        ]);

        if ($exitCode !== 0) {
            throw new \Exception("Resume generation command failed with exit code {$exitCode}");
        }

        return true;
    }
}
