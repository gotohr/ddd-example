<?php

namespace Telco\Rules;

use Telco\Rules\RuleNotDefinedException;
use Telco\Process;
use Telco\Rules\Rule;

class Ruler {
    
    /**
     * @var Process
     */
    protected $process;
    
    /**
     * @var array
     */
    
    protected $rules;
    /**
     * @var array
     */
    protected $processData;

    /**
     * @var ProcessDependentClassLoader
     */
    protected $classLoader;
    
    /**
     * @param Process $process
     * @param array $rules
     * @param array $processData
     * @throws ProcessNotDefinedException
     */
    public function __construct(Process $process, array $rules = array(), array $processData = array()) {
        $this->process = $process;
        $this->rules = $rules;
        $this->processData = $processData;
        
        $this->classLoader = new RuleLoader(__NAMESPACE__, $this->process);
    }

    /**
     * @param array $arguments
     * @return Ruler
     */
    public function addCommonArguments(array $arguments) {
        $this->processData = array_merge($this->processData, $arguments);
        return $this;
    }

    /**
     *
     * @param ResellerRequest $request
     * @param array           $rules
     *
     * @return CheckRule
     */
//    public static function fromRequest(ResellerRequest $request, array $rules = array()) {
//        $cr = new self($request->getProcess(), $rules, $request->getProcessData()->toArray());
//        $cr->addCommonArguments($request->toArgumentsArray());
//        return $cr;
//    }
    
    /**
     * andRelation = true  -> rule1 && rule2 && rule3 - stops if first rule result is false
     * andRelation = false -> rule1 || rule2 || rule3 - goes through all rules
     * 
     * @param boolean $andRelation
     * @return Rule[]
     */
    public function execute($andRelation = false) {
        $out = array();
        
        foreach ($this->rules as $ruleName) {
            $rule = $this->getRule($ruleName);
            $rule->execute();
            $out[$ruleName] = $rule;
            if ($andRelation && !$rule->getResult()) {
                break;
            }
        }
        
        return $out;
    }

    /**
     * @param string $ruleName
     * @throws RuleNotDefinedException
     * @return Rule subclass of Rule
     */
    protected function getRule($ruleName) {
        $fqnClass = $this->classLoader->loadClass($ruleName);
        if (!$fqnClass) {
            throw new RuleNotDefinedException($ruleName);
        }
        return new $fqnClass($this->process, $this->processData);
    }
    
    public function addRule($ruleName) {
        $this->rules[] = $ruleName;
    }

}
