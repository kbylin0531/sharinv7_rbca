<?php

/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-10-10
 * Time: 下午1:10
 */
class BusytradeCategory extends B2BCategory
{
    protected $address = 'http://www.busytrade.com/buying_leads/catagory.php';
    private $cate_temp = [];
    protected $top_parent_id = 0;
    public function getCategoryLeaves(){
        if(false !== $this->_getCateRecu($this->top_parent_id)){
            return $this->cate_temp;
        }
        return false;
    }

    private function _getCateRecu($catID,$level=1,$parent=[]){
        if($level === 1) $this->cate_temp = [];
        if($level < 3){
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
        $content = self::post($this->address,http_build_query([
            'action' =>'expand_catagory',
            'levelLimit' => 2,
            'parentNodeId' => $catID,
        ]));
        $result = [];
        $res = self::json2Array($content);
        $len =count($res);
        if($len){
            for($i=0; $i<$len; $i++){
                $id = $res[$i]['cat_id'];
                $name =$res[$i]['cat_name'];
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