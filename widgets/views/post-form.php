<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\assets\EmojiPickerAsset;

// TODO: fix emoji picker
EmojiPickerAsset::register($this);

?>



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'text')->textarea(['data-emojiable' => 'true']); ?>

<?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
