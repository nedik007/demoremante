<?php

namespace App\Service\Import;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class Import
{

    /**
     * @param string $url
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function fetch(string $url)
    {
        $file = md5($url);
        if (Storage::disk('import')->exists($file)) {
            return Storage::disk('import')->get($file);
        }

        $client = new Client(['verify' => false]);
        $res = $client->request('GET', $url);
        $content = $res->getBody()->getContents();
        Storage::disk('import')->put($file, $content);

        return $content;
    }
}
