<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TreatedArea */

$this->title = 'Update Treated Area: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Treated Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treated-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tractors' => $tractors,
        'parcels' => $parcels,
    ]) ?>

</div>
