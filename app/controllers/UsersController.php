<?php

class UsersController extends BaseController {

	protected $layout = "layouts.main";


     public function __construct() {
      $this->beforeFilter('csrf', array('on'=>'post'));
      $this->beforeFilter('auth', array('only'=>array('getDashboard')));
     }


/**
 * [homeCreate function used to show all users that hava an account]
 */
     public function homeCreate() {
        $users = User::all();
       $this->layout->content = View::make('users.home' , array('users' => $users ));

     }

 
/**
 * [getRegister function used to render register page]
 */
     public function getRegister() {
       $this->layout->content = View::make('users.register');
     }


/**
 * [postCreate function used to validate register form before submitting]
 * @return message [if true : thanks for registering! else : the following errors occurred]
 */
    public function postCreate() {
         
       $validator = Validator::make(Input::all(), User::$rules);
 
      if ($validator->passes()) {
        // validation has passed, save user in DB

         $user = new User;
         $user->firstname = Input::get('firstname');
         $user->lastname = Input::get('lastname');
         $user->email = Input::get('email');
         $user->password = Hash::make(Input::get('password'));
         $profileimg = Input::file('image');
         $user->imgprofile = $profileimg->getClientOriginalName();

         if (Input::file('image')->isValid())
           {
             $profileimg->move(public_path('imgprofile'), $profileimg->getClientOriginalName());
           }

/*         var_dump( Hash::make(Input::get('password')));
         exit();*/
         $user->save();
 
        return Redirect::to('users/login')->with('message', 'Thanks for registering!');

      }

        else {
        // validation has failed, display error messages  
        return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();  
      }

  }

 
/**
 * [getLogin function used to render login page]
 */
     public function getLogin() {
      $this->layout->content = View::make('users.login');
    }


/**
 * [postSignin function used to check if email & password is valid or  with alert message to login user]
 * @return message [if true : you are now logged in! else : your username/password combination was incorrect]
 */
     public function postSignin() {

        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
          return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
        } 

        else {
           return Redirect::to('users/login')
            ->with('message', 'Your username/password combination was incorrect')
            ->withInput();
        }
             
   }


/**
 * [getDashboard function used to render dashboard page that contains user profile info. & show gallery function to render photo gallery for user]
 */
     public function getDashboard() {
        $gallery = new Gallery;
        $id = Auth::id();
        $user = User::find($id);
        $datauser= array("id" => $user->id ,"firstname"=>$user->firstname , "lastname"=>$user->lastname, "email"=>$user->email , "imgprofile"=>$user->imgprofile );
        $contents = $this->showGallery();
        $this->layout->content = View::make('users.dashboard' , array('users' => $datauser ,'items' => $contents ));    
  }


/**
 * [getLogout function used to logout user]
 * @return message [confirms that he/she is now logged out]
 */
     public function getLogout() {
       Auth::logout();
       return Redirect::to('users/login')->with('message', 'Your are now logged out!');
  }


/**
 * [createPhoto function used to upload photo into user's dashboard and save it into database and move it into photogallery folder]
 * @return message [confirms that he/she added a photo]
 */
     public function createPhoto() {
      
       $id = Auth::id();
       
       $profileimg1 = Input::file('img');
       $Uploadcount = count($profileimg1);
       // echo "<pre>";
       // print_r($Uploadcount);
       // exit;
      $count = 0;
      foreach ($profileimg1 as $profileimg) {
         $gallery = new Gallery;
         $gallery->user_id = $id;
       if ($profileimg) {         
       $gallery->photo = $profileimg->getClientOriginalName();
       $gallery->save();
         if ($profileimg->isValid())
           {
             $profileimg->move(public_path('photogallery'), $id ." ". $profileimg->getClientOriginalName());
             $message = "Uploaded Successfully";
           }
       }
       else {
          $message = "Please Upload Your Photo";
         }
         $count++;
     }
   if ($count == $Uploadcount) {
       return Redirect::to('users/dashboard')->with('message', $message );
     }
  }


/**
 * [showGallery function used to show photo in user's dashboard based on user's account]
 */
  public function showGallery() {
       $gallery = new Gallery;
       $id = Auth::id();
       $gallery = User::find($id)->galleries;
       return $gallery;
  
  }


/**
 * [profilePage function used to show profile page for each user when clicks in user's profile that contains user's info and his/her photo gallery]
 */
  public function profilePage() {

//check user id and get it
      if (Input::has('pid')) {
       $pid = Input::get('pid');
     }

    $gallery = User::find($pid)->galleries()->where('active','=','yes')->get();
    $user = User::find($pid);
    $datauser = [];
    $data_user[] = array("firstname"=>$user->firstname , "lastname"=>$user->lastname, "email"=>$user->email , 'imgprofile' => $user->imgprofile );
    $this->layout->content = View::make('users.profile' , array('users' => $gallery , 'data' => $data_user ));

  }


/**
 * [deleteUserImage function used to delete photo in  user's gallery]
 */
public function deleteUserImage() {
   $userid = Input::get('userid');
        $photo = Gallery::find($userid);
        $photo->delete();
        die;
}


/**
 * [editProfile function used to edit user's info like firstname - lastname - email ]
 */
public function editProfile() {

    $firstname = Input::get('user_fname');
    $lastname = Input::get('user_lname');
    $email = Input::get('user_email');
    $id = Auth::id();
    DB::table('users')
            ->where('id', $id)
            ->update(array('firstname' => $firstname , 'lastname' => $lastname , 'email' => $email ));

return Response::json('success', 200);

}


/**
 * [changeActive function used to change active status[yes - no] for photo in user's gallery to control if he/she wants to show this photo in his/her profile]
 */
public function changeActive() {
 $activestatus = Input::get('photo_active');
    $userid = Input::get('useridd');
    DB::table('galleries')
            ->where('id', $userid)
            ->update(array('active' => $activestatus));
        return Response::json('success', 200);
}

     

}

?>