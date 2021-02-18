<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 19-Feb-21
 * Time: 01:15
 */

namespace backend\models;


use common\models\User;


/**
 * Class UpdateUser
 * @package backend\models
 *
 * @property string $password
 * @property string $new_password
 * @property string $repeat_new_password
 */
class UpdateUser extends User
{
    public $password;
    public $new_password;
    public $repeat_new_password;

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['email'], 'email'],
            [['username', 'password', 'new_password', 'repeat_new_password'], 'string', 'max' => 255],
        ];
    }

}