<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

	public $error;

    /*Login validation*/
	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Login or password wrong!';
			return false;
		}
		return true;
	}

    /*Post validation*/
	public function postValidate($post, $type) {
		$titleLen = iconv_strlen($post['title']);
		$textLen = iconv_strlen($post['text']);
		if ($titleLen < 3 or $titleLen > 100) {
			$this->error = 'Title must be from 3 to 100 symbols!';
			return false;
		} elseif ($textLen < 10 or $textLen > 5000) {
			$this->error = 'Text must be from 10 to 5000 symbols!';
			return false;
		}
		return true;
	}

    /*Adding post*/
	public function postAdd($post) {
	    $id = $this->db->lastInsertId('SELECT COUNT(id) FROM news');
	    $id += 1;
		$params = [
			'id' => $id,
			'title' => $post['title'],
			'date' => $post['date'],
            'text' => $post['text'],
            'time' => $post['time'],
		];
		$this->db->query1('INSERT INTO news VALUES (:id, :title, :date, :text, :time)', $params);
		return $id;
	}


    /*Editing post*/
	public function postEdit($post, $id) {
		$params = [
			'id' => $id,
			'title' => $post['title'],
			'text' => $post['text'],
		];
		$this->db->query1('UPDATE news SET title = :title, text = :text WHERE id = :id', $params);
	}

    /*Checking post existence*/
	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM news WHERE id = :id', $params);
	}

    /*Deleting post*/
	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query1('DELETE FROM news WHERE id = :id', $params);
	}

    /*Getting post data*/
	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM news WHERE id = :id', $params);
	}

    /*Getting all comments of specific post*/
    public function commentsData($id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM comments WHERE post_id = :id', $params);
    }

}