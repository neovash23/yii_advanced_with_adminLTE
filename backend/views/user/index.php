<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">



    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            [
                'value' => function($data){

                         $image =  (!empty($data->profile->cropped_image))? $data->profile->cropped_image : $data->profile->image;
                         
                         if(empty($data->profile->image))
                            $image = base64_encode(file_get_contents('images/image-placeholder.jpg'));

                    return '<img class="profile-thumb" width="30px" src="data:image/jpeg;base64,'.$image.'"/>'. ' '.
                                            Html::a($data->username, ['user/view', 'id' => $data->id]);
                },
                'format' => 'raw',
                'attribute'  =>'username' 
            ],
            'email:email',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'status',
            // 'accessLevel',
            // 'created_by',
            // 'created_at',
            // 'updated_at',
            // 'updated_by',
            // 'deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
