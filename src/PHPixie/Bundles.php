<?php

namespace PHPixie;

class Bundles
{
    protected $builder;
    
    public function __construct($bundleRegistry)
    {
        $this->builder = $this->buildBuilder($bundleRegistry);
    }
    
    public function builder()
    {
        return $this->builder;
    }
    
    public function httpDispatcher()
    {
        return $this->builder->httpDispatcher();
    }
    
    public function filesystemLocators()
    {
        return $this->builder->filesystemLocators();
    }
    
    public function routeResolvers()
    {
        return $this->builder->routeResolvers();
    }
    
    public function ormWrappers()
    {
        return $this->builder->ormWrappers();
    }
    
    protected function buildBuilder($slice)
    {
        return new Bundles\Builder($slice);
    }
}