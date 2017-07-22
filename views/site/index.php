<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Wellcome!</h1>

        <p>
            <?= \yii\helpers\Html::a('View treated areas list', ['treated-areas/index'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

</div>
