<?php

namespace Test\Decorator\Webservice;

use Eezhal92\Decorator\Webservice\JsonRenderer;
use Eezhal92\Decorator\Webservice\Webservice;
use Eezhal92\Decorator\Webservice\XmlRenderer;

class DecoratorTest extends \PHPUnit_Framework_TestCase
{
    private $service;

    public function setUp()
    {
        $this->service = new Webservice(['foo' => 'bar']);
    }

    public function test_render_data()
    {
        $this->assertEquals($this->service->renderData(), ['foo' => 'bar']);
    }

    public function test_json_decorator()
    {
        $jsonRenderer = new JsonRenderer($this->service);
        $this->assertEquals('{"foo":"bar"}', $jsonRenderer->renderData());
    }

    public function test_xml_decorator()
    {
        $xmlRenderer = new XmlRenderer($this->service);

        $xml = '<?xml version="1.0"?><foo>bar</foo>';
        $this->assertXmlStringEqualsXmlString($xml, $xmlRenderer->renderData());
    }

    public function test_decorator_must_implements_renderer()
    {
        $className = 'Eezhal92\Decorator\Webservice\Decorator';
        $interfaceName = 'Eezhal92\Decorator\Webservice\RendererInterface';

        $this->assertTrue(is_subclass_of($className, $interfaceName));
    }
}
