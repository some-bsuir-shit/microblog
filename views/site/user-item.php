<?php

use yii\helpers\Url;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="<?= Url::to(['/site/user-posts', 'userId' => $model->id]) ?>">
                <span class="glyphicon glyphicon-user"></span>
                <?= $model->username ?>
            </a>
        </h3>
    </div>
    <div class="panel-body">
        <ul class="list-unstyled">
            <li><b>Name: </b><?= $model->name ?></li>
            <li><b>Email: </b><?= $model->email ?></li>
            <li><b>City: </b><?= $model->city->title ?></li>
            <li><b>Country: </b><?= $model->city->country->title ?></li>
        </ul>
    </div>
</div>
