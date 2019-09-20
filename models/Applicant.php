<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applicant".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $discordId
 * @property string $state
 */
class Applicant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'discordId'], 'string', 'max' => 200],
            [['state'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'discordId' => 'Discord ID',
            'state' => 'State',
        ];
    }
}
