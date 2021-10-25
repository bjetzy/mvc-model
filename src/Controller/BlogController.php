<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use App\Repository\BlogAllRepository;
use App\Repository\UserRepository;
use App\View\View;

class BlogController
{
  public function index()
  {
      $blogAllRepository = new BlogAllRepository();

      $view = new View('blog/index');
      $view->title = 'Blog';
      $view->heading = 'Blog';
      $view->blogs = $blogAllRepository->readAll();
      $view->display();
  }

  public function create()
  {
      $view = new View('blog/create');
      $view->title = 'Blog erstellen';
      $view->heading = 'Blog erstellen';
      $view->display();
  }

  public function doCreate(){
    if (isset($_POST['title'])
    && !empty($_POST['title'])
    && isset($_POST['content'])
    && !empty($_POST['content'])
    && isset($_FILES['image'])
    && !empty($_FILES['image'])
    && isset($_SESSION['id'])
    && !empty($_SESSION['id'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    //$image = $_POST['image'];
    $id = $_SESSION['id'];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");


      if($file_size < 2097152 && in_array($file_ext,$expensions)=== true) {

         $blogRepository = new BlogRepository();
         $id = $blogRepository->create($title,$content,"uploads/".$file_name,$id);
         if(!is_null($id)) {
           $file_name = "/uploads/Bild".$id .".".$file_ext;
             if(move_uploaded_file($file_tmp,$file_name)) {
               $blogRepository->updateFilePath($id,$file_name);
             };
             header('Location: /blog/profile');
         }

         else {
           header('Location: /error');

         }
      }
    else {
        header('Location: /error');
    }

}
else {
  echo "fehler";;
}
}

  public function profile()
  {
      $userRepository = new UserRepository();
      $blogRepository = new BlogRepository();
      if (isset($_SESSION['id'])
      && !empty($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $user = $userRepository->readByID($id);
        $blogs = $blogRepository->getByUsersID($id);
        if (!is_null($user) && !is_null($blogs)) {
          $view = new View('blog/profile');
          $view->title = 'Profil';
          $view->heading = 'Profil';
          $view->user = $user;
          $view->blogs = $blogs;
          $view->display();
        }
        else {
          header('Location: /error');
        }
      }
      else {
         header('Location: /blog/create');
      }


  }
  public function update(){
    $view = new View('blog/update');
    $view->title = 'Blog updaten';
    $view->heading = 'Blog updaten';
    $view->display();
  }

  public function logout(){
    unset($_SESSION['id']);
    session_destroy();
    header('Location: /');
  }

}
