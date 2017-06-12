<?php
/**
 * Created by PhpStorm.
 * User: arnidan
 * Date: 11.06.17
 * Time: 13:30
 */

namespace app\widgets;


use yii\base\Widget;

class PostForm extends Widget
{

    public
        $model;

    public function run()
    {
        return $this->render('post-form', ['model' => $this->model]);
    }

}