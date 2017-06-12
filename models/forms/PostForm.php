<?php

namespace app\models\forms;

use yii\base\Model;

class PostForm extends Model
{

    public
        $text;

    public function rules()
    {
        return [
            [['text'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'text' => 'Text of new Post',
        ];
    }
}