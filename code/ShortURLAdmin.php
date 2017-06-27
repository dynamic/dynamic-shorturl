<?php

class ShortURLAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array(
        'ShortURL',
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