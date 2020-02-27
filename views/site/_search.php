<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'order_type') ?>

    <?php // echo $form->field($model, 'order_value') ?>

    <?php // echo $form->field($model, 'scheduled_date') ?>

    <?php // echo $form->field($model, 'street_address') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'zip') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'country') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
