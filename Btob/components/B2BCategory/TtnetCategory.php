<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-10-12
 * Time: 上午10:12
 */
class TtnetCategory extends B2BCategory {
    protected $address = 'http://www.ttnet.net/classify/level.json';
    protected $top_parent_id = '0';
    public function getCategoryLeaves(){
        if(false !== $this->_getCateRecu($this->top_parent_id)){
            return $this->cate_temp;
        }
        return false;
    }
    private $cate_temp = [];
    private function _getCateRecu($catID,$level=1,array $parent = []){
        if(1 === $level){
            $this->cate_temp = [];
        }
        if($level < 5){
            $list = $this->getCategory($catID);
            if($list) foreach ($list as $item){
                $id = $item['id'];
                $name = $item['name'];
                if($level !== 2 and !empty($parent['name'])){
                    $item['name'] = "{$parent['name']} > {$item['name']}";
                }
                if($this->hasChild($item,$level+1)){
                    $this->_getCateRecu($id,$level+1,$item);
                }else{
                    //抵达末梢
                    $this->cate_temp[$id] = [
                        'name'  => $item['name'],
                        'id'    => $id,
                        'leaf'  => $name,
                    ];
                }
            }
        }
        return true;
    }

    protected function hasChild($node,$level){
        $id = $node['id'];
        $content = $this->getCategory($id,$level);
        if(is_array($content) and count($content)){
            return true;
        }
        return false;
    }


    protected function requestCategory($catID,$level){
        $address = $catID ? $this->address.'?level='.$level.'&value='.$catID : $this->address.'?level=1&value=0';
        $content = self::get($address);
        $res = self::json2Array($content);
        $result = [];
        if($res[0] && $len =count($res[0])){
            for($i=0; $i<$len; $i++){
                $id = $res[0][$i]['value'];
                $name = $res[0][$i]['text'];
                $result[$id]=[
                    'id'=>$id,
                    'name'=>$name,
                    'leaf'=>$name,
                ];
            }
        }else{
            return $result =[];
        }
        return $result;
    }

}