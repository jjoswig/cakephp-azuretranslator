<?php
declare(strict_types=1);

namespace AzureTranslator\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Utility\Text;
use Cake\Http\Client;
use Cake\Core\Exception\Exception;

/**
 * Translation component
 */
class TranslationComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Azure Translator host to query
     * @var string url
     */
    protected $host = "";

    /** 
     * Subscription key to authorize against Azure Translator service
     * @var string
    */
    protected $subscription_key = "";

    public function __construct() {
        if(empty(env("AZURE_TRANSLATE_ENDPOINT")))
            throw new Exception('Azure Translator endpoint url not set');

        if(empty(env("AZURE_TRANSLATE_KEY")))
            throw new Exception('Azure Translator subscription key not set');

        $this->host = env("AZURE_TRANSLATE_ENDPOINT");
        $this->subscription_key = env("AZURE_TRANSLATE_KEY");
    }

    public function translate($text, $target_language) {
        $http = new Client();

        if(empty($target_language)) {
            throw new Exception('Language missing');
        }

        if(empty($text)) {
            throw new Exception('Text missing');
        }

        $path = "/translate?api-version=3.0&textType=html";

        // Translate to German and Italian. => "&to=de&to=it";
        $params = "&to=" . $target_language;
        $content = json_encode([['Text' => $text]]);

        $result = $http->post($this->host . $path . $params, $content, 
            [
                'headers' => [
                    "Ocp-Apim-Subscription-Key" => $this->subscription_key,
                    "X-ClientTraceId" => Text::uuid()
                ],
                'type' => 'json'
            ]
        );

        if(!$result->isOk()) {
            throw new Exception('Error when retrieving translations.');
        }

        $result = $result->getJSON();
        $result['status'] = 'success';

        return json_encode($result);   
    }
}
