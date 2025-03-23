<?php

class Endpoint
{
    public $method = "GET";
    public $path = "";
    public function id()
    {
        return $this->method . " " . $this->path;
    }
};
