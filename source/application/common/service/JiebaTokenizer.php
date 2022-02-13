<?php

namespace app\common\service;

use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use TeamTNT\TNTSearch\Support\TokenizerInterface;

class JiebaTokenizer implements TokenizerInterface
{
    public function __construct(array $options = [])
    {
        Jieba::init($options);
        if (isset($options['user_dict'])) {
            Jieba::loadUserDict($options['user_dict']);
        }
        Finalseg::init($options);
    }

    public function tokenize($text,$stopwords = [])
    {
        $tokens = Jieba::cutForSearch($text);
        return $tokens;
    }
    public function getPattern(){}
}