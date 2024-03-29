<?php

namespace App\Http\Controllers;


use App\User;
use App\Models\RoleType;
use App\Models\UserType;
use App\Models\Department;
use Auth;
use Illuminate\Http\Request;
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

    public function beforeGetRegister()
    {
      $user_types = UserType::all();
      $departments = Department::all();
        return view('auth.register', compact('user_types','departments'));
    }

    public function getRegister($name)
    {
        if(empty(Auth::user())){
            return view('user.sign_up');
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
//            'role_type_id' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|required_with:password',
        ]);


        if ($validator->fails()) {
            $validation_array = $validator->errors()->toArray();
            $validation_message = '';

            if(isset($validation_array['full_name'][0])){
                $validation_message = $validation_message . $validation_array['full_name'][0]. PHP_EOL;
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
            $user->role_type_id = 2;
            $user->user_type_id = $request->user_type_id;
            $user->department_id = $request->department_id;
            $user->full_name = $request->full_name;

            if ($request->full_name){
                $username = strtolower(str_replace(' ', '_', $request->full_name));
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
            $redirect_url = redirect()->route('admin.index');
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
//        $backUrl = URL::previous();
//
//        if($backUrl != route('user.sign_in') && $backUrl != route('user.sign_up')) {
//            Session::put(['backUrl' => $backUrl]);
//        }

        if(empty(Auth::user())){
            return view('auth.login');
        } else {
            return redirect()->route('admin.index');
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
            return redirect()->route('admin.index');

        } else {
            $flash_status = 'error';
            $data_status = false;
            $flash_message = 'Email or password is incorrect';
            return redirect()->route('user.sign_in');
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
            return redirect()->route('user.sign_in');

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
