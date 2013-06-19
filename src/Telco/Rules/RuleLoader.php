<?php

namespace Telco\Rules;

use Telco\Environment;
use Telco\Process;

/**
 * gets class in subfolder [currentPath]/Process/[processName]/[targetClass].php
 */
class RuleLoader {
    
    protected $basePath = array();

    /**
     * @var Process
     */
    protected $process;

    /**
     * @param $baseNamespace
     * @param Process $process
     */
    public function __construct($baseNamespace, Process $process) {
        $this->basePath = explode('\\', $baseNamespace);
        $this->process = $process;
        $this->buildBasePath();
    }

    protected function buildBasePath() {
        if ($this->process->isValid()) {
            $this->basePath[] = 'Process';
            $this->basePath[] = $this->process->getValue();
        } else {
            $this->basePath[] = 'Generic';
        }
    }

    /**
     * @param $className
     * @return bool|string
     */
    public function loadClass($className) {
        $pathArray = $this->basePath;
        $pathArray[] = $className;
        
        $fqnClass = implode('\\', $pathArray);
        $path = implode('/', $pathArray).'.php';

        $file = Environment::getRootPath() . "/" . $path;
        if ( ! file_exists($file) )
            return false;
        
        require_once $file;
        
        return $fqnClass;
    }
}