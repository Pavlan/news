<?php

return [
    '^admin$' => ['controller' => 'login', 'action' => 'index', 'prefix' => 'Admin'],
    '^admin/?(?P<controller>[a-z]+)/?(?P<action>[a-z]+)?/?(?P<params>[a-z0-9-=&]+)?$' => ['prefix' => 'Admin'],

    '^$' => ['controller' => 'news', 'action' => 'index'],
    '^(?P<controller>[a-z]+)/?(?P<params>[a-z0-9-=&]+)?$' => ['action' => 'index'],
];