<?php
namespace app\index\service;
use app\index\model\User;
class UserService{
	public function getId(){
		return User::find();
	}
}