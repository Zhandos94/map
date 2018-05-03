<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = Yii::t('common', 'Интерактивная инструкция');

?>


<h1 class="pull-right"> <?= Html::encode($this->title); ?></h1>
<div class="clearfix"></div>

<div>

    <?php Pjax::begin(); ?>

    <div class="hint-conttent">

        <p>
            <?= Html::a(Yii::t('common', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'page_name',
                'element_id',
                'message',
                'step',
                'position',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'headerOptions' => ['style' => 'width:50px'],
                ]
            ]
        ]); ?>

    </div>

    <?php Pjax::end(); ?>

</div>



