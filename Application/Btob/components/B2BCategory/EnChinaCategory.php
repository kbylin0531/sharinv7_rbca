<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-9-27
 * Time: 上午11:23
 * 无需密码　post buy lead 页面即可获取
 */
set_time_limit(0);
class EnChinaCategory extends B2BCategory {
    protected $address = 'http://my.en.china.cn/ajax.php?op=getindustries';
    /**
     * 获取末梢列表
     * @return array|bool
     */
    protected $top_parent_id = 0;
    public function getCategoryLeaves(){
        if(false !== $this->_getCateRecu($this->top_parent_id)){
            return $this->cate_temp;
        }
        return false;
    }
    private $cate_temp = [];

    private function _getCateRecu($catID,$level=1,$parent=[]){
        if($level === 1) $this->cate_temp = [];
        if($level < $this->max_level){
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
        $address = $catID ? $this->address.'&parentid='.$catID : $this->address.'&parentid=0';
        $res = self::json2Array(self::get($address,$catID));
        $result = [];
        $len =count($res);
        if($len){
            for($i=0;$i<$len;$i++){
                $id  = $res[$i]['id'];
                $name =$res[$i]['name'];
                $result[$id]=[
                    'id'=>$id,
                    'name'=>$name,
                    'leaf' =>$name,
                ];
            }
        }else{
            return $result =[];
        }
        return $result;
    }



}
