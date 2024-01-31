<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class ElasticSearchController extends Controller
{
    /**
     * @var \Elastic\Elasticsearch\Client
     */
    protected $elasticSearch;

    public function __construct()
    {
        $this->elasticSearch = ClientBuilder::create()
            ->setSSLVerification(false)
            ->setHosts(['http://elasticsearch:9200'])
            ->build();
    }

    public function search()
    {
        $params = [
            'index' => 'my_index',
            'body'  => [
                'query' => [
                    'match' => [
                        'testField' => 'abc'
                    ]
                ]
            ]
        ];

        $response = $this->elasticSearch->search($params);
        return response()->json($response->asArray());
    }
}
