<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\Utils;

/* @var $this yii\web\View */
/* @var $model app\models\ServicesModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-index">

    <div class="body-content">
    <div class="services-model-form">
    <div class="row">
        <div class="col-xs-5" >
        <div class="col-xs-12 squareFields addAnOrder">
        <i class="glyphicon glyphicon-list-alt icontopright" aria-hidden="true"></i>
        <?php $form = ActiveForm::begin() ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                <?=$form->field($model, 'first_name')->textInput(['maxlength' => true]); ?>
                </div>
                <div class="form-group col-md-6">
                <?=$form->field($model, 'last_name')->textInput(['maxlength' => true]); ?>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                <?=$form->field($model, 'email')->textInput(['maxlength' => true]); ?>
                </div>
                <div class="form-group col-md-6">
                <?=$form->field($model, 'phone_number')->textInput(['maxlength' => true]); ?>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <?=$form->field($model, 'order_type')->dropDownList(['D' => 'Delivery', 'S' => 'Servicing' , 'I' => 'Installation']); ?>
                </div>
                <div class="form-group col-md-6">
                <?= $form->field($model, 'order_value', [
                    'template' => '{beginLabel}{labelTitle}{endLabel}<div class="input-group">
                    <span class="input-group-addon">$</span>
                    {input}
                    </div>{error}{hint}'
                ])->textInput(['maxlength' => true]); ?>
                </div>
            </div>


            <div class="form-row">
            <div class="form-group col-md-6">
            <?= $form->field($model, 'scheduled_date', [
            'template' => '{beginLabel}{labelTitle}{endLabel}<div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            {input}
            </div>{error}{hint}'
        ])->textInput(['class' => 'datepicker', 'maxlength' => true]); ?>
            </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                <?=$form->field($model, 'street_address')->textInput(['maxlength' => true]); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?=$form->field($model, 'city'); ?>
                </div>
                <div class="form-group col-md-6">
                    <?=$form->field($model, 'state'); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?=$form->field($model, 'zip'); ?>
                </div>
                <div class="form-group col-md-6">
                    <?=$form->field($model, 'country')->dropDownList(['can' => 'Canada', 'mex' => 'Mexico' , 'usa' => 'United States']); ?>
                    <?=$form->field($model, 'status')->hiddenInput(['value' => 'P']); ?>
                </div>
            </div>
            <?=$form->field($model, 'lat')->hiddenInput(); ?>
            <?=$form->field($model, 'lng')->hiddenInput(); ?>
                <div class="form-row ">
                    <div class="form-group col-md-6 text-left">
                        <?= Html::button('Preview', ['class' => 'btn btn-default', 'id' => 'btnPreview']); ?>
                    </div>
                    <div class="form-group col-md-6 text-right">
                        <?= Html::resetButton('Cancel', ['class' => 'btn btn-danger']); ?>
                        <?= Html::submitButton('Submit',  ['class' => 'btn btn-success']); ?>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
        </div>



        <div class="col-xs-12 squareFields existingOrder" style="overflow:<?= count($list)>8?'scroll':'hidden'; ?>">
        <i class="glyphicon glyphicon-check icontopright" aria-hidden="true"></i>
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th> 
                    <th>Last Name</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $service): ?>
                <tr>
                    <td><?=$service['first_name']; ?></td>
                    <td><?=$service['last_name']; ?></td>
                    <td><?=$service['scheduled_date']; ?></td>
                    <td>
                        <?php
                        $utils = new Utils();
                        ?>
                        <div class="btn-group">
                        <button type="button" class="btn btn-<?=$utils->changeButtonColor($service['status']);?> dropdown-toggle " style="width: 93px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$utils->changeButton($service['status'])?> <span class="caret"></span>
                        </button>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?r=site/teste&id=<?=$service['id']?>&newStatus=p">Pending</a></li>
                                <li><a href="index.php?r=site/teste&id=<?=$service['id']?>&newStatus=d">Done</a></li>
                                <li><a href="index.php?r=site/teste&id=<?=$service['id']?>&newStatus=a">Assigned </a></li>
                                <li><a href="index.php?r=site/teste&id=<?=$service['id']?>&newStatus=o">On Route </a></li>
                                <li><a href="index.php?r=site/teste&id=<?=$service['id']?>&newStatus=c">Cancelled </a></li>
                            </ul>
                        </div>
                        <?php 
                            if($service['status'] != 'a' && $service['status'] != 'p'){
                                echo Html::a('<span class="glyphicon glyphicon-remove"></span>', ['create'],['disabled' => 'disabled', 'class' => 'btn btn-danger', 'style' => 
                                        ['width' => '27px', 'height' => '27px','padding' => '0', 'border-radius' => '20px', 'font-weight' => 'bold', 'font-size' => '20px']
                                        ]);
                            } else {
                                echo Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete', 'id' => $service['id']], ['class' => 'btn btn-danger', 'style' => 
                                        ['width' => '27px', 'height' => '27px','padding' => '0', 'border-radius' => '20px', 'font-weight' => 'bold', 'font-size' => '20px'],
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                ]);
                            }
                            
                        ?>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </div>
        
        </div>
        <div class="col-xs-6" style="background-color:gray">
            <div class="col-xs-12 squareFields displayMap" style="height: 900px;">
                <i class="glyphicon glyphicon-globe icontopright" aria-hidden="true"></i>
                <?= $this->render('map', [
                        'model' => $model,
                        'list' => $list
                    ]) ?>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>