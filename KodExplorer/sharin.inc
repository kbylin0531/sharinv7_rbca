<?php

namespace {

    use Sharin\Developer;

    require __DIR__.'/../Sharin/web.inc';
    Sharin::register();
    Developer::closeTrace();
}