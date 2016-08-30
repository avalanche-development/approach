<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class OperationTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetTagsReturnsTags()
    {
        $tags = [
            'tagOne',
            'tagTwo',
        ];

        $operation = new Operation;
        $this->setProperty($operation, 'tags', $tags);
        $result = $operation->getTags();

        $this->assertEquals($tags, $result);
    }

    public function testSetTagsSetsTags()
    {
        $tags = [
            'tagOne',
            'tagTwo',
        ];

        $operation = new Operation;
        $operation->setTags($tags);

        $this->assertAttributeEquals($tags, 'tags', $operation);
    }

    public function testGetSummaryReturnsSummary()
    {
        $summary = 'Some summary, eh?';

        $operation = new Operation;
        $this->setProperty($operation, 'summary', $summary);
        $result = $operation->getSummary();

        $this->assertEquals($summary, $result);
    }

    public function testSetSummarySetsSummary()
    {
        $summary = 'Some summary, eh?';

        $operation = new Operation;
        $operation->setSummary($summary);

        $this->assertAttributeEquals($summary, 'summary', $operation);
    }

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'A longer description';

        $operation = new Operation;
        $this->setProperty($operation, 'description', $description);
        $result = $operation->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'A longer description';

        $operation = new Operation;
        $operation->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $operation);
    }

    public function testGetExternalDocsReturnsExternalDocs()
    {
        $externalDocs = new ExternalDocs;

        $operation = new Operation;
        $this->setProperty($operation, 'externalDocs', $externalDocs);
        $result = $operation->getExternalDocs();

        $this->assertSame($externalDocs, $result);
    }

    public function testSetExternalDocsSetsExternalDocs()
    {
        $externalDocs = new ExternalDocs;

        $operation = new Operation;
        $operation->setExternalDocs($externalDocs);

        $this->assertAttributeSame($externalDocs, 'externalDocs', $operation);
    }

    public function testGetOperationIdReturnsOperationId()
    {
        $operationId = 'uniqueOperation';

        $operation = new Operation;
        $this->setProperty($operation, 'operationId', $operationId);
        $result = $operation->getOperationId();

        $this->assertEquals($operationId, $result);
    }

    public function testSetOperationIdSetsOperationId()
    {
        $operationId = 'uniqueOperation';

        $operation = new Operation;
        $operation->setOperationId($operationId);

        $this->assertAttributeEquals($operationId, 'operationId', $operation);
    }

    public function testGetConsumesReturnsConsumes()
    {
        $consumes = [ 'text/plain; charset=utf-8' ];

        $operation = new Operation;
        $this->setProperty($operation, 'consumes', $consumes);
        $result = $operation->getConsumes();

        $this->assertEquals($consumes, $result);
    }

    public function testSetConsumesSetsConsumes()
    {
        $consumes = [ 'text/plain; charset=utf-8' ];

        $operation = new Operation;
        $operation->setConsumes($consumes);

        $this->assertAttributeEquals($consumes, 'consumes', $operation);
    }

    public function testGetProducesReturnsProduces()
    {
        $produces = [ 'application/json' ];

        $operation = new Operation;
        $this->setProperty($operation, 'produces', $produces);
        $result = $operation->getProduces();

        $this->assertEquals($produces, $result);
    }

    public function testSetProducesSetsProduces()
    {
        $produces = [ 'application/json' ];

        $operation = new Operation;
        $operation->setProduces($produces);

        $this->assertAttributeEquals($produces, 'produces', $operation);
    }

    public function testGetParametersReturnsParameters()
    {
        $parameters = [ new Parameter ];

        $operation = new Operation;
        $this->setProperty($operation, 'parameters', $parameters);
        $result = $operation->getParameters();

        $this->assertEquals($parameters, $result);
    }

    public function testSetParametersSetsParameters()
    {
        $parameters = [ new Parameter ];

        $operation = new Operation;
        $operation->setParameters($parameters);

        $this->assertAttributeEquals($parameters, 'parameters', $operation);
    }

    public function testGetResponsesReturnsResponses()
    {
        $this->markTestIncomplete('Responses not done yet');
    }

    public function testSetResponsesSetsResponses()
    {
        $this->markTestIncomplete('Responses not done yet');
    }

    public function testGetSchemesReturnsSchemes()
    {
        $schemes = [ 'http' ];

        $operation = new Operation;
        $this->setProperty($operation, 'schemes', $schemes);
        $result = $operation->getSchemes();

        $this->assertEquals($schemes, $result);
    }

    public function testSetSchemesSetsSchemes()
    {
        $schemes = [ 'http' ];

        $operation = new Operation;
        $operation->setSchemes($schemes);

        $this->assertAttributeEquals($schemes, 'schemes', $operation);
    }

    public function testGetDeprecatedReturnsDeprecated()
    {
        $deprecated = false;

        $operation = new Operation;
        $this->setProperty($operation, 'deprecated', $deprecated);
        $result = $operation->getDeprecated();

        $this->assertEquals($deprecated, $result);
    }

    public function testSetDeprecatedSetsDeprecated()
    {
        $deprecated = false;

        $operation = new Operation;
        $operation->setDeprecated($deprecated);

        $this->assertAttributeEquals($deprecated, 'deprecated', $operation);
    }

    public function testGetSecurityReturnsSecurity()
    {
        $this->markTestIncomplete('Security not implemented yet');
    }

    public function testSetSecuritySetsSecurity()
    {
        $this->markTestIncomplete('Security not implemented yet');
    }
}
