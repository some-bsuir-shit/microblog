<?php

namespace app\models;

use \app\models\db\User as DbUser;

use app\services\UserService;
use yii\base\NotSupportedException;

class User extends DbUser implements \yii\web\IdentityInterface
{

    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $userService = new UserService();
        return $userService->findById($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $userService = new UserService();
        return $userService->findByUsername($username);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
