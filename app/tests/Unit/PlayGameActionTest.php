<?php

namespace Tests\Unit;

use App\Actions\PlayGameAction;
use PHPUnit\Framework\TestCase;

class PlayGameActionTest extends TestCase
{
    protected PlayGameAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new PlayGameAction;
    }

    /**
     * @throws \ReflectionException
     */
    public function test_even_numbers_is_winning(): void
    {
        $method = new \ReflectionMethod($this->action, 'isWinningNumber');

        $this->assertTrue($method->invoke($this->action, 2));
        $this->assertTrue($method->invoke($this->action, 50));
    }

    /**
     * @throws \ReflectionException
     */
    public function test_odd_numbers_is_losing(): void
    {
        $method = new \ReflectionMethod($this->action, 'isWinningNumber');

        $this->assertFalse($method->invoke($this->action, 3));
        $this->assertFalse($method->invoke($this->action, 25));
    }

    /**
     * @throws \ReflectionException
     */
    public function test_calculate(): void
    {
        $method = new \ReflectionMethod($this->action, 'calculate');

        $this->assertEquals(30.0, $method->invoke($this->action, 300));
        $this->assertEquals(90.3, $method->invoke($this->action, 301));
        $this->assertEquals(180.0, $method->invoke($this->action, 600));
        $this->assertEquals(300.5, $method->invoke($this->action, 601));
        $this->assertEquals(450.0, $method->invoke($this->action, 900));
        $this->assertEquals(631.4, $method->invoke($this->action, 902));
    }
}
