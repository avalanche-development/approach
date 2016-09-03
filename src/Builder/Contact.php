<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Contact implements LoggerAwareInterface
{

    /** @var SchemaObjectFactory */
    protected $schemaObjectFactory;

    /** @var LoggerInterface */
    protected $logger;

    /**
     * @param SchemaObjectFactory $schemaObjectFactory
     */
    public function __construct(SchemaObjectFactory $schemaObjectFactory)
    {
        $this->schemaObjectFactory = $schemaObjectFactory;
        $this->logger = new NullLogger;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param array $data
     * @return ContactObject
     */
    public function __invoke(array $data)
    {
        $contact = $this->schemaObjectFactory->newSchemaObject('Contact');
        if (!empty($data['name'])) {
            $contact->setName($data['name']);
        }
        if (!empty($data['url'])) {
            $contact->setUrl($data['url']);
        }
        if (!empty($data['email'])) {
            $contact->setEmail($data['email']);
        }
        return $contact;
    }
}
