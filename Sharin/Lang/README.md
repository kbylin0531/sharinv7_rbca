如果xx.php中想要进行分类如：
food,animal...
可以拆分成
zh-cn/food.inc
zh-cn/animal.inc
让后在
zh-cn.php 中包含它们


这样做可以避免单个目录过于庞大繁琐，因为缓存的缘故效率不会受到影响
