<?php

namespace app\controllers;

use app\models\Applicant;
use app\models\CustomAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\web\Response;





class ApplicantsController extends ActiveController
{
    public $modelClass='app\models\Applicant';


    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Expose-Headers' => ['*']
            ],
        ];

        $behaviors['contentNegotiator']= [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

//        $behaviors['authenticator']['except'] = ['options'];
//
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                HttpBearerAuth::className(),
//            ],
//            'except'=>['auth','options']
//        ];

        $behaviors['authenticator'] = ['class' => CustomAuth::className(), 'except' => ['auth', 'options'], 'authMethods' => [HttpBearerAuth::className()]];


        return $behaviors;
    }

    function actionAuth(){
        $data=[];
        $data["email"]="code@opusv.com.au";
        $data["idToken"]="XhqQHvWkiQO2pRu1b48Zr4b_5CqnHwva";
        $data["expiresIn"]="3600";
        $data["localId"]="oZcGZyVbJp9iKej88-XFyOEsQZGUnavb_1566227876";
        return $data;
    }


}