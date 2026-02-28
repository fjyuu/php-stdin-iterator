<?php
namespace Hikaeme;

class StdinIteratorStub extends StdinIterator
{
    private int $flags;

    private \SplFileObject $file;

    /**
     * @param int $flags \SplFileObject flags (e.g. \SplFileObject::DROP_NEW_LINE)
     * @param string $stdin Initial stdin content
     */
    public function __construct(int $flags = 0, string $stdin = '')
    {
        $this->flags = $flags;
        $this->setStdin($stdin);
    }

    /**
     * @param string $stdin stdin content to iterate over
     */
    public function setStdin(string $stdin): void
    {
        $this->file = new \SplFileObject('data://text/plain,' . $stdin);
        $this->file->setFlags($this->flags);
    }

    public function current(): mixed
    {
        return $this->file->current();
    }

    public function next(): void
    {
        $this->file->next();
    }

    public function key(): mixed
    {
        return $this->file->key();
    }

    public function valid(): bool
    {
        return $this->file->valid();
    }

    public function rewind(): void
    {
        // do nothing
    }
}
