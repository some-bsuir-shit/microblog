<?php

$this->title = $user->username.'\'s Posts';

?>

<div class="row">

    <div class="col-sm-6">
        <h3><?= $this->title ?></h3>

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $provider,
            'itemView' => 'post-item',
        ]) ?>
    </div>

    <div class="col-sm-6">
        <h3>Profile info</h3>

        <?= \yii\widgets\DetailView::widget([
            'model' => $user,
            'attributes' => [
                'first_name',
                'last_name',
                'email',
                [
                    'attribute' => 'city',
                    'value' => function($model) {
                        return $model->city->title;
                    }
                ],
                [
                'attribute' => 'country',
                    'value' => function($model) {
                        return $model->city->country->title;
                    }
                ],
            ],
        ]) ?>
    </div>

</div>
