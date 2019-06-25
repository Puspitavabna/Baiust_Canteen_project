<?php

namespace App\Http\Controllers;


use App\User;
use App\Models\RoleType;
use App\Models\UserType;
use App\Models\Department;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use Response;
use App\Models\Country;
use Validator;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{


    public function getRegister($name)
    {
        $role_type = RoleType::where('name', $name)->first();
        if(empty(Auth::user())){
            return view('users.sign_up');
        } else {
            return redirect()->route('home.index');
        }
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'role_type_id' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|required_with:password',
        ]);

        if ($validator->fails()) {
            $validation_array = $validator->errors()->toArray();
            $validation_message = '';

            if(isset($validation_array['first_name'][0])){
                $validation_message = $validation_message . $validation_array['first_name'][0]. PHP_EOL;
            }

            if(isset($validation_array['last_name'][0])){
                $validation_message = $validation_message . $validation_array['last_name'][0]. PHP_EOL;
            }

            if(isset($validation_array['role_type_id'][0])){
                $validation_message = $validation_message . $validation_array['role_type_id'][0]. PHP_EOL;
            }

            if(isset($validation_array['email'][0])){
                $validation_message = $validation_message . $validation_array['email'][0]. PHP_EOL;
            }

            if(isset($validation_array['password'][0])){
                $validation_message = $validation_message . $validation_array['password'][0]. PHP_EOL;
            }

            if(isset($validation_array['password_confirmation'][0])){
                $validation_message = $validation_message . $validation_array['password_confirmation'][0];
            }

            $flash_message = $validation_message;
            $flash_status = 'error';
            $redirect_url = redirect()->back();
            $data_status = false;
        } else {
            $user = new User();
            $user->role_type_id = $request->role_type_id;
            $user->department_id = $request->department_id;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->business_name = $request->business_name;
            $user->api_token = str_random(60);

            if ($request->first_name && $request->last_name ){
                $username = strtolower(str_replace(' ', '_', $request->first_name . '_' . $request->last_name));
            }
            $user_check = User::where('username', $username)->first();

            if(!empty($user_check)){
                $username = $username.rand(1,100);
            }


            $user->username = $username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user['user_type_id'] = $request->user_type_id;
            $user['department_id'] = $request->department;
            $user->save();

            $flash_status = 'success';
            $flash_message = 'User successfully registered.';
            $redirect_url = redirect()->route('users.dashboard', $user->username);
            $data_status = true;
        }


            if(isset($user)){
                Auth::login($user);
            }
            Session::flash($flash_status, $flash_message);
            return $redirect_url;

    }

    public function forgotPassword()
    {
        return view('users.forgot_password');
    }

    public function resetPassword()
    {
        return view('users.reset');
    }

    public function getLogin()
    {
        $backUrl = URL::previous();

        if($backUrl != route('users.sign_in') && $backUrl != route('users.sign_up')) {
            Session::put(['backUrl' => $backUrl]);
        }

        if(empty(Auth::user())){
            return view('users.sign_in');
        } else {
            return redirect()->route('home.index');
        }
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $flash_status = 'success';
            $data_status = true;
            $flash_message = 'Signed in successfully.';
            if(isset($request->redirect_job_post)) {
                if(Auth::user()->role_type_id == Role::CLIENT) {
                    $flash_message = Role::CLIENT;
                    $redirect_url = response()->json([ $flash_status => $flash_message]);
                } else {
                    $flash_message = route('users.profile', Auth::user()->username);
                    $redirect_url = response()->json([ $flash_status => $flash_message]);
                }
            } else {

                $this->save_log(ActivityLogType::LOGIN, Auth::user()->id);
                $redirect_url =   redirect()->route('users.profile', Auth::user()->username);
            }
        } else {
            $flash_status = 'error';
            $data_status = false;
            $flash_message = 'Email or password is incorrect';
            $redirect_url = redirect()->route('users.sign_in');
        }

        if (\Request::is('api/*')) {
            $json_data['api_status'] =  app('Illuminate\Http\Response')->status();
            $json_data['data_status'] = $data_status;
            if($data_status){
                $user = Auth::user();
                $json_data['flash_message'] = $flash_message;
                $json_data['role_type_id'] = $user->role_type_id;
                $json_data['api_token'] = $user->api_token;
                $json_data['user_id'] = $user->id;
                $json_data['username'] = $user->username;
            } else {
                $json_data['flash_message'] = $flash_message;
            }

            return response()->json($json_data);
        } else {
            Session::flash($flash_status, $flash_message);
            return $redirect_url;
        }
    }

    public function show(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        return view('users.dashboard',
                    compact('user',
                        'categories',
                        'countries',
                        'resumes',
                        'education_types',
                        'education_lists',
                        'experience_lists',
                        'portfolios',
                        'reviews',
                        'age',
                        'rating_count',
                        'review_count',
                        'job_post_id'));



    }

    public function logout()
    {

            Auth::logout();
            return redirect()->route('users.sign_in');

    }
