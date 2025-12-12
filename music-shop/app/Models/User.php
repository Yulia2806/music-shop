<?php
namespace App\Models;class User extends Model{static function byLogin($l){$s=self::$db->prepare('SELECT * FROM users WHERE username=?');$s->execute([$l]);return $s->fetch();}}
