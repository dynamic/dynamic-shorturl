<?php

namespace Dynamic\ShortURL\Test\Model;

use Dynamic\ShortURL\Model\ShortURL;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\ValidationException;

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
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testGetValidate()
    {
        $object = $this->objFromFixture(ShortURL::class, 'one');
        $object->Title = '';
        $this->expectException(ValidationException::class);
        $object->write();

        $this->objFromFixture(ShortURL::class, 'one');
        $object->URL = '';
        $this->expectException(ValidationException::class);
        $object->write();

        $this->objFromFixture(ShortURL::class, 'one');
        $object->CampaignSource = '';
        $this->expectException(ValidationException::class);
        $object->write();
    }

    /**
     *
     */
    public function testGetLongURL()
    {
        $object = $this->objFromFixture(ShortURL::class, 'one');
        $expected = $object->URL . '?utm_source=' . $object->CampaignSource;
        $this->assertEquals($expected, $object->getLongURL());
    }
}
