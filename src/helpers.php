<?php

use Aeforge\Dumper\Dumper;

if(!function_exists("dd"))
{
    /**
     * Dump and die
     *
     * @param mixed ...$vars
     * @return void
     */
    function dd($vars)
    {
        $dumper = new Dumper($vars);
        $dumper->dumpAndDie();
    }
}


if(!function_exists("dump"))
{
    /**
     * Dump only without ending the script
     *
     * @param mixed ...$vars
     * @return void
     */
    function dump($vars)
    {
        $dumper = new Dumper($vars);
        $dumper->dump();
    }
}