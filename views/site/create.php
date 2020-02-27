<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServicesModel */

$this->title = 'Create Services Model';
$this->params['breadcrumbs'][] = ['label' => 'Services Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list' => $list
    ]) ?>

</div>
