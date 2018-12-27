<?php
namespace app\api\controller;

use app\service\UserService;

/**
 * 用户地址
 * @author   Devil
 * @blog     http://gong.gg/
 * @version  0.0.1
 * @datetime 2017-03-02T22:48:35+0800
 */
class UserAddress extends Common
{
    /**
     * [__construct 构造方法]
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  0.0.1
     * @datetime 2016-12-03T12:39:08+0800
     */
    public function __construct()
    {
        // 调用父类前置方法
        parent::__construct();

        // 是否登录
        $this->Is_Login();
    }

    /**
     * 获取用户地址详情
     * @author   Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2018-07-18
     * @desc    description
     */
    public function Detail()
    {
        $params = $this->data_post;
        $params['user'] = $this->user;
        $ret = UserService::UserAddressRow($params);
        return json($ret);
    }

    /**
     * 获取用户地址列表
     * @author   Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2018-07-18
     * @desc    description
     */
    public function Index()
    {
        $ret = UserService::UserAddressList(['user'=>$this->user]);
        return json($ret);
        
    }

    /**
     * 用户地址保存
     * @author   Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2018-07-18
     * @desc    description
     */
    public function Save()
    {
        $params = $this->data_post;
        $params['user'] = $this->user;
        $ret = UserService::UserAddressSave($params);
        return json($ret);
    }

    /**
     * 删除地址
     * @author   Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2018-07-18
     * @desc    description
     */
    public function Delete()
    {
        $params = $this->data_post;
        $params['user'] = $this->user;
        $ret = UserService::UserAddressDelete($params);
        return json($ret);
    }

    /**
     * 默认地址设置
     * @author   Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2018-07-18
     * @desc    description
     */
    public function SetDefault()
    {
        $params = $this->data_post;
        $params['user'] = $this->user;
        $ret = UserService::UserAddressDefault($params);
        return json($ret);
    }

}
?>