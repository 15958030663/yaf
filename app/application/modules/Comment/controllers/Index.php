<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/5/1
 * Time: 下午12:35
 */

class IndexController extends Yaf\Controller_Abstract{
    public $actions = [
        'index' => 'modules/Comment/actions/index/Index.php',
    ];
}