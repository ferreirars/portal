<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth');
 
class BcryptFormAuthenticate extends FormAuthenticate {
 
/**
 * The cost factor for the hashing.
 *
 * @var integer
 */
    public static $cost = 10;
 
/**
 * Password method used for logging in.
 *
 * @param string $password Password.
 * @return string Hashed password.
 */
    protected function _password($password) {
        return self::hash($password);
    }
 
/**
 * Create a blowfish / bcrypt hash.
 * Individual salts could/should used for increased security.
 *
 * @param string $password Password.
 * @return string Hashed password.
 */
    public static function hash($password) {
        $salt = substr(Configure::read('Security.salt'), 0, 22);
        return crypt($password, '$2a$' . self::$cost . '$' . $salt);
    }
}
