<?php 
	require_once('models/User.php');
	class userController
	{	
		var $model;

		function __construct(){
			$this->model = new User();
		}
		function list(){
			$data = $this->model->All();
			require_once('views/user/list.php');
		}

		function detail(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/user/detail.php');
		}

		function add(){
			require_once('views/user/add.php');
		}

		function store(){
			$data = $_POST;
			$status = $this->model->insert($data);
			if ($status) {
				setcookie('msg','Thêm mới thành công',time()+1);
				header('location: index.php?mod=user');
			} else {
				setcookie('msg','Thêm mới thất bại.',time()+1);
				header('location: index.php?mod=user&act=add');
			}
		}

		function edit(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/user/edit.php');
		}

		function update(){
			$data = $_POST;
			$status = $this->model->update($data);
			if ($status) {
				setcookie('msg','Sửa thành công',time()+1);
				header('location: index.php?mod=user');
			} else {
				setcookie('msg','Sửa thất bại.',time()+1);
				header('location: index.php?mod=user&act=edit');
			}
		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->model->delete($code);
			if ($status) {
				setcookie('msg','Xoá thành công',time()+1);
				header('location: index.php?mod=user');
			} else {
				setcookie('msg','Xoá thất bại.',time()+1);
				header('location: index.php?mod=user&act=list');
			}
		}
	}
 ?>