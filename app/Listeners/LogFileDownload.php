<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use App\Models\File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use App\Models\FileDownloadLog; // Import your FileDownloadLog model
use Dotenv\Store\File\Reader;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LogFileDownload
{
    /**
     * Create the event listener.
     */
    use SerializesModels;
    public function handle(FileDownloaded $event)
    {
        try {
            // Update the total downloads count
            $event->file->increment('total_downloads');

            // Log to the database
            FileDownloadLog::create([
                'file_id' => $event->file->id,
                'ip_address' => $event->ipAddress,
                'user_agent' => $event->userAgent,
                'country' => $event->country,
                'downloaded_time' => $event->downloaded_time,
            ]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error in LogFileDownload: ' . $e->getMessage());
        }
    }
    private function getUserCountry($ipAddress)
    {

        $apiKey = '17bebc15df2f443496206b13a646651a';
        $ip = request()->ip();

        // Make an HTTP request to the ipstack API

        $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey={$apiKey}&ip={$ip}&fields=country_name");

        // Check if the request was successful (status code 200)
        if ($response->status() === 200) {
            $data = $response->json();

            // Check if the 'country_name' key exists in the response data
            if (isset($data['country_name'])) {
                // Extract and return the country name
                return $data['country_name'];
            }
        }

        // Return a default value ('Unknown') if the request fails or the key is not found
        return 'Unknown';
    }







}



