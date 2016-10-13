<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-9-29
 * Time: 上午10:22
 */
set_time_limit(0);
class AsianPdCategory extends B2BCategory{

    /**
     * 获取末梢列表
     * @return array|bool
     */
    protected $address ='https://member.asianproducts.com/modules.php?name=rfq&action=selectCategory';

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
                if(!empty($item['hasChild'])) {
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
    protected function hasChild($node){
        return !empty($node['last']) and ('N' === $node['last']);
    }
    protected function requestCategory($catID,$level){
        $address = $catID ? $this->address.'&category_id='.$catID.'&rfq_id=&mode=new' : $this->address.'&category_id=root&rfq_id=&mode=new';

        $content = self::get($address);

        $result = [];
        if(preg_match_all('%<a href=\"(.*?&category_id=(.*)&rfq_id=(.*)&mode=(.*))\">(.*?)</a>%U',$content,$matches)){
            $len = count($matches[1]);
            for($i = 0 ; $i < $len ; $i ++){
                $id = $matches[2][$i];
                $name = $matches[5][$i];
                $result[$id] = [
                    'id'    => $id,
                    'name'  => $name,
                    'leaf'  => $name,
                    'hasChild'  => true,
                ];
            }
        }
        if(preg_match_all('%<td width=\"(.*)\">(.*?)</td>%U',$content,$arr)){
            $karr = $varr = [];
            for($i=0;$i<count($arr[1]);$i++){
                if($i%2==0){
                    preg_match_all('/<input (.*) value="(.*)"(.*)>/U',$arr[2][$i],$k);
                    if(!empty($k[2])){
                        $karr[]=$k[2][0];
                    }
                }else{
                    preg_match_all('/<.*?>(.*?)<\/.*?>/is',$arr[2][$i],$v);
                    //print_r($v);
                    $varr[]=$v[1][0];
                }
            }
            $len = count($karr);
            for($i = 0 ; $i < $len ; $i ++){
                $id = preg_replace("/<a [^>]*>|<\/a>/","",$karr[$i]);
                $name = preg_replace("/<a [^>]*>|<\/a>/","",$varr[$i]);
                $result[$id] = [
                    'id'    => $id,
                    'name'  => $name,
                    'leaf'  => $name,
                    'hasChild'  => false,
                ];
            }
        }
        return $result;
    }



}