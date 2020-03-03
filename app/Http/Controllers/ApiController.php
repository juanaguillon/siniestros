<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
	private $clientController;

	public function __construct()
	{
		$this->clientController = new ClientController();
		$this->clientController = new ClientController();
	}

	/**
	 * POST /client/create
	 * Crear un nuevo usuario por medio de API
	 *
	 * @param Request $request
	 * @return void
	 */
	public function createClient(Request $request)
	{
		return $this->clientController->create($request);
	}
}
