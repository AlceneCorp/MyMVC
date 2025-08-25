<?php

namespace App\Controllers;

use App\Core\Controller;



class HomeController extends Controller
{

	public function home()
	{
		$this->render('home/home.twig');
	}

	public function contact()
	{
		if(isset($_POST))
		{
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
			{

			}
		}

		$this->render('home/contact.twig');
	}

	public function articles()
	{
		$articles = $this->articlesManager->findAllArticles(["VISIBLE" => 1], ["ORDER BY" => "DATE DESC", "LIMIT" => 20]);

		$this->render('home/articles.twig', ['articles' => $articles]);
	}

	public function article_details($id)
	{
		$article = $this->articlesManager->findOneArticles(["ID" => $id]);
		
		$this->render('home/article_detail.twig', ["article" => $article]);
	}

	public function features()
	{
		$this->render('home/features.twig');
	}
}