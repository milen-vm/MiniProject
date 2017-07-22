<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TreatedArea */

$this->title = 'Create Treated Area';
$this->params['breadcrumbs'][] = ['label' => 'Treated Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treated-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tractors' => $tractors,
        'parcels' => $parcels,
    ]) ?>

</div>
