<?php

namespace Farhanisty\Vetran\Facades;

class SimpleUrl
{
    private string $url;

    public function __construct(string $url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = trim($url);

        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}