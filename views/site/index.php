<?php

/* @var $this yii\web\View */
/* @var $provider \yii\data\ActiveDataProvider */

$this->title = 'Main Page';

?>

<div class="row">

    <div class="col-sm-6 col-sm-offset-3">
        <?php if (Yii::$app->session->getFlash('posted')): ?>
            <div class="alert alert-success">
                Post was published
            </div>
        <?php endif ?>


        <?php if (!Yii::$app->user->isGuest): ?>
            <?= \app\widgets\PostForm::widget([
                'model' => $postForm,
            ]); ?>
        <?php endif; ?>

        <div style="margin-top: 10px">
            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $provider,
                'itemView' => 'post-item',
            ]) ?>
        </div>
    </div>

</div>

