<?php

namespace App\Http\Livewire;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Livewire\Component;

class DocumentationEntry extends Component
{

    public $entry = [];
    public $showEditForm = false;
    // Este arregle temporal de inputs se utiliza para guardar los valores de la forma de editInputs, 
    // se guardan en $entry['code'] hasta que se presiona el boton guardar
    public $tempInputs = [];

    protected $listeners = ['inputUpdated' => 'updateInput'];
 
    public function updateInput($key, $value)
    {
        $this->entry["inputs"][$key] = $value;
        $this->tempInputs = $this->formatJsonString(json_encode($this->entry["inputs"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

    }

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
        $responseBody = null;
        try {
            $data = json_decode($this->entry["data"], true);
            $response = $client->post($this->entry["url"], [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer 1|tPLBFvulLd2Urpm1SnNdvosz6k2JViWpEKnOjbPi',
                ],
                'timeout' => 25, // Response timeout (sec)
                'connect_timeout' => 25, // Connection timeout (sec)
                // 'verify' => config('jelou.guzzle_ssl_verify'),
            ]);
            $responseBody = json_decode($response->getBody(), true);
            
        } catch (RequestException $e) {
            $stringResponse = $e->getResponse()->getBody()->getContents();
            $converted = $this->convertoToUTF8($stringResponse);
            $this->entry["response"] = $this->formatJsonString($converted);
        }
    }

    public function convertoToUTF8($text)
    {
        $str = str_replace('\u','u',$text);
        $replacedStr = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $str);
        return html_entity_decode($replacedStr);
    }

    public function saveFormInputs()
    {
        $this->entry["code"] = $this->tempInputs;
        $this->showEditForm = !$this->showEditForm;
    }

    public function toggleForm()
    {
        $this->showEditForm = !$this->showEditForm;
    }

    function formatJsonString(string $jsonString): string
    {
        $result = '';
        $level = 0;
        $in_quotes = false;
        $in_escape = false;
        $ends_line_level = NULL;
        $json_length = strlen($jsonString);

        for ($i = 0; $i < $json_length; $i++) {
            $char = $jsonString[$i];
            $new_line_level = NULL;
            $post = "";
            if ($ends_line_level !== NULL) {
                $new_line_level = $ends_line_level;
                $ends_line_level = NULL;
            }
            if ($in_escape) {
                $in_escape = false;
            } else if ($char === '"') {
                $in_quotes = !$in_quotes;
            } else if (!$in_quotes) {
                switch ($char) {
                    case '}':
                    case ']':
                        $level--;
                        $ends_line_level = NULL;
                        $new_line_level = $level;
                        break;

                    case '{':
                    case '[':
                        $level++;
                    case ',':
                        $ends_line_level = $level;
                        break;

                    case ':':
                        $post = " ";
                        break;

                    case " ":
                    case "  ":
                    case "\t":
                    case "\n":
                    case "\r":
                        $char = "";
                        $ends_line_level = $new_line_level;
                        $new_line_level = NULL;
                        break;
                }
            } else if ($char === '\\') {
                $in_escape = true;
            }
            if ($new_line_level !== NULL) {
                $result .= "\n" . str_repeat("\t", $new_line_level);
            }
            $result .= $char . $post;
        }

        return $result;
    }
}
