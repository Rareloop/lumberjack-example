<?php

namespace App\Providers;

use App\PrimerLoader;
use Rareloop\Lumberjack\Providers\ServiceProvider;
use Rareloop\Lumberjack\Config;

class OptionPagesProvider extends ServiceProvider
{
    public function boot(Config $config)
    {
        $optionPages = $config->get('option-pages');

        if (!is_array($optionPages)) {
            return;
        }

        foreach ($optionPages as $optionPage) {
            acf_add_options_page($optionPage);
        }
    }
}
