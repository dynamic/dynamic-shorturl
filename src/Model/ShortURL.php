<?php

namespace Dynamic\ShortURL\Model;

use Hpatoio\Bitly\Client;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationResult;

class ShortURL extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Short URL';

    /**
     * @var string
     */
    private static $plural_name = 'Short URLs';

    /**
     * @var
     */
    private $bitly_token;

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
        'URL' => 'Varchar(255)',
        'CampaignSource' => 'Varchar(255)',
        'CampaignMedium' => 'Varchar(255)',
        'CampaignName' => 'Varchar(255)',
        'CampaignTerm' => 'Varchar(255)',
        'CampaignContent' => 'Varchar(255)',
        'ShortURL' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'Title',
        'URL',
        'ShortURL',
    ];

    /**
     * @var array
     */
    private static $searchable_fields = [
        'Title',
        'URL',
        'CampaignSource',
        'CampaignMedium',
        'CampaignName',
        'CampaignTerm',
        'CampaignContent',
        'ShortURL',
    ];

    /**
     * @var string
     */
    private static $table_name = 'ShortURL';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->dataFieldByName('URL')
            ->setDescription('URL to shorten and tag');

        $fields->dataFieldByName('CampaignSource')
            ->setDescription(
                'Use to identify a search engine, newsletter name, or other source. Example: google'
            );

        $fields->dataFieldByName('CampaignMedium')
            ->setDescription(
                'Use utm_medium to identify a medium such as email or cost-per- click. Example: cpc'
            );

        $fields->dataFieldByName('CampaignName')
            ->setDescription(
                'Used for keyword analysis. Use utm_campaign to identify a specific product promotion or 
                strategic campaign. Example: utm_campaign=spring_sale'
            );

        $fields->dataFieldByName('CampaignTerm')
            ->setDescription(
                'Used for paid search. Use utm_term to note the keywords for this ad. Example: running+shoes'
            );

        $fields->dataFieldByName('CampaignContent')
            ->setDescription(
                'Used for A/B testing and content-targeted ads. Use utm_content to differentiate ads or links 
                that point to the same URL. Examples: logolink or textlink'
            );

        $fields->addFieldToTab('Root.Main', ReadonlyField::create('LongURL', 'Long URL', $this->getLongURL()));

        $short = $fields->dataFieldByName('ShortURL');
        $short = $short->performReadonlyTransformation();
        $fields->addFieldToTab('Root.Main', $short);

        return $fields;
    }

    /**
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Title) {
            $result->addError('A Title is required before you can save');
        }

        if (!$this->URL) {
            $result->addError('A URL is required before you can save');
        }

        if (!$this->CampaignSource) {
            $result->addError('A Campaign Source is required before you can save');
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return Config::inst()->get(ShortURL::class, 'bitly_token');
    }

    /**
     * @return string
     */
    public function getLongURL()
    {
        $vars = [
            'utm_source' => $this->CampaignSource,
            'utm_medium' => $this->CampaignMedium,
            'utm_campaign' => $this->CampaignName,
            'utm_term' => $this->CampaignTerm,
            'utm_content' => $this->CampaignTerm,
        ];
        $LongURL = $this->URL . '?' . http_build_query($vars);
        return $LongURL;
    }

    /**
     *
     */
    public function onBeforeWrite()
    {
        if ($token = $this->getToken()) {
            $bitly = new Client($token);

            $response = $bitly->Shorten([
                'longUrl' => $this->getLongURL(),
                'format' => 'txt'
            ]);

            $this->ShortURL = $response['url'];
        }

        parent::onBeforeWrite();
    }
}
