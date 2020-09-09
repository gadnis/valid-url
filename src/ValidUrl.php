<?php

namespace Edbox\Tools;

/**
 * ValidUrl class provides helper methods for url string
 */
class ValidUrl extends ValidUrlCore
{
    public function toArray()
    {
        return [
            'prefix' => $this->getPrefix(),
            'domain' => $this->getDomain(),
            'domain_uniq' => $this->getUniqDomain(),
            'path' => $this->getPath(),
            'query' => $this->getQuery(),
            'fragment' => $this->getFragment(),
            'ip' => $this->getIp(),
            'valid' => $this->isValid(),
            'url_filtered' => $this->getFilteredUrl(),
            'url_filtered_uniq' => $this->getFilteredUniqUrl(),
            'url_string' => $this->urlString,
            // 'is_equal' => $this->isEqual('some-url'),
        ];
    }
}