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
     * Convenience wrapper
     *
     * @param string $message
     * @param array  $context
     */
    protected function logError($message, array $context = array())
    {
        $this->getLogger()->error($message, $context);
    }

    /**
     * Convenience wrapper
     *
     * @param string $message
     * @param array  $context
     */
    protected function logWarning($message, array $context = array())
    {
        $this->getLogger()->warning($message, $context);
    }

    /**
     * Convenience wrapper
     *
     * @param string $message
     * @param array  $context
     */
    protected function logNotice($message, array $context = array())
    {
        $this->getLogger()->notice($message, $context);
    }

    /**
     * Convenience wrapper
     *
     * @param string $message
     * @param array  $context
     */
    protected function logInfo($message, array $context = array())
    {
        $this->getLogger()->info($message, $context);
    }

    /**
     * Convenience wrapper
     *
     * @param string $message
     * @param array  $context
     */
    protected function logDebug($message, array $context = array())
    {
        $this->getLogger()->debug($message, $context);
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
            'ExceptionClass'   => get_class($exc),
            'ExceptionMessage' => $exc->getMessage(),
            'ExceptionCode'    => $exc->getCode(),
        );
    }
}
