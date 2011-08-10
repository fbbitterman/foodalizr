<?php

namespace Knid\Io;

use Knid\Io\Exception;

class File
{
    /**
     * @var string
     */
    private $pathname;
    
    /**
     * @param string $pathname
     */
    public function __construct($pathname)
    {
        $this->pathname = $pathname;
    }
    
    /**
     * @return string
     */
    public function getPathname()
    {
        return $this->pathname;
    }
    
    /**
     * @throws Knid\Io\Exception
     * @return string
     */
    public function getContents()
    {
        $contents = file_get_contents($this->pathname);
        if (false === $contents) {
            throw new Exception();
        }
        return $contents;
    }
}
