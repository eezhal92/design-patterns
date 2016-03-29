<?php

namespace Test\ChainOfResponsibility;

use Eezhal92\ChainOfResponsibility\Request;
use Eezhal92\ChainOfResponsibility\Responsible\FastStorage;
use Eezhal92\ChainOfResponsibility\Responsible\SlowStorage;

class ChainOfResponsibilityTest extends \PHPUnit_Framework_TestCase
{
    private $chain;

    public function setUp()
    {
        $this->chain = new FastStorage(['foo' => 'bar', 'baz' => 'qux']);
        $this->chain->append(new SlowStorage(['foo' => 'bar', 'john' => 'doe']));
    }

    public function makeRequest()
    {
        $request = new Request();
        $request->verb = 'get';

        return [
            [$request],
        ];
    }

    /** @dataProvider makeRequest */
    public function test_fast_storage($request)
    {
        $request->key = 'foo';
        $status = $this->chain->handle($request);

        $this->assertTrue($status);
        $this->assertObjectHasAttribute('response', $request);
        $this->assertEquals('bar', $request->response);

        $this->assertEquals(FastStorage::class, $request->handlerClassName);
    }

    /** @dataProvider makeRequest */
    public function test_slow_storage($request)
    {
        $request->key = 'john';
        $status = $this->chain->handle($request);

        $this->assertTrue($status);
        $this->assertObjectHasAttribute('response', $request);
        $this->assertEquals('doe', $request->response);

        $this->assertEquals(SlowStorage::class, $request->handlerClassName);
    }

    /** @dataProvider makeRequest */
    public function test_failure($request)
    {
        $request->key = 'meh';
        $status = $this->chain->handle($request);

        $this->assertFalse($status);

        $this->assertEquals(SlowStorage::class, $request->handlerClassName);
    }
}
