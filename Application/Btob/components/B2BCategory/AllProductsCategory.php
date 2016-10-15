<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-9-26
 * Time: 下午2:43
 */
class AllProductsCategory extends B2BCategory {

    /**
     * 获取末梢列表
     * @return array|bool
     */
    protected $address = 'http://submit.allproducts.com/include/SelectPC.php?language=en&cno=1';
    private $cate_temp = [];
    protected $top_parent_id = '';

    public function getCategoryLeaves(){
        if(false !== $this->_getCateRecu($this->top_parent_id)){
            return $this->cate_temp;
        }
        return false;
    }
    private function _getCateRecu($catID,$level=1,$parent=[]){
        if($level === 1) $this->cate_temp = [];
        if($level <= $this->max_level){
            $list = $this->getCategory($catID,$level);
            if($list) foreach ($list as $item){
                $id = $item['id'];
                $leaf = $item['name'];
                empty($parent['name']) or $item['name'] = $parent['name'].' > '.$item['name'];
                if($this->hasChild($item,$level+1)){
                    $this->_getCateRecu($id,$level+1,$item);
                } else {
                    //抵达末梢
                    $this->cate_temp[$id] = [
                        'id'    => $id,
                        'name'  => $item['name'],
                        'leaf'  => $leaf,
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
        $address = $catID ? $this->address.'&select_code='.$catID : $this->address;
        $content = self::get($address);
        $result = [];
        if(preg_match_all('#<a href=(SelectPC.php\?language=en&cno=1&select_code=(.*))>(.*)</a>#U',$content,$matches)){
            $len = count($matches[1]);
            if($len){
                for($i = 0 ; $i < $len ; $i ++){
                    $id = $matches[2][$i];
                    $name = $matches[3][$i];
                    $result[$id] = [
                        'id'    => $id,
                        'name'  => $name,
                        'leaf'  => $name,
                    ];
                }
            }else{
                isset($result[$catID]) or $result[$catID] = [];
            }
        }
        return $result;
    }





}