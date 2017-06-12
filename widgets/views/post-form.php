<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'text')->textarea(); ?>

<?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
