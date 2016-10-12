<?php
namespace Sharin\Test ;
use PHPUnit\Framework\TestCase;

/**
 * Class StackTest
 *
针对类 Class 的测试写在类 ClassTest中。

ClassTest（通常）继承自 PHPUnit\Framework\TestCase。

测试都是命名为 test* 的公用方法。

也可以在方法的文档注释块(docblock)中使用 @test 标注将其标记为测试方法。

在测试方法内，类似于 assertEquals()（参见 附录 A）这样的断言方法用来对实际值与预期值的匹配做出断言。
 *
 * @package Sharin\Test
 */
class StackTest extends TestCase
{
    public function testPushAndPop() {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}