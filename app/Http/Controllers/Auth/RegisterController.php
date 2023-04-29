<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegistrationRequest as AdminRegistrationRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('checkUserEmailDomain')->only('register');
        $this->middleware('checkAdminEmailDomain')->only('createAdmin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'emailDomain' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.~!@#$%^&*()_+|}{:?>\,-=]).{8,20}$/'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_domain' => $data['emailDomain'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin', 'title' => 'Admin']);
    }


    protected function createAdmin(AdminRegistrationRequest $request)
    {
        $validatedRequest = $request->validated();
        $admin = Admin::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'email' => $request['email'],
            'email_domain' => $request['emailDomain'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('admin/login');
    }
}
