<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;
use AvalancheDevelopment\Approach\Schema\Info as InfoObject;
use AvalancheDevelopment\Approach\Schema\License as LicenseObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use ReflectionClass;

class InfoTest extends PHPUnit_Framework_TestCase
{

    public function testInfoImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $infoBuilder = new Info($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $infoBuilder);
    }

    public function testInfoImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $infoBuilder = new Info($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $infoBuilder);
    }

    public function testInvokeBailsIfTitleIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build Info object - missing title or version');

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->never())
            ->method('setTitle');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder->setLogger($logger);
        $infoBuilder([ 'version' => '1.0.0' ]);
    }

    public function testInvokeSetsTitleIfNotEmpty()
    {
        $title = 'An Awesome Title';

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->once())
            ->method('setTitle')
            ->with($title);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => $title,
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeDoesNotSetDescriptionIfEmpty()
    {
        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->never())
            ->method('setDescription');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeSetsDescriptionIfNotEmpty()
    {
        $description = 'An Awesome Description';

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->once())
            ->method('setDescription')
            ->with($description);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => 'An Awesome Title',
            'description' => $description,
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeDoesNotSetTermsOfServiceIfEmpty()
    {
        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->never())
            ->method('setTermsOfService');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeSetsTermsOfServiceIfNotEmpty()
    {
        $termsOfService = 'http://black.tld/terms';

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->once())
            ->method('setTermsOfService')
            ->with($termsOfService);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => 'An Awesome Title',
            'termsOfService' => $termsOfService,
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeDoesNotSetContactIfEmpty()
    {
        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->never())
            ->method('setContact');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = $this->getMockBuilder(Info::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildContact' ])
            ->getMock();

        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeSetsContactIfNotEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->once())
            ->method('setContact')
            ->with($contactObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = $this->getMockBuilder(Info::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildContact' ])
            ->getMock();
        $infoBuilder->method('buildContact')
            ->willReturn($contactObject);

        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeDoesNotSetLicenseIfEmpty()
    {
        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->never())
            ->method('setLicense');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeSetsLicenseIfNotEmpty()
    {
        $licenseObject = $this->createMock(LicenseObject::class);

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->once())
            ->method('setLicense')
            ->with($licenseObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = $this->getMockBuilder(Info::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildLicense' ])
            ->getMock();
        $infoBuilder->method('buildLicense')
            ->willReturn($licenseObject);

        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);
    }

    public function testInvokeBailsIfVersionIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build Info object - missing title or version');

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->never())
            ->method('setVersion');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder->setLogger($logger);
        $infoBuilder([ 'title' => 'An Awesome Title' ]);
    }

    public function testInvokeSetsVersionIfNotEmpty()
    {
        $version = '1.0.0';

        $infoObject = $this->createMock(InfoObject::class);
        $infoObject->expects($this->once())
            ->method('setVersion')
            ->with($version);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => $version,
        ]);
    }

    public function testInvokeReturnsInfoObject()
    {
        $infoObject = $this->createMock(InfoObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Info')
            ->willReturn($infoObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $result = $infoBuilder([
            'title' => 'An Awesome Title',
            'version' => '1.0.0',
        ]);

        $this->assertSame($result, $infoObject);
    }

    public function testBuildContactReturnsNullIfEmpty()
    {
        $reflectedInfoBuilder = new ReflectionClass(Info::class);
        $reflectedBuildContact = $reflectedInfoBuilder->getMethod('buildContact');
        $reflectedBuildContact->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $infoBuilder = new Info($schemaObjectFactory);
        $result = $reflectedBuildContact->invokeArgs($infoBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildContactReturnsContactIfNotEmpty()
    {
        $data = [
            'contact' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedInfoBuilder = new ReflectionClass(Info::class);
        $reflectedBuildContact = $reflectedInfoBuilder->getMethod('buildContact');
        $reflectedBuildContact->setAccessible(true);

        $contactObject = $this->createMock(ContactObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Contact', $data['contact'])
            ->willReturn($contactObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $result = $reflectedBuildContact->invokeArgs($infoBuilder, [ $data ]);

        $this->assertSame($contactObject, $result);
    }

    public function testBuildLicenseReturnsNullIfEmpty()
    {
        $reflectedInfoBuilder = new ReflectionClass(Info::class);
        $reflectedBuildLicense = $reflectedInfoBuilder->getMethod('buildLicense');
        $reflectedBuildLicense->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $infoBuilder = new Info($schemaObjectFactory);
        $result = $reflectedBuildLicense->invokeArgs($infoBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildLicenseReturnsLicenseIfNotEmpty()
    {
        $data = [
            'license' => [
                'name' => 'Apache 2.0',
            ],
        ];

        $reflectedInfoBuilder = new ReflectionClass(Info::class);
        $reflectedBuildLicense = $reflectedInfoBuilder->getMethod('buildLicense');
        $reflectedBuildLicense->setAccessible(true);

        $licenseObject = $this->createMock(LicenseObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('License', $data['license'])
            ->willReturn($licenseObject);

        $infoBuilder = new Info($schemaObjectFactory);
        $result = $reflectedBuildLicense->invokeArgs($infoBuilder, [ $data ]);

        $this->assertSame($licenseObject, $result);
    }
}
