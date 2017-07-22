<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tractors */

$this->title = 'Create Tractor';
$this->params['breadcrumbs'][] = ['label' => 'Tractors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tractor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
