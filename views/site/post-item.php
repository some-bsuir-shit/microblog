<?php

use yii\helpers\Url;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="<?= Url::to(['/site/user-posts', 'userId' => $model->user->id]) ?>">
                <span class="glyphicon glyphicon-user"></span>
                <?= $model->user->username ?>
            </a>

            <?php if (!Yii::$app->user->isGuest && $model->user->id === $model->user_id): ?>
                <span class="pull-right label label-info">It's your post</span>
            <?php endif; ?>
        </h3>
    </div>
    <div class="panel-body">
        <?= nl2br($model->text) ?>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-left">
                    <?= $model->created_at ?>
                </div>
                <div class="pull-right">
                    <?php if (!Yii::$app->user->isGuest && $model->user->id === $model->user_id): ?>
                        <a href="<?=Url::to(['/site/delete-post', 'id' => $model->id])?>" data-confirm="Are you sure you want to delete this item?" data-method="post">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>
</div>
