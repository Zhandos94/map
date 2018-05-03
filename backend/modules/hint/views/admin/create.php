<?php

use \yii\helpers\Html;

$this->title = Yii::t('common', 'Интерактивная инструкция добавления');
?>

<h1 class="pull-right"> <?= Html::encode($this->title); ?></h1>
<div class="clearfix"></div>


<div class="app-admin-content">

    <?= $this->render('_form', ['model' => $hint]); ?>

</div>



