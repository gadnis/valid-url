<?php

namespace Edbox\Tools;

/**
 * ValidUrl class provides helper methods for url string
 */
class ValidUrlCore
{
    protected $valid = false;
    protected $domain;
    protected $prefix;
    protected $path;
    protected $query;
    protected $fragment;
    protected $ip;

    /** @var string */
    protected $urlString;

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

    protected function init()
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

    public function getQuery()
    {
        return $this->query;
    }

    public function getFragment()
    {
        return $this->fragment;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getFilteredUrl()
    {
        $url = $this->urlString;
        $findFragments = strpos($url, "#");

        if (! $findFragments) {
            return $url;
        }

        return substr($url, 0, $findFragments);
    }

    /**
     * Check if url is equal strings
     * - we assume that they should lead to the same page on internet
     *
     * @param  string  $urlString
     *
     * @return boolean
     */
    public function isEqual($urlString)
    {
        $object = new self($urlString);

        $simpleComparison = strcmp(
            $this->getFilteredUrl(),
            $object->getFilteredUrl()
        );

        return $simpleComparison === 0;
    }

    /**
     * Get url without www. prefix
     *
     * @return string
     */
    public function getFilteredUniqUrl()
    {
        $url = $this->getFilteredUrl();

        return str_replace($this->getDomain(), $this->getUniqDomain(), $url);
    }
}