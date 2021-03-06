<?php
/**
 * @Description: 框架全局事件
 * @author: Xiao Nian
 * @date: 2020-06-15 09:40:22
 */

namespace EasySwoole\EasySwoole;

use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Message\Status;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {
        // TODO: Implement mainServerCreate() method.
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        $response->withHeader('Content-type', 'application/json;charset=utf-8');
        //不支持跨域访问
		//$response->withHeader('Access-Control-Allow-Origin', '*');
		//$response->withHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
		//$response->withHeader('Access-Control-Allow-Credentials', 'true');
		//$response->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, token');
		if ($request->getMethod() === 'OPTIONS') {
			$response->withStatus(Status::CODE_OK);
			return false;
		}
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}
