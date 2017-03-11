<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\building\models\Building */

$this->title = Yii::t('app', 'Create Building');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
