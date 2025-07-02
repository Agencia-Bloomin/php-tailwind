<?php

namespace App\Core;

class ApiClient
{
    private string $baseUrl;
    private string $verdilToken;
    private array $defaultHeaders;

    public function __construct(string $baseUrl = 'https://www.bloominprojetos.com.br/seo/api', string $verdilToken = '8c661fc5a346101949163f5d88cb2607')
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->verdilToken = $verdilToken;
        $this->defaultHeaders = [
            'Verdil: ' . $this->verdilToken
        ];
    }

    /**
     * Make a request to the API
     * 
     * @param string $endpoint The API endpoint to call
     * @param string $method HTTP method (GET, POST, etc)
     * @param array $data Optional data to send with the request
     * @return array|object|null The decoded JSON response or null on error
     */
    private function makeRequest(string $endpoint, string $method = 'GET', array $data = []): array|object|null
    {
        $curl = curl_init();
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->defaultHeaders,
            CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification
            CURLOPT_SSL_VERIFYHOST => 0,     // Don't verify the host
        ];

        if (!empty($data)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
            $options[CURLOPT_HTTPHEADER][] = 'Content-Type: application/json';
        }

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            error_log("API Request Error: " . $err);
            return null;
        }

        $decoded = json_decode($response);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("JSON Decode Error: " . json_last_error_msg());
            return null;
        }

        return $decoded;
    }

    /**
     * Get all pages from the API
     * 
     * @return array|null Array of pages or null on error
     */
    public function getAllPages(): ?array
    {
        $response = $this->makeRequest('cliente/paginas');
        return is_array($response) ? $response : null;
    }

    /**
     * Get a specific page by URL
     * 
     * @param string $url The page URL
     * @return object|null The page data or null on error
     */
    public function getPageByUrl(string $url): ?object
    {
        $response = $this->makeRequest('cliente/pagina/' . urlencode($url));
        return is_object($response) ? $response : null;
    }

    /**
     * Get page metadata (title, description, etc)
     * 
     * @param string $url The page URL
     * @return array|null The page metadata or null on error
     */
    public function getPageMetadata(string $url): ?array
    {
        $page = $this->getPageByUrl($url);
        
        if (!$page) {
            return null;
        }

        return [
            'title' => $page->name ?? '',
            'description' => $page->description ?? '',
            'h1' => $page->name ?? '',
            'content' => $page->content ?? '',
            'cover' => $page->cover ?? '',
            'gallery' => $page->galleryItem ?? []
        ];
    }
} 