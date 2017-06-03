<?php
namespace Hikaeme;

class StdinIteratorStub extends StdinIterator
{
    /** @var int */
    private $flags;

    /** @var \SplFileObject */
    private $file;

    /**
     * @param int $flags
     * @param string $stdin
     */
    public function __construct($flags = 0, $stdin = '')
    {
        $this->flags = $flags & static::DROP_NEW_LINE;
        $this->setStdin($stdin);
    }

    /**
     * @param string $stdin
     */
    public function setStdin($stdin)
    {
        $this->file = new \SplFileObject('data://text/plain,' . $stdin);
        $this->file->setFlags($this->flags);
    }

    public function current()
    {
        return $this->file->current();
    }

    public function next()
    {
        $this->file->next();
    }

    public function key()
    {
        return $this->file->key();
    }

    public function valid()
    {
        return $this->file->valid();
    }

    public function rewind()
    {
        // do nothing
    }
}
