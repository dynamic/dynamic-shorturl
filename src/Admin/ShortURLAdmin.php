<?php

namespace Dynamic\ShortURL\Admin;

use Dynamic\ShortURL\Model\ShortURL;
use SilverStripe\Admin\ModelAdmin;

class ShortURLAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array(
        ShortURL::class,
    );

    /**
     * @var string
     */
    private static $url_segment = 'short-urls';

    /**
     * @var string
     */
    private static $menu_title = 'Short URLs';
}
