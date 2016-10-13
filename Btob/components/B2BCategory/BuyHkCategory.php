<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-10-11
 * Time: 下午4:35
 */
set_time_limit(0);
class BuyHkCategory extends B2BCategory
{
    protected $address = 'http://resource.buy-hk.com/v1/js/cate.js';
    /**
     * 获取末梢列表
     * @return array|bool
     */
    private $cate_temp = [];
    public function getCategoryLeaves(){
        $address ='http://resource.buy-hk.com/v1/js/cate.js';
        $content = self::get($address);
//        $content = file_get_contents($url);
        $pa ='/([\d])\s+=\s+new\s+Category\([\w\d]+,\s+[\"\'](\d+)[\"\'],\s+[\"\'](.*?)[\"\']\)/';
        $result = [];
        if(preg_match_all($pa, $content, $matches) and isset($matches[0])){
            $len = count($matches[0]);
            $cat0 =
            $cat1 = $cat2 = $cat3 = $cat4 = [
                'name'  => '',
            ];

            for ($i=0; $i < $len; $i++) {
                $level = $matches[1][$i];
                $id = $matches[2][$i];
                $name = $matches[3][$i];

                $lastlevel = $level - 1 ;

                $levelnm = "cat{$level}";
                $lastlevelnm = "cat{$lastlevel}";

                //上一层最新的元素
                $lastlevel = $$lastlevelnm;

                //记录下当前层最新的一个元素
                $$levelnm = $result[] = [
                    'id'    => $id,
                    'name'  => $lastlevel['name']? $lastlevel['name'].' > '.$name : $name,
                    'leaf'  =>$name,
                    'level' => $level,
                ];
            }
           //echo "<pre>"; print_r($result);
            foreach ($result as $key => $value) {
                //echo "<pre>"; print_r($value);
                if($value['level']==3){
                    //获取到末梢
                    $id = $value['id'];
                    $name = $value['name'];
                    $leaf = $value['leaf'];
                    $this->cate_temp[$id] = [
                        'id'    => $id,
                        'name'  => $name,
                        'leaf'  => $leaf,
                    ];
                }
            }
            //echo "<pre>";print_r($this->cate_temp);

        }
            return $this->cate_temp;

    }



}

