<?php

namespace Edbox\Tools;

/**
 * ValidUrl class provides helper methods for url string
 */
class ValidUrl
{
    private $valid = false;
    private $domain;
    private $prefix;
    private $path;
    private $ip;

    /** @var string */
    private $urlString;

    public function __construct($urlString = null)
    {
        // skip if no url string
        // this way we allow to set url string later using setUrlString() method
        if (!$urlString) {
            return;
        }

        $this->urlString = $urlString;
        $this->init();
    }

    /**
     * [setUrlString description]
     * @param string $urlString [description]
     */
    public function setUrlString(string $urlString)
    {
        $this->urlString = $urlString;

        $this->init();

        return $this;
    }

    private function init()
    {
        $parsedUrl = parse_url($this->urlString);

        $domain = isset($parsedUrl['host']) ? $parsedUrl['host'] : null;

        $ip = gethostbyname($domain);

        $valid = false !== filter_var(gethostbyname($domain), FILTER_VALIDATE_IP);

        $prefix = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : null;

        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : null;

        // if url is not valid, lets not set property values
        if (! $valid) {
            return;
        }

        $this->prefix = $prefix;
        $this->domain = $domain;
        $this->path = $path;
        $this->ip = $ip;
        $this->valid = $valid;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Get domain without www.
     *
     * @return string
     */
    public function getUniqDomain()
    {
        return $this->domain
            ? str_replace('www.', '', $this->getDomain())
            : null;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function toArray()
    {
        return [
            'prefix' => $this->getPrefix(),
            'domain' => $this->getDomain(),
            'domain_uniq' => $this->getUniqDomain(),
            'path' => $this->getPath(),
            'ip' => $this->getIp(),
            'valid' => $this->isValid(),
            'url_string' => $this->urlString,
        ];
    }
}