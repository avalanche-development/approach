<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Contact implements LoggerAwareInterface
{

    /** @var LoggerInterface */
    protected $logger;
     
    public function __construct()
    {
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
        $contact = new ContactObject;
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