//
//    public function removeProfile()
//    {
//        $user_id = Auth::users()->id;
//        $profile = User::find( $user_id);
//        if($profile)
//            Storage::disk('s3')->delete(config('constants.profile_upload')
//                .$profile->created_at->year.'/'. $profile->created_at->format('m') . '/'
//                .$profile->avatar);
//        $profile->avatar = '';
//        $profile->update();
//        $flash_message = 'Profile has been deleted successfully.';
//
//        Session::flash('portfolio', $flash_message);
//
//        if(\Request::is('api/*')){
//            $json_data['api_status'] =  app('Illuminate\Http\Response')->status();
//            $json_data['data_status'] = true;
//            $json_data['flash_message'] = $flash_message;
//            return response($json_data);
//        } else {
//            return Redirect::to(URL::previous() . "#Education");
//
//        }
//    }
//

    public function edit()
    {
        $user = User::find(Auth::user()->id);
//        $this->save_log(ActivityLogType::CHANGE_SETTING, $users);
            return view('users.edit', ['users' => $user]);

    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (\Hash::check($request['password'], $user->password)) {
            $user->email = $request['email'];
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->business_name = $request['business_name'];
            $user->save();
            $flash_status = 'success';
            $flash_message = 'Information update successfully.';
            $data_status = true;
        } else {
            $data_status = false;
            $flash_status = 'error';
            $flash_message = 'Password does not matched.';
        }

        if(\Request::is('api/*')){
            $json_data['api_status'] =  app('Illuminate\Http\Response')->status();
            $json_data['data_status'] = $data_status;
            $json_data['flash_message'] = $flash_message;
            $json_data['users'] = $user;
            return response($json_data);
        } else {
            Session::flash($flash_status, $flash_message);
            return redirect()->back();
        }
    }



    public function changePassword()
    {
        $user = User::find(Auth::user()->id);

            return view('users.change_password', ['users' => $user]);

    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:3',
            'password_confirmation' => 'same:password'
        ]);
        $user = User::find(Auth::user()->id);

        if (\Hash::check($request['current_password'], $user->password)) {
            $user->password = bcrypt($request['password']);
            $user->save();
            $data_status = false;
            $flash_status = 'success';
            $flash_message = 'Password update successfully.';
        } else {
            $data_status = false;
            $flash_status = 'error';
            $flash_message = 'Your passwords did not match, please try again!';
        }

        if(\Request::is('api/*')){
            $json_data['api_status'] =  app('Illuminate\Http\Response')->status();
            $json_data['data_status'] = $data_status;
            $json_data['flash_message'] = $flash_message;
            $json_data['users'] = $user;
            return response($json_data);
        } else {
            Session::flash($flash_status, $flash_message);
            return redirect()->back();
        }
    }

    public function saveDeviceToken(Request $request){
        $device_token = $request->device_token;
        $check_duplicate = User::where('device_token', $device_token)->get();

        if(count($check_duplicate) > 1){
            foreach($check_duplicate as $item){
                $item->device_token = null;
                $item->save();
            }
        }

        $user = User::find(Auth::user()->id);

        $user->device_type_id = $request->device_type_id; // for android = 1, for ios = 2
        $user->device_token = $device_token;
        $user->save();
    }
}
