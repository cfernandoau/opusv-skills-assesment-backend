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

        ;

        if($request->getHeaders()->get('Authorization')=="bearer XhqQHvWkiQO2pRu1b48Zr4b_5CqnHwva")
            return true;

        return null;
    }
}