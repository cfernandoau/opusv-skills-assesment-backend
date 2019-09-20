<?php

namespace app\controllers;

use app\models\Applicant;
use app\models\CustomAuth;
use yii\base\Exception;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\web\Response;





class ProfileController extends ActiveController
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

        $behaviors['authenticator'] = ['class' => CustomAuth::className(), 'except' => ['auth', 'options']];

        return $behaviors;
    }


    public function actionAuth2(){

        \Yii::$app->response->format = Response::FORMAT_HTML;

        if($_POST['email']=="task@opusv.com.au"){
            $data=[];
            $data["email"]="code@opusv.com.au";
            $data["idToken"]="XhqQHvWkiQO2pRu1b48Zr4b_5CqnHwva";
            $data["expiresIn"]="3600";
            $data["localId"]="oZcGZyVbJp9iKej88-XFyOEsQZGUnavb_1566227876";
            return $data;
        }else{


            throw new Exception('Not '.$data[0]);
        }
    }


    public function actionAuth(){

        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));

        //Attempt to decode the incoming RAW post data from JSON.
        $decoded = json_decode($content, true);

        if($decoded['email']=="task@opusv.com.au" and  $decoded['password']=="coolreact"){
            $data=[];
            $data["email"]="code@opusv.com.au";
            $data["idToken"]="XhqQHvWkiQO2pRu1b48Zr4b_5CqnHwva";
            $data["expiresIn"]="3600";
            $data["localId"]="oZcGZyVbJp9iKej88-XFyOEsQZGUnavb_1566227876";
            return $data;
        }else{

            throw new Exception('Your request was made with invalid credentials.');
        }
    }




}