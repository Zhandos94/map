<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
    .content-body {
        height: 150px;
    }
</style>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Map</h2>
                <p class="content-body">
                    Яндекс.Карты — поисково-информационная картографическая служба Яндекса. Открыта в 2004 году.
                    Есть поиск по карте, информация о пробках, прокладка маршрутов и панорамы улиц крупных и других городов[2].
                </p>

                <p> <?= \yii\helpers\Html::a(Yii::t('common', 'Map'), ['/site/map'], ['class' => 'btn btn-default']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Hint</h2>

                <p class="content-body">
                    When new users visit your website or product you should demonstrate your product features using a step-by-step guide.
                    Even when you develop and add a new feature to your product, you should be able to represent them to your users using a user-friendly solution.
                    Intro.js is developed to enable web and mobile developers to create a step-by-step introduction easily.
                </p>

                <p> <?= \yii\helpers\Html::a( Yii::t('common', 'Hint'), ['/hint/test/test'], ['class' => 'btn btn-default']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Hint admin panel</h2>

                <p class="content-body">
                    Admin panel for hint
                </p>

                <p> <?= \yii\helpers\Html::a( Yii::t('common', 'Hint Admin'), ['/hint/admin/index'], ['class' => 'btn btn-default']); ?></p>
            </div>
            </div>
        </div>
    </div>
</div>
