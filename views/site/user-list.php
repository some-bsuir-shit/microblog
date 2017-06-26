<?php

$this->title = 'User List';

?>

<div class="row">


    <div class="col-sm-6 col-sm-offset-3">
        <h1>User List</h1>

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $provider,
            'itemView' => 'user-item',
        ]) ?>
    </div>

</div>
