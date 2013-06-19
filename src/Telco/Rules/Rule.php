<?php

namespace Telco\Rules;

use Telco\Process;
use Telco\Rules\RuleArgumentNotDefinedException;

class Rule {

    /**
     * @var Process
     */
    protected $process;
    
    /**
     * @var array
     */
    protected $arguments = array();
    
    /**
     * @var boolean
     */
    protected $result;
    
    /**
     * @var string
     */
    protected $message;
    
    /**
     * @var array
     */
    protected $data = array();
    
    protected $required_args = array();
    
    public function __construct(Process $process, $arguments) {
        $this->process = $process;
        $this->arguments = $arguments;
        
        foreach ($this->required_args as $argument) {
            if (!array_key_exists($argument, $arguments)) {
                throw new RuleArgumentNotDefinedException($this, $argument);
            }
        }
    }
    
    /**
     * @return Process
     */
    public function getProcess() {
        return $this->process;
    }

    /**
     * @return string
     */
    public function getRuleName() {
        return implode('', array_slice(explode('\\', get_class($this)), -1));
    }

    /**
     * @return boolean
     */
    public function getResult() {
        return $this->result;
    }
    
    /**
     * @param boolean $result
     */
    public function setResult($result) {
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }
    
    public function addDataItem($key, $value) {
        $this->data[$key] = $value;
    }

    public function getDataItem($key) {
        return $this->data[$key];
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }
}