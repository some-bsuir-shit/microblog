<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\forms\RegistrationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to register:</p>

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-sm-3\">{input}</div>\n<div class=\"col-sm-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'repeatPassword')->passwordInput() ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'city_id')->dropDownList($model->cityList) ?>

    <div class="form-group">
        <div class="col-sm-12">
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
