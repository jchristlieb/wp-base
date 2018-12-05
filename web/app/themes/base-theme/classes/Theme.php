<?php

namespace BaseTheme;

class Theme
{
    //
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'setup']);
    }
}