<?php
namespace Hikaeme;

class StdinIterator implements \Iterator
{
    const DROP_NEW_LINE = \SplFileObject::DROP_NEW_LINE;

    /** @var \SplFileObject */
    private $file;

    public function __construct($flags = 0)
    {
        $this->file = new \SplFileObject('php://stdin');
        $flags = $flags & static::DROP_NEW_LINE;
        $this->file->setFlags($flags);
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
