<?php

namespace MinimalOriginal\SecurityBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MinimalSecurityBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
