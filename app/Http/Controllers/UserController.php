<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

	/**
	 * POST /api/user/create
	 * Crear un nuevo usuario
	 *
	 * @param Request $request 
	 * @return void
	 */
	public function create(Request $request)
	{

		$keys = array(
			"user_name" => "required|string",
			"user_email" => "required|email|unique:sins_users",
			"user_password" => "required|same:user_rpassword",
			"user_rpassword" => "required",
		);

		$messages = array(
			"user_email.unique" => "El email ingresado ya está siendo usado, intente con uno distinto."
		);


		$validate = Validator::make($request->all(), $keys, $messages);

		if ($validate->fails()) {
			return response()->json(array(
				"error" => true,
				"message" => $validate->errors()->first()
			));
		}

		$password = Hash::make($request->input("user_password"));

		$dataSave = array(
			"user_rol" => "editor",
			"user_name" => $request->input("user_name"),
			"user_email" => $request->input("user_email"),
			"user_password" => $password
		);

		$userModel = new UserModel();

		if ($userModel->create($dataSave)) {
			return response()->json(array(
				"error" => false,
				"message" => "Se ha creado el nuevo usuario correctamente."
			));
		} else {
			return response()->json(array(
				"error" => true,
				"message" => "Error al crear el nuevo usuario, intente nuevamente"
			));
		}
	}

	/**
	 * POST /api/user/login
	 * Hacer petición de Login
	 *
	 * @param Request $request
	 * @return void
	 */
	public function createLogin(Request $request)
	{

		$keys = array(
			"user_email" => "required|string",
			"user_password" => "required|string",
		);

		$userModel = new UserModel();

		$validate = Validator::make($request->all(), $keys);

		try {
			if ($validate->fails()) {
				throw new Error($validate->errors()->first());
			}

			$findedUser = $userModel->where("user_email", $request->input("user_email"))->first();

			if ($findedUser) {
				$passwordSaved = $findedUser->user_password;

				if (Hash::check($request->input("user_password"), $passwordSaved)) {
					return response()->json(array(
						"error" => false,
						"message" => "Usuario logeado correctamente",
						"token" => "token_admin"
					));
				} else {
					throw new Error("Email o contraseña inválidos.");
				}
			} else {
				throw new Error("Email o contraseña inválidos.");
			}
		} catch (\Throwable $th) {
			return response()->json(array(
				"error" => true,
				"message" => $th->getMessage()
			));
		}
	}
}
