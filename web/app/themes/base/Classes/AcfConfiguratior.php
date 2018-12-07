<?php

namespace Base;

class AcfConfiguratior
{
    public function __construct()
    {
        add_action('acf/init', [$this, 'add_google_api_key']);
    }

    public function add_google_api_key()
    {
        acf_update_setting('google_api_key', getenv('GOOGLE_MAPS_API_KEY'));
    }
}