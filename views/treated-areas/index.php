<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreatedAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treated Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treated-area-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Treated Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'footerRowOptions'=>['style'=>'font-weight:bold;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Parcel',
                'attribute' => 'parcelName',
                'value' => 'parcel.name'
            ],
            [
                'label' => 'Culture',
                'attribute' => 'parcelCulture',
                'value' => 'parcel.culture',
            ],
            'date',
            [
                'label' => 'Tractor',
                'attribute' => 'tractor',
                'value' => 'tractor.name',
            ],
            [
                'attribute' => 'area',
                'footer' => \app\models\TreatedAreas::getTotal($dataProvider->models, 'area'),
            ],
            // 'updated_at',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
