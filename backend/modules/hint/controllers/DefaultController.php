<?php
/**
 * Created by PhpStorm.
 * User: zh.zhumagali
 * Date: 05.03.2018
 * Time: 16:33
 */

namespace backend\modules\hint\controllers;

use yii;
use yii\web\Response;
use backend\modules\hint\models\AppHint;

class DefaultController extends yii\web\Controller
{
    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'roles' => ['@'],
                'actions' => ['index', 'get-hint'],
            ],
        ];
    }

    public function actionIndex()
    {
        return true;
    }

    /**
     * actionGetHelp return intro option value
     * @param  string $page_name
     * @return array
     */
    public function actionGetHint($page_name)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $option = [
            'nextLabel' => Yii::t('hint', 'Вперед'),
            'prevLabel' => Yii::t('hint', 'Назад'),
            'skipLabel' => Yii::t('hint', 'Пропустить'),
            'doneLabel' => Yii::t('hint', 'Готово'),
        ];

        $model = AppHint::find()
            ->select(['element_id', 'message', 'step', 'position'])
            ->where(['page_name' => $page_name])
            ->asArray()
            ->all();
        if ($model) $model['option'] = $option;

        return $model;
    }
}