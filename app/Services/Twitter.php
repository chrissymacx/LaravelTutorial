<?php
/**
 * Created by PhpStorm.
 * User: putertwo
 * Date: 2019-04-30
 * Time: 11:31
 */

namespace App\Services;


class Twitter
{
    protected $apiKey;

    public function __construct($apiKey)
    {

        $this->apiKey = $apiKey;

    }
}