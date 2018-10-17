<?php

namespace SmartCAT\API\Resource;

use SmartCAT\API\Helper\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;
class DocumentExportResource extends Resource
{
    /**
     * 
     *
     * @param string $taskId Export task ID
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function documentExportDownloadExportResult($taskId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/integration/v1/document/export/{taskId}';
        $url = str_replace('{taskId}', urlencode($taskId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => $this->host), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        return $response;
    }
    /**
     * 
     *
     * @param array  $parameters {
     *     @var array $documentIds 
     *     @var string $type 
     *     @var int $stageNumber 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SmartCAT\API\Model\ExportDocumentTaskModel
     */
    public function documentExportRequestExport($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('documentIds');
        $queryParam->setDefault('type', NULL);
        $queryParam->setDefault('stageNumber', NULL);
        $url = '/api/integration/v1/document/export';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $search = [];
        for ($i = 0; $i < count($parameters['documentIds']); $i++) {
            $search[] = "documentIds%5B$i%5D";
        }
        $url = str_replace($search, 'documentIds', $url);
        $headers = array_merge(array('Host' => $this->host, 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SmartCAT\\API\\Model\\ExportDocumentTaskModel', 'json');
            }
        }
        return $response;
    }
}