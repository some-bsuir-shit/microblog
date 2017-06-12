<?php

namespace app\models\forms;

use app\models\db\City;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class RegistrationForm extends Model
{

    public
        $username,
        $password,
        $repeatPassword,
        $email,
        $firstName,
        $lastName,
        $city_id;

    public function rules()
    {
        return [
            [['username', 'password', 'repeatPassword', 'firstName', 'lastName', 'email'], 'string'],
            [['username', 'password', 'repeatPassword', 'firstName', 'lastName', 'email'], 'trim'],
            [['username', 'password', 'repeatPassword', 'firstName', 'lastName', 'email', 'city_id'], 'required'],
            [['city_id'], 'integer'],
            ['repeatPassword', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if ($this->password !== $this->repeatPassword) {
            $this->addError($attribute, 'Passwords don\'t match');
        }
    }

    // sry for dat, i don't have enough time :(
    public function getCityList()
    {
        $cityList = City::find()->joinWith(['country'])->all();

        $result = [];

        foreach ($cityList as $item) {
            $result[$item->id] = sprintf('%s, %s', $item->title, $item->country->title);
        }
        return $result;
    }

}