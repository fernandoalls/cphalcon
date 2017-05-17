<?php
use Phalcon\Mvc\Controller;
use Phalcon\Filter;


/**
 * @RoutePrefix("index")
 */
class IndexController extends Controller
{

    public function indexAction()
    {
    	// Carrega view /views/index/index.volt
    }

    public function acessarAction()
    {
    	// Carrega view /views/index/acessar.volt
    	if ($this->request->isPost()) {

    		$filter = new Filter();
            $this->view->email = $this->request->getPost("email");
            $this->view->senha = $this->request->getPost("senha");
        }
    }

    public function nova_senhaAction()
    {
		// Carrega view /views/index/nova_senha.volt
	}

	public function quem_somosAction()
    {
		// Carrega view /views/index/quem_somos.volt
	}

	public function faqAction()
    {
		// Carrega view /views/index/faq.volt
	}

	public function contatoAction()
    {
		// Carrega view /views/index/contato.volt
	}

	public function route404Action()
	{
		// Carrega view /views/index/404.volt
	}

}