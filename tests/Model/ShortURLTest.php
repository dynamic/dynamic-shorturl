<?php

namespace Dynamic\ShortURL\Test\Model;

use Dynamic\ShortUR\Model\ShortURL;
use SilverStripe\Dev\SapphireTest;

class ShortURLTest extends SapphireTest
{
    /**
     * @var array
     */
    protected static $fixture_file = [
        '../fixtures.yml',
    ];

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ShortURL::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
    }

    /**
     *
     */
    public function testGetValidate()
    {
        $object = $this->objFromFixture(ShortURL::class, 'one');
        $object->Title = '';
        $this->expectException('ValidationException');
        $object->write();

        $this->objFromFixture(ShortURL::class, 'one');
        $object->URL = '';
        $this->expectException('ValidationException');
        $object->write();

        $this->objFromFixture(ShortURL::class, 'one');
        $object->CampaignSource = '';
        $this->expectException('ValidationException');
        $object->write();
    }

    /**
     *
     */
    function testGetLongURL()
    {
        $object = $this->objFromFixture(ShortURL::class, 'one');
        $expected = $object->URL . '?utm_source=' . $object->CampaignSource;
        $this->assertEquals($expected, $object->getLongURL());
    }
}