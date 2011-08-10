<?php

namespace Knid;

abstract class View extends \ArrayObject
{
    /**
     * @return string
     */
    abstract public function render();
}
