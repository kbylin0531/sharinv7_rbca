<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-18
 * Time: 下午1:10
 */

namespace Application\System\Model;


use Sharin\Library\Model;

/**
 * Class SiteModel 站点管理模型
 * @package Application\System\Model
 */
class SiteModel extends Model {

    protected $tablename = 'lx_website';
    protected $fields = [
        'name'          => null,
        'value'         => null,
        'title'         => null,
        'description'   => null,
    ];
//---------------------------------------- for general query -------------------------------------------------------------------------------//
    /**
     * @param bool $name_as_key
     * @return array|false
     */
    public function lists($name_as_key=false){
        $list = $this->select();
        if($list and $name_as_key){
            $temp = [];
            foreach ($list as $item){
                $temp[$item['name']] = $item['value'];
                unset($item['name']);
            }
            $list = $temp;
        }
        return $list;
    }
    /**
     * @param bool $format
     * @return array|false
     */
    public function getSideMenu($format=false){
        $list = $this->table('lx_menu')->where('type = 1')->order('`order` desc')->select();
        if($list and $format){
            $temp = [];
            foreach ($list as $item){
                $parent = $item['parent'];
                $id = $item['id'];
                unset($item['parent']);
                if($parent){
                    // is_sub
                    if(isset($temp[$parent])){
                        empty($temp[$parent]['children']) and $temp[$parent]['children'] = [];
                    }else{
                        $temp[$parent] = ['children'=>[]];
                    }
                    $temp[$parent]['children'][] = $item;
                }else{
                    //is top
                    if(isset($temp[$id])){
                        //has set children
                        $temp[$id] = array_merge($temp[$id],$item);//because item do not contain children
                    }else{
                        $temp[$id] = $item;
                    }
                }
            }
            $list = $temp;
        }
        return $list;
    }
    /**
     * @return array|false
     */
    public function getUserMenu(){
        $list = $this->table('lx_menu')->where('type = 2')->order('`order` desc')->select();
        return $list;
    }
//---------------------------------------- for management -------------------------------------------------------------------------------//
    public function revise(){
    }

}