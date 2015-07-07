<?php

namespace PHPixie\Tests\Bundles;

/**
 * @coversDefaultClass PHPixie\Bundles\Builder
 */
class BuilderTest extends \PHPixie\Test\Testcase
{
    protected $bundleRegistry;
    protected $builder;
    
    public function setUp()
    {
        $this->bundleRegistry = $this->quickMock('\PHPixie\Bundles\Registry');
        $this->builder  = new \PHPixie\Bundles\Builder($this->bundleRegistry);
    }
    
    /**
     * @covers ::__construct
     * @covers ::<protected>
     */
    public function testConstruct()
    {
    
    }
    
    /**
     * @covers ::registry
     * @covers ::<protected>
     */
    public function testRegistry()
    {
        $this->assertSame($this->bundleRegistry, $this->builder->registry());
    }
    
    /**
     * @covers ::httpProcessors
     * @covers ::<protected>
     */
    public function testHttpProcessors()
    {
        $httpProcessors = $this->builder->httpProcessors();
        $this->assertInstance($httpProcessors, '\PHPixie\Bundles\Processors\HTTP', array(
            'bundleRegistry' => $this->bundleRegistry
        ));
        
        $this->assertSame($httpProcessors, $this->builder->httpProcessors());
    }
    
    /**
     * @covers ::templateLocators
     * @covers ::<protected>
     */
    public function testFilesystemLocators()
    {
        $locators = $this->builder->templateLocators();
        $this->assertInstance($locators, '\PHPixie\Bundles\FilesystemLocators\Template', array(
            'bundleRegistry' => $this->bundleRegistry
        ));
        
        $this->assertSame($locators, $this->builder->templateLocators());
    }
    
    /**
     * @covers ::routeResolvers
     * @covers ::<protected>
     */
    public function testRouteResolvers()
    {
        $resolvers = $this->builder->routeResolvers();
        $this->assertInstance($resolvers, '\PHPixie\Bundles\RouteResolvers', array(
            'bundleRegistry' => $this->bundleRegistry
        ));
        
        $this->assertSame($resolvers, $this->builder->routeResolvers());
    }
    
    /**
     * @covers ::orm
     * @covers ::<protected>
     */
    public function testOrm()
    {
        $this->method($this->bundleRegistry, 'bundles', array(), array(), 0);
        
        $orm = $this->builder->orm();
        $this->assertInstance($orm, '\PHPixie\Bundles\ORM');
        
        $this->assertSame($orm, $this->builder->orm());
    }
}