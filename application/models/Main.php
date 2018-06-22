<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

    /*Getting posts count*/
	public function postsCount() {
		return $this->db->column('SELECT COUNT(id) FROM news');
	}

    /*Getting posts list*/
	public function postsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM news ORDER BY id DESC LIMIT :start, :max', $params);
	}

    /*Adding comment*/
    public function commentAdd($post,$id) {
        $idc = $this->db->lastInsertId('SELECT COUNT(comment_id) FROM comments');
        $idc += 1;
        $params = [
            'author' => $post['author'],
            'text' => $post['text'],
            'date' => $post['date'],
            'time' => $post['time'],
            'post_id' => $id,
            'comment_id' => $idc,
        ];
        $this->db->query1('INSERT INTO comments VALUES (:author, :text, :date, :time, :post_id, :comment_id)', $params);
        return $idc;
    }

}