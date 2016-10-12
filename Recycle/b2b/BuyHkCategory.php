<?php

$content = file_get_contents(__DIR__.'/aaaaa.js');
//print_r($content);
//  $pa ='#cat(.*) = new Category(.*)#gU';
//$pa ='/[( cat(.*) = new Category)\(（][\s\S]*[\)）]/U';
$pa ='/([\d])\s+=\s+new\s+Category\([\w\d]+,\s+[\"\'](\d+)[\"\'],\s+[\"\'](.*?)[\"\']\)/';
$result = [];
if(preg_match_all($pa, $content, $matches) and isset($matches[0])){
    $len = count($matches[0]);
    $cat0 = $cat1 = $cat2 = $cat3 = $cat4 = [
        'name'  => '',
    ];
    $prev_stage = 1;
    for ($i=0; $i < $len; $i++) {
        $level = $matches[1][$i];
        $id = $matches[2][$i];
        $name = $matches[3][$i];

        $lastlevel = $level - 1 ;

        $levelnm = "cat{$level}";
        $lastlevelnm = "cat{$lastlevel}";

        $lastlevel = $$lastlevelnm;
        $$levelnm = $result[] = [
            'id'    => $id,
            'name'  => $lastlevel['name']? $lastlevel['name'].' > '.$name : $name,
            'level' => $level,
        ];
    }

echo '<pre>';
    print_r([
        array_slice($result,0,10)
    ]);



}