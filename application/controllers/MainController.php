<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;
use application\models\Main;

class MainController extends Controller {

    /*View news action action*/
	public function indexAction() {
		$pagination = new Pagination($this->route, $this->model->postsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->postsList($this->route),
		];
		$this->view->render('Main page', $vars);
	}

    /*View post with comments action*/
	public function postAction() {
		$adminModel = new Admin;
		if (!$adminModel->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'post' => $adminModel->postData($this->route['id'])[0],
            'comments' => $adminModel->commentsData($this->route['id']),
		];
		$this->view->render('Post', $vars);
	}

    /*Adding comment action*/
    public function addCommentAction() {
        if (!empty($_POST)) {
            $id = $this->model->commentAdd($_POST,$this->route['id']);
            if (!$id) {
                $this->view->message('success', 'Error '. $this->route['id']);
            }
            $this->view->message('success', 'Success '. $this->route['id']);
        }
        $this->view->render('Add comment');
    }

}