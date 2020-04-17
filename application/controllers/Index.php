<?php

use Yaf\Controller_Abstract;
/**
 * @name IndexController
 * @author root
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $product = \App\Models\Product::all()->toArray();
        var_dump($product);
        echo 'hello world';
    }
}
