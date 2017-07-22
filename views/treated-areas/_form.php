<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TreatedAreas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treated-area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tractor_id')->dropDownList($tractors, ['prompt' => 'Select tractor ...'])->label('Tractor Name') ?>

    <?= $form->field($model, 'parcel_id')->dropDownList($parcels, ['prompt' => 'Select parcel ...'])->label('Parcel Name') ?>

    <?= $form->field($model, 'area')->textInput(['placeholder' => 'Type area ...']) ?>

    <?= $form->field($model, 'date')->widget(\kartik\date\DatePicker::className(), [
        'options' => ['placeholder' => 'Select date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
