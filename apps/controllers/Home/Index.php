<?php
/**
 * Created by PhpStorm.
 * User: zhaoye
 * Date: 16/7/15
 * Time: 下午3:58
 */

namespace controllers\Home;

use ZPHP\Cache\Factory;
use ZPHP\Cache\ICache;
use ZPHP\Controller\ApiController;
use ZPHP\Controller\Controller;
use ZPHP\Core\Config;
use ZPHP\Core\Log;
use ZPHP\Core\Db;
use ZPHP\Coroutine\Http\HttpClientCoroutine;
use ZPHP\Db\Mongo;
use ZPHP\Manager\Redis;
use ZPHP\Model\Model;

class Index extends Controller{
    public function index(){

        //使用1-封装在service层,可以不写yield
//        $testservice = new TestService();
//        $data = $testservice->test();
//        return $data;

        //使用2-也可直接在controller层,但是调用底层需要写yield
//        yield Db::redis()->cache('abcd1',1111);
        $data = yield Db::redis()->cache('abcd1');
        $res['cache'] = $data;
//        $user = yield table('admin_user')->where(['id' => 2])->find();
//        $res['user'] = $user;
//        $httpClient = new HttpClientCoroutine();
//        $data = yield $httpClient->request('http://speak.test.com/');
        //$postData 为空则表示是get请求,不为空为post请求
//        $res['http'] = $data;
        $this->assign('data', $res);
        $this->display();


//        $res['last_sql'] = Db::getLastSql();
//        return $res;


//        $httpClient = new HttpClientCoroutine();
//        $data = yield $httpClient->request('http://speak.test.com/');
//        $service = new TestService();
//        $sql =  $service->test();
//        $user1 = yield Db::table()->query($sql);
//
//        $res['body'] =$data;
//        return $res;
        //协程的action


//        $sql= 'select * from admin_user where id=1';
//        $res = yield Db::table()->query($sql);
//        return $res;
        //非协程的action
//        $res['aaa'] = 111;
//        return $res;
    }


    public function abcd(){
        echo json_encode(['test'=>2]);
    }
}