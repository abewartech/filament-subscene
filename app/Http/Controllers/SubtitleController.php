<?php

namespace App\Http\Controllers;

use App\Models\AllSub;
use Illuminate\Http\Request;

class SubtitleController extends Controller
{
    public function download($id)
    {
        $allSub = AllSub::find($id);
        $filePath = public_path($allSub->fileLink);

        // Ensure the file exists
        if ($allSub && file_exists($filePath)) {
            // Serve the file for download
            return response()->download($filePath);
        } else {
            // Handle the case where the file doesn't exist
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
