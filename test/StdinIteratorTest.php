<?php
namespace Hikaeme;

use PHPUnit\Framework\TestCase;

class StdinIteratorTest extends TestCase
{
    public function testIterateLines(): void
    {
        $output = $this->runWithStdin("1\n2\n3\n", 0);
        $this->assertSame("1\n2\n3\n", $output);
    }

    public function testDropNewLine(): void
    {
        $output = $this->runWithStdin("1\n2\n3\n", \SplFileObject::DROP_NEW_LINE);
        $this->assertSame('123', $output);
    }

    private function runWithStdin(string $input, int $flags): string
    {
        $script = sprintf(
            'require %s; $it = new Hikaeme\StdinIterator(%d); foreach ($it as $line) { echo $line; }',
            var_export(__DIR__ . '/../vendor/autoload.php', true),
            $flags
        );

        $process = proc_open(
            [PHP_BINARY, '-r', $script],
            [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']],
            $pipes,
            __DIR__ . '/..'
        );

        fwrite($pipes[0], $input);
        fclose($pipes[0]);

        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);

        return $output;
    }
}
