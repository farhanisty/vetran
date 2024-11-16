<?php

namespace Farhanisty\Vetran\Facades\Route;

class URL
{
    private $components;

    public function __construct($url)
    {
        $this->components = parse_url($url);
    }

    public function getScheme()
    {
        return $this->components['scheme'] ?? null;
    }

    public function getHost()
    {
        return $this->components['host'] ?? null;
    }

    public function getPort()
    {
        return $this->components['port'] ?? null;
    }

    public function getPath()
    {
        return $this->components['path'] ?? null;
    }

    public function getQuery()
    {
        return $this->components['query'] ?? null;
    }

    public function getFragment()
    {
        return $this->components['fragment'] ?? null;
    }

    public function setQueryParam($key, $value)
    {
        $query = [];
        if (isset($this->components['query'])) {
            parse_str($this->components['query'], $query);
        }
        $query[$key] = $value;
        $this->components['query'] = http_build_query($query);
    }

    public function buildSimpleUrl(): SimpleUrl
    {
        return new SimpleUrl($this->getPath());
    }

    public function __toString()
    {
        $url = ($this->getScheme() ? $this->getScheme() . '://' : '')
            . ($this->getHost() ?? '')
            . ($this->getPort() ? ':' . $this->getPort() : '')
            . ($this->getPath() ?? '')
            . ($this->getQuery() ? '?' . $this->getQuery() : '')
            . ($this->getFragment() ? '#' . $this->getFragment() : '');
        return $url;
    }
}
