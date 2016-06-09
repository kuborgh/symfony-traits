<?php

namespace Kuborgh\SymfonyTraits\Traits;

use Kuborgh\SymfonyTraits\Exception\MissingDependencyException;

/**
 * The purpose of this trait is to inject a list of parameters from e.g. parameters.yml into a service.
 */
trait ParameterTrait
{
    /**
     * Parameters saved as key => value pairs
     *
     * @var array
     */
    private $parameters = array();

    /**
     * Add a parameter by id (via DI)
     *
     * @param string $key
     * @param mixed  $value
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Get parameter value by name
     *
     * @param string $key
     *
     * @return mixed
     * @throws MissingDependencyException
     */
    protected function getParameter($key)
    {
        if (!$this->hasParameter($key)) {
            throw new MissingDependencyException(sprintf('Parameter "%s"', $key), get_class($this));
        }

        return $this->parameters[$key];
    }

    /**
     * Check whether parameter is initialized. Note: A value of null also counts as initialized
     *
     * @param string $key
     *
     * @return bool
     */
    protected function hasParameter($key)
    {
        return array_key_exists($key, $this->parameters);
    }
}
