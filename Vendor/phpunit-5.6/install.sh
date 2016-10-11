#!/bin/bash

#获取当前脚本目录
path=$(cd "$(dirname "$0")"; pwd)

#想要在全局环境下执行测试，可以将phpunit拷贝（以下的操作需要管理员权限）
cp "$path/phpunit.patch" /usr/bin/phpunit
chmod a+x /usr/bin/phpunit