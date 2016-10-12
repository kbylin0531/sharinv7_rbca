<?php

namespace {

    use Sharin\Developer;

    require __DIR__.'/../Sharin/web.module';
    Sharin::register();
    Developer::closeTrace();
}