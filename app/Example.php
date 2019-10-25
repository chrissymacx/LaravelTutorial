<?php
/**
 * Created by PhpStorm.
 * User: putertwo
 * Date: 2019-04-29
 * Time: 13:16
 */

namespace App;

class Example {

    protected $foo;

    public function __construct(Foo $foo) {

        $this->foo = $foo;

    }


}