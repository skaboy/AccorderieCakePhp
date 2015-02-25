<?php

App::uses('AppController', 'Controller');

class UserControllerTest extends ControllerTestCase 
{
	public $fixtures = array('app.annonce', 'app.user');
	
	public function test_annonces_add()
	{
		$result = $this->testAction('/annonces/add');
		debug($result);
	}
	
	public function test_annonces_annonce_signalee()
	{
		$result = $this->testAction('/annonces/annonceSignalee');
		debug($result);
	}
	
	public function test_annonces_demande()
	{
		$result = $this->testAction('/annonces/demande');
		debug($result);
	}
	
	public function test_annonces_edit()
	{
		$result = $this->testAction('/annonces/edit/1');
		debug($result);
	}
	
	public function test_annonces_edit_sans_id()
	{
		try {
			$result = $this->testAction('/annonces/edit/2');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}	
	}
	
	public function test_annonces_edit_null()
	{
		try {
			$result = $this->testAction('/annonces/edit');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_annonces_index() 
	{
		$result = $this->testAction('/annonces/index');
		debug($result);
	}
	
	public function test_annonces_offre()
	{
		$result = $this->testAction('/annonces/offre');
		debug($result);
	}
	
	public function test_annonces_validation()
	{
		$result = $this->testAction('/annonces/validation');
		debug($result);
	}
	
	public function test_annonces_view()
	{
		$result = $this->testAction('/annonces/view/1');
		debug($result);
	}
	
	public function test_annonces_view_sans_id()
	{
		try {
			$result = $this->testAction('/annonces/view/2');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_annonces_view_null()
	{
		try {
			$result = $this->testAction('/annonces/view');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_annonces_signaler()
	{
			$result = $this->testAction('/annonces/signaler/1');
			debug($result);
	}
	
	public function test_annonces_delete()
	{
		$result = $this->testAction('/annonces/delete/1/demande');
		debug($result);
	}
	
	public function test_annonces_delete_methodeGet()
	{
		try {
			$result = $this->testAction('/annonces/delete/1/demande', array('method' => 'get'));
			debug($result);
		}
		
		catch(METHODNOTALLOWEDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_annonces_delete_null()
	{
		
		$result = $this->testAction('/annonces/delete/null/demande');
		debug($result);
	
	}
}