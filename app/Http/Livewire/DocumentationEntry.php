<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class DocumentationEntry extends Component
{

    public $entry = [];
    public $showEditForm = false;

    public function mount(array $entry)
    {
        $this->entry = $entry;
    }

    public function render()
    {
        return view('livewire.documentation-entry');
    }

    public function sendHttp()
    {
        $client = new Client();
        
        $response = $client->get($this->entry["url"], [
            // 'json' => $data,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.config('jelou.api_chat_bearer_token'),
            ],
            'timeout' => 25, // Response timeout (sec)
            'connect_timeout' => 25, // Connection timeout (sec)
            // 'verify' => config('jelou.guzzle_ssl_verify'),
        ]);
        $responseBody = json_decode($response->getBody(), true);

        // dd($responseBody);
    }

    public function toggleForm()
    {
        $this->showEditForm = !$this->showEditForm;
    }
}
