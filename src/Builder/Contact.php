<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;

use Psr\Log\LoggerAwareInterface;

class Contact extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

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
