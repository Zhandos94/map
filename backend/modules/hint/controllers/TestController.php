<?php
/**
 * Created by PhpStorm.
 * User: zh.zhumagali
 * Date: 05.03.2018
 * Time: 14:32
 */

namespace backend\modules\hint\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'roles' => ['@'],
                'actions' => ['index', 'test'],
            ],
        ];
    }

    public function actionIndex()
    {
       return $this->render('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}