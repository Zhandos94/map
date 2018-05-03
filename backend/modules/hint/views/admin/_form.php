<?php
/**
 * Created by PhpStorm.
 * User: zh.zhumagali
 * Date: 07.03.2018
 * Time: 9:38
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="page-form">


    <?php $form = ActiveForm::begin(
        [
            'id' => 'apk-page-form',
            'validationUrl' => 'validation-save'
        ]
    ); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'page_name')
        ->textInput(['placeholder' => Yii::t('hint', '/hint/admin/index'), 'title' => 'url адрес без домена']) ?>

    <?= $form->field($model, 'element_id', ['enableAjaxValidation' => true, 'enableClientValidation' => false])
        ->textInput(['title' => Yii::t('hint', 'JavaScript id ')]) ?>

    <?= $form->field($model, 'message')->textInput() ?>

    <?= $form->field($model, 'step')->textInput() ?>

    <?= $form->field($model, 'position')->dropDownList([
        'bottom' => Yii::t('hint', 'вниз'),
        'top' => Yii::t('hint', 'верх'),
        'left' => Yii::t('hint', 'лево'),
        'right' => Yii::t('hint', 'право'),
    ], ['selected' => 'bottom']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('hint', 'Добавить') : Yii::t('hint', 'Обновить'), ['class' => 'btn btn-success', 'id' => 'sendBtn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
