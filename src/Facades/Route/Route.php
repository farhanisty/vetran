<?php

namespace Farhanisty\Vetran\Facades\Route;

use Farhanisty\Vetran\Facades\Input\HTTPInput;
use Farhanisty\Vetran\Facades\Route\SimpleURL;
use Farhanisty\Vetran\Facades\Route\URLComparatorImpl;

class Route
{
    public SimpleUrl $currentUrl;
    private urlComparator $urlComparator;
    private ?HTTPInput $httpInput = null;

    public function __construct()
    {
        $this->currentUrl = new SimpleUrl($_SERVER['REQUEST_URI']);
        $this->urlComparator = new URLComparatorImpl();
    }

    public function get(string $url, callable $action)
    {
        $this->handle('GET', $url, $action);
    }

    public function post(string $url, callable $action)
    {
        $this->handle('POST', $url, $action);
    }

    public function handle(string $method, string $url, callable $action)
    {
        if ($_SERVER['REQUEST_METHOD'] != strtoupper($method)) {
            return;
        }

        if ($this->urlComparator->compare(new SimpleUrl($url), $this->currentUrl)) {
            $this->httpInput = new HTTPInput($this->urlComparator->getInputParameter());
            call_user_func($action);
            die();
        }
    }

    public function input(): HTTPInput
    {
        return $this->httpInput;
    }
}
