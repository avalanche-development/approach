<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class SwaggerTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetSwaggerReturnsSwagger()
    {
        $swaggerVersion = '2.0';

        $swagger = new Swagger;
        $this->setProperty($swagger, 'swagger', $swaggerVersion);
        $result = $swagger->getSwagger();

        $this->assertEquals($swaggerVersion, $result);
    }

    public function testSetSwaggerSetsSwagger()
    {
        $swaggerVersion = '2.0';

        $swagger = new Swagger;
        $swagger->setSwagger($swaggerVersion);

        $this->assertAttributeEquals($swaggerVersion, 'swagger', $swagger);
    }

    public function testGetInfoReturnsInfo()
    {
        $info = new Info;

        $swagger = new Swagger;
        $this->setProperty($swagger, 'info', $info);
        $result = $swagger->getInfo();

        $this->assertSame($info, $result);
    }

    public function testSetInfoSetsInfo()
    {
        $info = new Info;

        $swagger = new Swagger;
        $swagger->setInfo($info);

        $this->assertAttributeSame($info, 'info', $swagger);
    }

    public function testGetHostReturnsHost()
    {
        $host = 'http://domain.tld';

        $swagger = new Swagger;
        $this->setProperty($swagger, 'host', $host);
        $result = $swagger->getHost();

        $this->assertEquals($host, $result);
    }

    public function testSetHostSetsHost()
    {
        $host = 'http://domain.tld';

        $swagger = new Swagger;
        $swagger->setHost($host);

        $this->assertAttributeEquals($host, 'host', $swagger);
    }

    public function testGetBasePathReturnsBasePath()
    {
        $basePath = '/v1';

        $swagger = new Swagger;
        $this->setProperty($swagger, 'basePath', $basePath);
        $result = $swagger->getBasePath();

        $this->assertEquals($basePath, $result);
    }

    public function testSetBasePathSetsBasePath()
    {
        $basePath = '/v1';

        $swagger = new Swagger;
        $swagger->setBasePath($basePath);

        $this->assertAttributeEquals($basePath, 'basePath', $swagger);
    }

    public function testGetSchemesReturnsSchemes()
    {
        $schemes = [ 'http' ];

        $swagger = new Swagger;
        $this->setProperty($swagger, 'schemes', $schemes);
        $result = $swagger->getSchemes();

        $this->assertEquals($schemes, $result);
    }

    public function testSetSchemesSetsSchemes()
    {
        $schemes = [ 'http' ];

        $swagger = new Swagger;
        $swagger->setSchemes($schemes);

        $this->assertAttributeEquals($schemes, 'schemes', $swagger);
    }

    public function testGetConsumesReturnsConsumes()
    {
        $consumes = [ 'application/json' ];

        $swagger = new Swagger;
        $this->setProperty($swagger, 'consumes', $consumes);
        $result = $swagger->getConsumes();

        $this->assertEquals($consumes, $result);
    }

    public function testSetConsumesSetsConsumes()
    {
        $consumes = [ 'application/json' ];

        $swagger = new Swagger;
        $swagger->setConsumes($consumes);

        $this->assertAttributeEquals($consumes, 'consumes', $swagger);
    }

    public function testGetProducesReturnsProduces()
    {
        $produces = [ 'application/json' ];

        $swagger = new Swagger;
        $this->setProperty($swagger, 'produces', $produces);
        $result = $swagger->getProduces();

        $this->assertEquals($produces, $result);
    }

    public function testSetProducesSetsProduces()
    {
        $produces = [ 'application/json' ];

        $swagger = new Swagger;
        $swagger->setProduces($produces);

        $this->assertAttributeEquals($produces, 'produces', $swagger);
    }

    public function testGetPathsReturnsPaths()
    {
        $paths = new Paths;

        $swagger = new Swagger;
        $this->setProperty($swagger, 'paths', $paths);
        $result = $swagger->getPaths();

        $this->assertSame($paths, $result);
    }

    public function testSetPathsSetsPaths()
    {
        $paths = new Paths;

        $swagger = new Swagger;
        $swagger->setPaths($paths);

        $this->assertAttributeSame($paths, 'paths', $swagger);
    }

    public function testGetSecurityDefinitionsReturnsSecurityDefinitions()
    {
        $securityDefinitions = new SecurityDefinitions;

        $swagger = new Swagger;
        $this->setProperty($swagger, 'securityDefinitions', $securityDefinitions);
        $result = $swagger->getSecurityDefinitions();

        $this->assertSame($securityDefinitions, $result);
    }

    public function testSetSecurityDefinitionsSetsSecurityDefinitions()
    {
        $securityDefinitions = new SecurityDefinitions;

        $swagger = new Swagger;
        $swagger->setSecurityDefinitions($securityDefinitions);

        $this->assertAttributeSame($securityDefinitions, 'securityDefinitions', $swagger);
    }

    public function testGetSecurityReturnsSecurity()
    {
        $security = [ new SecurityRequirement ];

        $swagger = new Swagger;
        $this->setProperty($swagger, 'security', $security);
        $result = $swagger->getSecurity();

        $this->assertEquals($security, $result);
    }

    public function testSetSecuritySetsSecurity()
    {
        $security = [ new SecurityRequirement ];

        $swagger = new Swagger;
        $swagger->setSecurity($security);

        $this->assertAttributeEquals($security, 'security', $swagger);
    }

    public function testGetExternalDocsReturnsExternalDocs()
    {
        $externalDocs = new ExternalDocs;

        $swagger = new Swagger;
        $this->setProperty($swagger, 'externalDocs', $externalDocs);
        $result = $swagger->getExternalDocs();

        $this->assertSame($externalDocs, $result);
    }

    public function testSetExternalDocsSetsExternalDocs()
    {
        $externalDocs = new ExternalDocs;

        $swagger = new Swagger;
        $swagger->setExternalDocs($externalDocs);

        $this->assertAttributeSame($externalDocs, 'externalDocs', $swagger);
    }
}
