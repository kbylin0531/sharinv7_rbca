<?php

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-14
 * Time: 上午10:31
 */
class XMLer
{
    /**
     * @param DOMNode $topnode
     * @return array
     */
    public static function travel(DOMNode $topnode){
        $values = [];
        if($topnode->hasChildNodes()) foreach ($topnode->childNodes as $node){
            $name = $node->nodeName;
            if($name === '#text'){
                continue;
            }
            //get basic info
            $info = [
                'name'  => $name,
                'attrs' => [],
                'children'  => [],
            ];
            //travel attr
            foreach ($node->attributes as $attr){
                $info['attrs'][$attr->nodeName] = $attr->nodeValue;
            }
            if(method_exists($node,'hasChildNodes') and $node->hasChildNodes()){
                $info['children'] = self::travel($node);;
            }
            if(!isset($values[$name])) $values[$name] = [];
            $values[$name][] = $info;
        }
        return $values;
    }

    /**
     * 进一步解析属性
     * @param $xml
     * @return array
     */
    public static function xml2ArrayInAdv($xml){
        $dom=new DOMDocument('1.0');
        $xml = trim(str_replace([
            '&','""'
        ],[
            '&amp;','&quot;'
        ],"<asura>$xml</asura>"));
        if(!$dom->loadXML($xml)){
            return [];
        }
        return self::travel($dom->firstChild);
    }
}


$arr = XMLer::xml2ArrayInAdv(file_get_contents(__DIR__.'/aaaaaa.html'));
var_dump($arr);