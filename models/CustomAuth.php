<?php


namespace app\models;


use yii\filters\auth\AuthMethod;

class CustomAuth extends AuthMethod
{
    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
        $headers=$request->getallheaders ();

        echo $headers['authorization'];
        //print_r($headers);
        if($headers['authorization']=="bearer XhqQHvWkiQO2pRu1b48Zr4b_5CqnHwva")
            return true;

        exit;
    }
}