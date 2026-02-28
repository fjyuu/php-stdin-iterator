<?php
namespace Hikaeme;

use PHPUnit\Framework\TestCase;

class StdinIteratorStubTest extends TestCase
{
    public function testDefault()
    {
        $stub = new StdinIteratorStub();
        $stub->setStdin($this->getSampleStdin());

        $lines = [];
        foreach ($stub as $line) {
            $lines[] = $line;
        }

        $this->assertCount(3, $lines);
        $this->assertSame($this->getSampleStdin(), implode('', $lines));
    }

    public function testDropNewLine()
    {
        $stub = new StdinIteratorStub(\SplFileObject::DROP_NEW_LINE);
        $stub->setStdin($this->getSampleStdin());

        $lines = [];
        foreach ($stub as $line) {
            $lines[] = $line;
        }

        $this->assertCount(3, $lines);
        $this->assertSame('123', implode('', $lines));
    }

    private function getSampleStdin()
    {
        return <<<LINES
1
2
3
LINES;
    }
}
