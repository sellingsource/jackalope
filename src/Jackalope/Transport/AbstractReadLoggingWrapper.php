<?php

namespace Jackalope\Transport;

use Jackalope\FactoryInterface;
use Psr\Log\LoggerInterface;
use PHPCR\CredentialsInterface;

use Jackalope\NodeType\NodeTypeManager;

/**
 * abstract class for logging transport wrapper.
 *
 * @license http://www.apache.org/licenses Apache License Version 2.0, January 2004
 * @license http://opensource.org/licenses/MIT MIT License
 *
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 */

abstract class AbstractReadLoggingWrapper implements TransportInterface
{
    /**
     * @var TransportInterface
     */
    protected $transport;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param FactoryInterface   $factory
     * @param TransportInterface $transport   A logger instance
     * @param LoggerInterface    $logger    A logger instance
     */
    public function __construct(FactoryInterface $factory, TransportInterface $transport, LoggerInterface $logger)
    {
        $this->transport = $transport;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function getRepositoryDescriptors()
    {
        return $this->transport->getRepositoryDescriptors();
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessibleWorkspaceNames()
    {
        return $this->transport->getAccessibleWorkspaceNames();
    }

    /**
     * {@inheritDoc}
     */
    public function login(CredentialsInterface $credentials = null, $workspaceName = null)
    {
        return $this->transport->login($credentials, $workspaceName);
    }

    /**
     * {@inheritDoc}
     */
    public function logout()
    {
        $this->transport->logout();
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespaces()
    {
        return $this->transport->getNamespaces();
    }

    /**
     * {@inheritDoc}
     */
    public function getNode($path)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getNode($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getNodes($paths)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getNodes($paths);
    }

    /**
     * {@inheritDoc}
     */
    public function getNodesByIdentifier($identifiers)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getNodesByIdentifier($identifiers);
    }

    /**
     * {@inheritDoc}
     */
    public function getProperty($path)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getProperty($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getNodeByIdentifier($uuid)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getNodeByIdentifier($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public function getNodePathForIdentifier($uuid, $workspace = null)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getNodePathForIdentifier($uuid, $workspace);
    }

    /**
     * {@inheritDoc}
     */
    public function getBinaryStream($path)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getBinaryStream($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getReferences($path, $name = null)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getReferences($path, $name);
    }

    /**
     * {@inheritDoc}
     */
    public function getWeakReferences($path, $name = null)
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getWeakReferences($path, $name);
    }

    /**
     * {@inheritDoc}
     */
    public function setNodeTypeManager($nodeTypeManager)
    {
        return $this->transport->setNodeTypeManager($nodeTypeManager);
    }

    /**
     * {@inheritDoc}
     */
    public function getNodeTypes($nodeTypes = array())
    {
        $this->logger->info(__FUNCTION__, array('params' => func_get_args()));
        return $this->transport->getNodeTypes($nodeTypes);
    }

    /**
     * {@inheritDoc}
     */
    public function setFetchDepth($depth)
    {
        $this->transport->setFetchDepth($depth);
    }

    /**
     * {@inheritDoc}
     */
    public function getFetchDepth()
    {
        return $this->transport->getFetchDepth();
    }
}
