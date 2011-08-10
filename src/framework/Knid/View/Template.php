<?php

namespace Knid\View;

use Knid\Io\File;

class Template extends \Knid\View
{
    /**
     * @var File
     */
    private $template;
    
    /**
     * @param File $template
     * @return View
     */
    public function setTemplate(File $template)
    {
        $this->template = $template;
        return $this;
    }
    
    /**
     * @return string
     */
    public function render()
    {
        ob_start();
        include $this->template->getPathname();
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
