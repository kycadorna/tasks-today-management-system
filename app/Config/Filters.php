<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf' => CSRF::class,
        'toolbar' => DebugToolbar::class,
        'forcehttps' => ForceHTTPS::class,
        'honeypot' => Honeypot::class,
        'invalidchars' => InvalidChars::class,
        'pagecache' => PageCache::class,
        'performance' => PerformanceMetrics::class,
        'secureheaders' => SecureHeaders::class,
        'auth' => \App\Filters\AuthFilter::class
    ];

    public array $globals = [
        'before' => [
            'csrf'
        ],
        'after' => [
            'toolbar'
        ]
    ];

    public array $methods = [];

    public array $filters = [];
}