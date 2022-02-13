<?php

namespace app\common\service;

use TeamTNT\TNTSearch\Stemmer\PorterStemmer;
use TeamTNT\TNTSearch\TNTSearch;

class TNTSearchService
{
    protected $indexName = "title";

    protected $config = [];

    protected $tnt;

    public function __construct()
    {
        $config = [
            'driver' => 'Sqllite',
            'host' => config("database.hostname"),
            'database' => config("database.database"),
            'username' => config("database.username"),
            'password' => config("database.password"),
            'storage' => WEB_PATH . 'tntsearch',
            'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class//optional
        ];
        $this->config = $config;
        $this->tnt = new TNTSearch();
        $this->tnt->loadConfig($this->config);
    }

    /**
     * 创建索引
     * @param $token
     *
     */
    public function createIndex($token){
        $indexer = $this->tnt->createIndex($this->indexName);
        $indexer->query('SELECT id,title FROM yoshop_camera_subject;');
        $indexer->setTokenizer($token);
        $indexer->inMemory = true;
        $indexer->run();
    }

    /**
     *
     * @param $keyword
     * @return array
     * @throws \TeamTNT\TNTSearch\Exceptions\IndexNotFoundException
     */
    public function search($keyword){
        $tnt=$this->tnt;
        $tnt->selectIndex($this->indexName);
        $tnt->fuzziness = false;
        $tnt->setTokenizer();
        $res = $tnt->search($keyword);
        return $res;
    }
}