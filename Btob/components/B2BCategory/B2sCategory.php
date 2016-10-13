<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-10-12
 * Time: 下午4:19
 */
set_time_limit(0);
class B2sCategory extends B2BCategory
{

    /**
     * 获取末梢列表
     * @return array|bool
     */
    public function getCategoryLeaves(){
           //获取第一层列表
        $address = 'http://www.b2s.com/myb2s/addproduct1.php?FolderID=0';
        $content =self::get($address);
        print_r($content);
        preg_match_all('/<option (.*)>(.*)<\/option>/',$content,$matches);
        dump($matches);

            die();
    }



}