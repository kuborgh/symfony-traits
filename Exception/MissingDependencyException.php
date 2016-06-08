<?php

namespace Kuborgh\SymfonyTraits\Exception;

/**
 * This exception should be raised, when a setter dependency was not injected
 */
class MissingDependencyException extends \LogicException
{
    /**
     * @param string $dependency Speaking Name of the dependency
     * @param String $class      Class name. Use get_class($this) for this
     */
    public function __construct($dependency, $class)
    {
        // @rfe try to figure out the both parameters automatically from context
        $this->message = sprintf('%s not injected into %s', $dependency, $class);
    }
}
