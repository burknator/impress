<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfigTest extends TestCase
{
    use DatabaseTransactions;

    protected function checkInputAndOutput($read, $write, $save)
    {
        $config = $this->getMockBuilder(Impress\Support\Config::class)
                       ->setMethods(['read', 'write'])
                       ->getMock();

        $config->expects($this->any())
               ->method('read')
               ->willReturn($read);

        $config->expects($this->any())
               ->method('write')
               ->with($write);

        $config->save($save);
    }

    public function testReplacesAndDoesntAdd()
    {
        $read = <<<JSON
{
    "shouldStay": "yes"
}
JSON;
        $write = <<<JSON
{
    "shouldStay": "absolutely"
}
JSON;

        $this->checkInputAndOutput($read, $write, [
            'shouldStay' => 'absolutely',
            'anotherValue' => 'which shouldnt come up in write'
        ]);
    }

    public function testReplacesOnlyInNonComments()
    {
        $read = <<<JSON
{
    //"shouldStay": "no"
    "shouldStay": "yes"
}
JSON;

        $write = <<<JSON
{
    //"shouldStay": "no"
    "shouldStay": "absolutely"
}
JSON;

        $this->checkInputAndOutput($read, $write, [
            'shouldStay' => 'absolutely'
        ]);
    }
}
