<?php
namespace app\api\controller;

use app\service\AnswerService;

/**
 * 用户留言
 * @author   Devil
 * @blog     http://gong.gg/
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Answer extends Common
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
    }

    /**
     * [Index 获取列表]
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
    public function Index()
    {
        // 登录校验
        $this->Is_Login();

        // 参数
        $params = input();
        $params['user'] = $this->user;

        // 分页
        $number = 10;
        $page = max(1, isset($this->data_post['page']) ? intval($this->data_post['page']) : 1);

        // 条件
        $where = AnswerService::AnswerListWhere($params);

        // 获取总数
        $total = AnswerService::AnswerTotal($where);
        $page_total = ceil($total/$number);
        $start = intval(($page-1)*$number);

        // 获取列表
        $data_params = array(
            'm'         => $start,
            'n'         => $number,
            'where'     => $where,
        );
        $data = AnswerService::AnswerList($data_params);

        // 返回数据
        $result = [
            'total'         =>  $total,
            'page_total'    =>  $page_total,
            'data'          =>  $data['data'],
        ];
        return json(DataReturn('success', 0, $result));
    }

    /**
     * 用户留言添加
     * @author   Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2018-07-17
     * @desc    description
     */
    public function Add()
    {
        // 登录校验
        $this->Is_Login();

        $params = $this->data_post;
        $params['user'] = $this->user;
        $ret = AnswerService::Add($params);
        return json($ret);
    }
}
?>