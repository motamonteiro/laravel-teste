<?php

namespace App\Enums;

abstract class PermissionEnum extends Enum
{
    const USER     = ['value' => '1', 'label'=>'Manter usuários'];
    const PRODUCT  = ['value' => '2', 'label'=>'Manter produtos'];
    const CATEGORY = ['value' => '3', 'label'=>'Manter categorias'];
    const BRAND    = ['value' => '4', 'label'=>'Manter marcas'];
}