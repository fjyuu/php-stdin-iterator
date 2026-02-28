<?php
namespace Hikaeme;

class StdinIterator implements \Iterator
{
    private \SplFileObject $file;

    /**
     * @param int $flags \SplFileObject flags (e.g. \SplFileObject::DROP_NEW_LINE)
     */
    public function __construct(int $flags = 0)
    {
        $this->file = new \SplFileObject('php://stdin');
        $this->file->setFlags($flags);
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
