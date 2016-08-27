<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\Schema\Part;

class Info
{

    use Extensions;

    /** @var string */
    protected $title;

    /** @var string */
    protected $description;

    /** @var string */
    protected $termsOfService;

    /** @var Contact */
    protected $contact;

    /** @var License */
    protected $license;

    /** @var string */
    protected $version;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTermsOfService()
    {
        return $this->termsOfService;
    }

    /**
     * @param string $termsOfService
     */
    public function setTermsOfService($termsOfService)
    {
        $this->termsOfService = $termsOfService;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return License
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param License $license
     */
    public function setLicense(License $license)
    {
        $this->license = $license;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }
}
