<?php

namespace App\Controller;

use App\Repository\ControllerRepository;
use App\View\View;

class BlogController
{
  public function index()
  {
      //$blogRepository = new BlogRepository();

      $view = new View('blog/index');
      $view->title = 'Blog';
      $view->heading = 'Blog';
      $view->blogProfilePicture = 'blogProfilePicture';
      $view->blogUsername = 'blogUsername';
      $view->blogTitle = 'blogTitle';
      $view->blogImage = 'blogImage';
      $view->blogText = 'blogText';
      //$view->blogs = $blogRepository->readAll();
      $view->display();
  }

  public function create()
  {
      $view = new View('blog/create');
      $view->title = 'Blog erstellen';
      $view->heading = 'Blog erstellen';
      $view->display();
  }

  public function profile()
  {
      $view = new View('blog/profile');
      $view->title = 'Profil';
      $view->heading = 'Profil';
      $view->display();
  }

}
