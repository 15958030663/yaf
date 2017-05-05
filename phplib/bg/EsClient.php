<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/4/27
 * Time: 下午6:47
 */

namespace bg;
use Elasticsearch;

require_once (LIB_PATH . '/vendor/autoload.php');

class EsClient{
    private static $_clients;

    private function __construct(){
    }

    //获取client实例
    public static function getInstance( $param ){
        if(!isset($param['host']) || trim($param['host']) === ''){
            return false;
        }

        if(isset(self::$_clients[$param['host']])){
            return self::$_clients[$param['host']];
        }else{
            $host = [
                $param['host'],
            ];

            $client = \Elasticsearch\ClientBuilder::create()->setHosts($host)->build();
            if($client === null || $client === false){
                return false;
            }
            self::$_clients = [
                'index_name' => $param['index'],
                'index_type' => $param['type'],
                'client' => $client,
            ];

            return self::$_clients;
        }
    }

    //设置索引
    public static function push_map_index($param){
        $my_type = $param['type'];
        //设置索引
        $es_params = [
            'index' => $param['index'],   //索引
            'body' => [
                'settings' => [
                    'refresh_interval' => '5s',  //生效延时
                    'number_of_shards' => 1,  //索引分片
                    'number_of_replicas' => 0,  //副本数量
                ],
                'mappings' => [       //设置字段类型
                    "$my_type" => [
                        '_source' => [
                            'enabled' => true
                        ],
                        'properties' => [],
                    ],
                ],
            ],
        ];

        $hosts = [ $param['host'] ];
        $client = Elasticsearch\ClientBuilder::create()->build();

        $client->indices()->create($es_params);
        return true;

    }

    //删除索引
    public static function delete_index($param){
        $client = self::getInstance($param);
        if($client === false){
            return false;
        }
        $deleteParams['index'] = $client['index_name'];

        try{
            return $client['client']->indices()->delete($deleteParams);
        }catch ( \Exception $e){
            \ut\Log::fatal("delete message" . $e->getMessage());
            return false;
        }
        unset( self::$_clients[ $param['host'] ] );
    }

    //索引一个文档
    public static function add_document($param, $add_params){
        $client = self::getInstance($param);
        if($client === false){
            return false;
        }
        $id = intval($add_params['id']);
        unset($add_params['id']);

        $params = [
            'index' => $client['index_name'],   //索引
            'type' => $client['index_type'],    //类型
            'id' => $id,                        //id
            'body' => $add_params,              //主体
        ];

        try{
            $ret = $client['client']->index($params);
            return $ret;
        }catch (\Exception $e){
            \ut\Log::fatal("add message ". $e->getMessage());
            return false;
        }

    }

    //删除一个文档
    public static function delete_document($param, $id){
        $client = self::getInstance($param);
        if($client === false){
            return false;
        }

        $params = [
            'index' => $client['index_name'],
            'type' => $client['index_type'],
            'id' => intval($id),
        ];

        try{
            $ret = $client['client']->delete($params);
            return $ret;
        }catch (\Exception $e){
            \ut\Log::fatal("delete message " . $e->getMessage());
        }
    }

    //更新一个文档
    public static function update_document($param, $update_params){
        $client = self::getInstance($param);
        if($client === false){
            return false;
        }
        $id = intval($update_params['id']);
        unset($update_params['id']);
        $params = [
            'index' => $client['index_name'],
            'type' => $client['index_type'],
            'id' => $id,
            'body' => [
                'doc' => $update_params,
            ],
        ];

        try{
            $ret = $client['client']->update($params);
            return $ret;
        }catch (\Exception $e){
            \ut\Log::fatal("update message " . $e->getMessage());
        }

    }

    //获取一个document
    public static function get_document($param, $id){
        $client = self::getInstance($param);
        if($client === false){
            return false;
        }

        $params = [
            'index' => $client['index_name'],
            'type' => $client['index_type'],
            'id' => $id,
        ];

        try{
            $ret = $client['client']->get($params);
            return $ret;
        }catch (\Exception $e){
            \ut\Log::fatal("get message " . $e->getMessage());
            return false;
        }
    }


    //搜索
    public static function search($param, $search_param){
        $client = self::getInstance($param);
        if($client === false){
            //日志
            return false;
        }

        $searchParams = [
            'index' => $client['index_name'],
            'type' => $client['index_type'],
            'from' => intval($search_param['from']),
            'size' => intval($search_param['size']),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $search_param['word'],
                        'fields' => ['title', 'content']
                    ]
                ],
                'highlight' => [
                    'pre_tags' => ["<i class=\"highlight\">"],
                    'post_tags' => ["</i>"],
                    'fields' => [
                        'title' =>new \stdClass(),
                        'content' =>new \stdClass(),
                    ],
                ],
            ],
        ];

        if(isset($search_param['sort'])){
            $searchParams['body']['query']['sort'] = $search_param['sort'];
        }

        try{
            $result = $client['client']->search($searchParams);
            return $result;
        }catch (\Exception $e){
            \ut\Log::fatal("search message " . $e->getMessage());
            return false;
        }

    }


}