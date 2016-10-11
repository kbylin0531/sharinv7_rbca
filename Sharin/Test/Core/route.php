<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-11
 * Time: 下午4:13
 */
namespace {
    use PHPUnit\Framework\TestCase;
    use Sharin\Core\Router;
    use Sharin\Core\URLer;

    include __DIR__.'/../../unitest.module';

    class RouterTest extends TestCase {


        public function testFetchKeyValuePair(){

            $arr = [
                'k1' => 'v1',
                'k2' => 'v2',
            ];
            $this->assertTrue($arr === Router::fetchKeyValuePair('/k1/v1/k2/v2/','/','/'));
            $this->assertTrue($arr === Router::fetchKeyValuePair('/k1=v1/k2=v2','/','='));
            $this->assertTrue($arr === Router::fetchKeyValuePair('k1/v1/k2/v2/','/','/'));
            $this->assertTrue($arr === Router::fetchKeyValuePair('/k1/v1/k2/v2/k3','/','/'));
        }


        public function testToParametersString(){
            $arr = [
                'k1' => 'v1',
                'k2' => 'v2',
            ];
            $this->assertTrue('k1/v1/k2/v2' === URLer::toParametersString($arr,'/'));
            $this->assertTrue('k1-v1-k2-v2' === URLer::toParametersString($arr,'-'));

            $this->assertTrue('k1/v1/k2/v2' === URLer::toParametersString($arr,'/','/'));
            $this->assertTrue('k1-v1-k2-v2' === URLer::toParametersString($arr,'-','-'));

            $this->assertTrue('k1-v1/k2-v2' === URLer::toParametersString($arr,'/','-'));
            $this->assertTrue('k1/v1-k2/v2' === URLer::toParametersString($arr,'-','/'));

        }

    }
}