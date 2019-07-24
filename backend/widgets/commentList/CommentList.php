<?php

namespace frontend\widgets\commentList;
use yii\base\Widget;
//$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

class CommentList extends Widget
{
	public $type;
	public $name;
	public $body; 
	public $mail;
	public $date;
	public function init()
	{
		parent::init();

		if ($this->name === null) {
			$this->name ='Аноним';
		}
		if ($this->body === null) {
			$this->body = 'Пустое сообщение';
		}
		if ($this->mail === null) {
			$this->mail = 'Без e-mail';
		}
		if ($this->date === null) {
			$this->date = 'Без даты';
		}
		if ($this->type === 'null' ) {
			$this->type = 'msg_srv';
		}
	}
	public function run()
	{
		return "<div class='$this->type' >
					<div class='msg_footr'><div class='msg_name'>$this->name</div><div class='msg_date'>$this->date</div></div>
					<div class='msg_body'>$this->body </div>
				</div>";
//	<div class='msg_mail'>$this->mail</div>
	}
	
}
