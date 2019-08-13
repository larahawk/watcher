<?php

namespace Larahawk\Watcher;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Larahawk
{

    public static function sendLogEvent($log, $request)
    {
        // todo: check for exception index being set
        $payload = array(
            'level' => $log->level,
            'message' => $log->message,
            'route' => $request->path(),
            'fullUrl' => $request->fullUrl(),
            'ip' => $request->ip(),
            'method' => $request->method(),
            'userAgent' => $request->header('User-Agent'),
            'userId' => isset($log->context['userId']) ? $log->context['userId'] : 0,
            'file' => isset($log->context['exception']) ? $log->context['exception']->getFile() : null,
            'line' => isset($log->context['exception']) ? $log->context['exception']->getLine() : null,
            'trace' => isset($log->context['exception']) ? $log->context['exception']->getTraceAsString() : null
        );

        if(defined('PHPUNIT_TESTS_RUNNING') && PHPUNIT_TESTS_RUNNING) {
            return $payload;
        }

        $client = new Client([
            'base_uri' => 'http://nginx',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        try {
            $client->request('POST', '/api/events/create', [
                'json' => $payload,
                'headers' => [
                    'Authorization' => env('LARAHAWK_API_KEY', '')
                ]
            ]);
        } catch(GuzzleException $e) {
            dd($e);
        }
    }

}