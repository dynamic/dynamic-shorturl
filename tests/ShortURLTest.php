<?php

namespace Dynamic\ShortURL\Tests;

class ShortURLTest extends \SapphireTest
{
    /**
     * @var array
     */
    protected static $fixture_file = array(
        'shorturls/tests/fixtures.yml',
    );

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('Dynamic\\ShortURL\\ShortURL', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
    }

    /**
     *
     */
    public function testGetValidate()
    {
        $object = $this->objFromFixture('Dynamic\\ShortURL\\ShortURL', 'one');
        $object->Title = '';
        $this->setExpectedException('ValidationException');
        $object->write();

        $this->objFromFixture('Dynamic\\ShortURL\\ShortURL', 'one');
        $object->URL = '';
        $this->setExpectedException('ValidationException');
        $object->write();

        $this->objFromFixture('Dynamic\\ShortURL\\ShortURL', 'one');
        $object->CampaignSource = '';
        $this->setExpectedException('ValidationException');
        $object->write();
    }

    /**
     *
     */
    function testGetLongURL()
    {
        $object = $this->objFromFixture('Dynamic\\ShortURL\\ShortURL', 'one');
        $expected = $object->URL . '?utm_source=' . $object->CampaignSource;
        $this->assertEquals($expected, $object->getLongURL());
    }
}