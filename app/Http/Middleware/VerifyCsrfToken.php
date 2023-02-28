<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/management/contact/import/data',
        'management/product/import/data',
        '/management/check-route',
        "/management/module/create",
        "/management/get-module-view-type",
        "/management/modules-permission-update",
        "/management/render-sidebar",
        "/management/push-notification-subscription",
        "/add-to-cart"
     
    ];
}
