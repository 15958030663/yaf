<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/4/27
 * Time: 下午6:41
 */
namespace conf;

class Search{

    const TYPE_LONG = 'integer';
    const TYPE_DOUBLE = 'double';
    const TYPE_STRING = 'string';

    public static $blog_param = [
        'host' => '127.0.0.1:9200',
        'index' => 'blog',
        'type' => 'article',
    ];

    public static $blog_column = [
        'id'      => ['博客ID', self::TYPE_LONG],
        'title'   => ['博客标题', self::TYPE_STRING],
        'content' => ['博客内容', self::TYPE_STRING],
    ];

}