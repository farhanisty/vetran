<?php

namespace Farhanisty\Vetran;

use Farhanisty\Vetran\Facades\Route\Route;
use Farhanisty\Vetran\Facades\Response;

class Application
{
    private Route $route;
    private Response $response;

    public function __construct()
    {
        $this->route = new Route();
        $this->response = new Response();
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
