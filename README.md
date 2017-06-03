# Stdin Iterator

## Usage

```php
use Hikaeme\StdinIterator;

$stdin = new StdinIterator();

foreach ($stdin as $line) {
    echo $line;
}
```

## Installation

```
composer require hikaeme/stdin-iterator
```

## Testable STDIN

```php
class SampleCommand
{
    private $stdin;

    public function __construct(StdinIterator $stdin = null)
    {
        $this->stdin = $stdin ?: new StdinIterator();
    }

    public function run()
    {
        foreach ($this->stdin as $line) {
            echo $line;
        }
    }
}
```

```php
class SampleCommandTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $stub = new StdinIteratorStub();
        $stub->setStdin("1\n2\n3\n");

        $command = new \SampleCommand($stub);
        ob_start();
        $command->run();
        $result = ob_get_clean();

        $this->assertSame("1\n2\n3\n", $result);
    }
}
```
