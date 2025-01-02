<?php

namespace gateway;

abstract class BaseGateway
{
    abstract protected function __construct($con);
    abstract public function find(String $id);
}