<?php
/**
 * Created by PhpStorm.
 * User: zh.zhumagali
 * Date: 06.03.2018
 * Time: 10:42
 */

namespace backend\modules\hint\controllers;

use yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\modules\hint\models\AppHint;
use backend\modules\hint\models\AppHintSearch;

class AdminController extends yii\web\Controller
{
    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'roles' => ['system.root'],
                'actions' => ['index', 'create', 'update', 'delete', 'validation-save', 'validation-update'],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new AppHintSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new AppHint();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('common', 'Успешно создано'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('common', 'Ошибка при сохранении'));
                Yii::error($model->getErrors(), 'hint');
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', ['hint' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = AppHint::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('common', 'Успешно обновлено'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('common', 'Ошибка обновления'));
                Yii::error($model->getErrors(), 'hint');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
        $model = AppHint::findOne($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', Yii::t('common', 'Успешно удалено'));
        } else {
            Yii::$app->session->setFlash('error', Yii::t('common', 'Ошибка удаления'));
            Yii::error($model->getErrors(), 'news');
        }

        return $this->redirect(['index']);
    }

    public function actionValidationSave()
    {
        $model = new AppHint();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}