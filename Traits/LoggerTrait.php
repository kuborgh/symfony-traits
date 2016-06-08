<?php

namespace Kuborgh\SymfonyTraits\Traits;

use Kuborgh\SymfonyTraits\Exception\MissingDependencyException;
use Psr\Log\LoggerInterface;

/**
 * Trati to inject a logger
 */
trait LoggerTrait
{
    /**
     * Logger instance
     *
     * @var LoggerInterface logger
     */
    private $logger;

    /**
     * Set logger
     *
     * @param LoggerInterface $logger logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Get logger
     *
     * @return LoggerInterface
     * @throws MissingDependencyException
     */
    public function getLogger()
    {
        if (!$this->logger instanceof LoggerInterface) {
            throw new MissingDependencyException('Logger', get_class($this));
        }

        return $this->logger;
    }

    /**
     * Conveniance wrapper
     *
     * @param string $message
     * @param array  $context
     */
    protected function logError($message, array $context = array())
    {
        $this->getLogger()->error($message, $context);
    }

    /**
     * Prepare a common log context from an Exception
     *
     * @param \Exception $exc
     *
     * @return array
     */
    protected function logContextFromException(\Exception $exc)
    {
        return array(
            'exception' => sprintf('(%s) %s', get_class($exc), $exc->getMessage()),
        );
    }
}
