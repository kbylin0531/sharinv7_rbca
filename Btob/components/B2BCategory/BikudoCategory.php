<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-10-8
 * Time: 下午3:08
 */

class BikudoCategory extends B2BCategory
{


    /**
     * 获取末梢列表
     * @return array|bool
     */
    public function getCategoryLeaves(){
        $login_addr ='http://www.bikudo.com/login.do';
        $addr ='http://www.bikudo.com/cats.do';
        //以下两项不需要修改
        $pfields =[
            'sb_type'    =>0,
            'id'         =>0,
            'return_path'=>"",
            'submit'     =>"Sing In",
            'remember_user'   =>1,
            'username'   =>'1478595387@qq.com',
            'pwd'        =>'liguobing1223',
        ];
        $contents = self::post($login_addr,$addr,$pfields);
        preg_match_all('/<input (.*) id=(.*) value="(.*)"(.*)>(.*)<\//U',$contents,$k);
        $num=count($k[2]);
        $cate_temp=[];
        if(isset($k[2][0])){
            for($i=0;$i<$num;$i++){
                $cate_temp[$k[2][$i]]['id']=$k[2][$i];
                $cate_temp[$k[2][$i]]['name']=$k[3][$i];
                $cate_temp[$k[2][$i]]['leaf']=$k[5][$i];
            }
        }
        return $cate_temp;

    }


    /**
     * 模拟post登录请求
     * @param $log_url
     * @param $url
     * @return string
     */
    protected static function post($log_url,$url,$fields, $header = false, array $opts = [])
    {
        //1模拟登录
        //POST数据，获取COOKIE,cookie文件放在网站的temp目录下
        $cookie_file = tempnam('./temp','cookie');
        $ch = curl_init($log_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        if ($opts) foreach ($opts as $k => $v) {
            curl_setopt($ch, $k, $v);
        }
        curl_exec($ch);
        curl_close($ch);

        //2获取数据
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_REFERER, $url); //伪装REFERER
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $content = curl_exec($ch);
        curl_close($ch);
        //清理cookie文件
        is_file($cookie_file) and unlink($cookie_file);
        return false === $content ? '' : (string)$content;
    }






}