<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MsgController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogpostsController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\AptController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/',[HomeController::class,'home']);
route::get('forum',[HomeController::class,'forum']);
route::get('redirect',[HomeController::class,'redirect']);
route::get('alltherapistsview',[HomeController::class,'alltherapistsview']);
route::get('searchtherapist',[HomeController::class,'searchtherapist']);


//Admin controls
route::get('users',[AdminController::class,'users']);
route::get('updateuser/{id}',[AdminController::class,'updateuser']);
//route::resource('/users',UsersController::class);
Route::post('/updateusers/{id}',[AdminController::class,'updateusers']);
route::get('deleteuser/{id}',[AdminController::class,'deleteuser']);
route::get('search',[HomeController::class,'search']);
//Route::post('/addtherapist/{id}',[HomeController::class,'addtherapist']);
route::get('alltherapists',[AdminController::class,'alltherapists']);
route::get('alleditors',[AdminController::class,'alleditors']);
route::get('addviewtherapist/{id}',[AdminController::class,'addviewtherapist']);
route::get('userspdf',[AdminController::class,'userspdf']);
route::get('therapistsprofiles',[AdminController::class,'therapistsprofiles']);
route::get('therapistspdf',[AdminController::class,'therapistspdf']);

//Change role of user
route::get('maketherapist/{id}',[AdminController::class,'maketherapist']);
route::get('makeeditor/{id}',[AdminController::class,'makeeditor']);
route::get('makeuser/{id}',[AdminController::class,'makeuser']);

//Search  functionalities
route::get('searchusers',[AdminController::class,'searchusers']);
route::get('searchprofile',[AdminController::class,'searchprofile']);
route::get('searchalleditors',[AdminController::class,'searchalleditors']);
route::get('searchalltherapists',[AdminController::class,'searchalltherapists']);


//Messages
/*
route::get('messagesview',[MsgController::class,'messagesview']);
Route::post('/sendmessage',[MsgController::class,'sendmessage']);
route::get('deletemsg/{id}',[MsgController::class,'deletemsg']);
route::get('replyview',[MsgController::class,'replyview']);
route::post('replymsg',[MsgController::class,'replymsg']);
route::get('searchmsg',[MsgController::class,'searchmsg']);
*/
//End of admin functionalities





//The forum
route::get('forum',[ForumController::class,'forum']);
    //Create Routes
    route::get('createcategoryview',[ForumController::class,'createcategoryview']);
    route::post('createcategory',[ForumController::class,'createcategory']);

    route::get('createthreadview/{id}',[ForumController::class,'createthreadview']);
    route::post('createthread',[ForumController::class,'createthread']);
    route::get('createpostview/{id}',[ForumController::class,'createpostview']);
    route::post('createpost',[ForumController::class,'createpost']);
    route::get('createreplyview/{id}',[ForumController::class,'createreplyview']);
    route::post('createreply',[ForumController::class,'createreply']);


    //Update Routes
    route::get('updatecategoryview/{id}',[ForumController::class,'updatecategoryview']);
    route::post('updatecategory/{id}',[ForumController::class,'updatecategory']);

    route::get('updatethreadview/{id}',[ForumController::class,'updatethreadview']);
    route::post('updatethread/{id}',[ForumController::class,'updatethread']);
    route::get('updatepostview/{id}',[ForumController::class,'updatepostview']);
    route::post('updatepost/{id}',[ForumController::class,'updatepost']);
    route::get('updatereplyview/{id}',[ForumController::class,'updatereplyview']);
    route::post('updatereply/{id}',[ForumController::class,'updatereply']);

    //Delete  on forum
    route::get('deletecategory/{id}',[ForumController::class,'deletecategory']);
    route::get('deletethread/{id}',[ForumController::class,'deletethread']);
    route::get('deletepost/{id}',[ForumController::class,'deletepost']);
    route::get('deletereply/{id}',[ForumController::class,'deletereply']);

//Displaying pages
route::get('category/{id}',[ForumController::class,'category']);
route::get('thread/{id}',[ForumController::class,'thread']);
route::get('posts/{id}',[ForumController::class,'posts']);
route::get('reply',[ForumController::class,'reply']);

//Search on the  Forum
route::get('searchcategory',[ForumController::class,'searchcategory']);
route::get('searchthread/{id}',[ForumController::class,'searchthread']);
route::get('searchpost/{id}',[ForumController::class,'searchpost']);
route::get('creations',[ForumController::class,'creations']);

//Blog Section
//route::get('blog',[HomeController::class,'blog']);
//route::get('article',[HomeController::class,'article']);

//route::get('create',[HomeController::class,'create']);
route::get('posts',[BlogpostsController::class,'posts']);
route::get('myposts',[BlogpostsController::class,'myposts']);
route::get('searchmyposts',[BlogpostsController::class,'searchmyposts']);
route::get('searchallposts',[BlogpostsController::class,'searchallposts']);
Route::resource('/blog',BlogController::class);

//Editors controls

route::get('forumdata',[EditorController::class,'forumdata']);
route::get('blogdata',[EditorController::class,'blogdata']);
route::get('mycreations',[EditorController::class,'mycreations']);


//Therapist Controls
route::get('nav',[TherapistController::class,'nav']);
route::get('forumtherapist',[TherapistController::class,'forumdata']);
route::get('posttherapist',[TherapistController::class,'posts']);
route::get('blogtherapist',[TherapistController::class,'blogdata']);

route::get('profile',[TherapistController::class,'profile']);
route::get('viewprofile/{id}',[TherapistController::class,'viewprofile']);
route::get('createprofileview/{id}',[TherapistController::class,'createprofileview']);
route::post('createprofile',[TherapistController::class,'createprofile']);
route::get('updateprofileview/{id}',[TherapistController::class,'updateprofileview']);
route::post('updateprofile/{id}',[TherapistController::class,'updateprofile']);
route::get('deleteprofile/{id}',[TherapistController::class,'deleteprofile']);
route::get('approve/{id}',[TherapistController::class,'approve']);
route::get('reject/{id}',[TherapistController::class,'reject']);
route::get('transferview/{id}',[TherapistController::class,'transferview']);
route::post('transfer/{id}',[TherapistController::class,'transfer']);
route::get('diagnosis/{id}',[TherapistController::class,'diagnosis']);
route::post('diagnosisform/{id}',[TherapistController::class,'diagnosisform']);
route::get('editdiagnosisview/{id}',[TherapistController::class,'editdiagnosisview']);
route::post('editdiagnosisform/{id}',[TherapistController::class,'editdiagnosisform']);
route::get('diagnosisview/{id}',[TherapistController::class,'diagnosisview']);
route::get('diagnosispdf/{id}',[TherapistController::class,'diagnosispdf']);

route::get('approvedview ',[TherapistController::class, 'approvedview']);
route::get('completed/{id}',[TherapistController::class,'completed']);
route::get('cancelled/{id}',[TherapistController::class,'cancelled']);
route::get('deleteapprove/{id}',[TherapistController::class,'deleteapprove']);
route::get('searchdateapprove',[TherapistController::class,'searchdateapprove']);
route::get('searchaptapprove',[TherapistController::class,'searchaptapprove']);

//search forum data
route::get('searchposttherapist',[TherapistController::class,'searchposttherapist']);
//search blog data
route::get('searchmypostsblog',[TherapistController::class,'searchmyposts']);
//search appointments
route::get('searchappointment',[TherapistController::class,'searchappointment']);
route::get('pending',[TherapistController::class,'pending']);
route::get('searchapttherapist',[TherapistController::class,'searchapttherapist']);
route::get('searchdatetherapist',[TherapistController::class,'searchdatetherapist']);

//Appointment 
route::get('viewtherapist/{id}',[AptController::class,'viewtherapist']);
route::get('viewalltherapists',[AptController::class,'viewalltherapists']);
route::post('createappointment',[AptController::class,'createappointment']);
route::get('appointments',[AptController::class,'appointments']);

route::get('viewApt/{id}',[AptController::class,'viewApt']);
route::get('deleteApt/{id}',[AptController::class,'deleteApt']);
route::get('updateAptview/{id}',[AptController::class,'updateAptview']);
route::post('updateApt/{id}',[AptController::class,'updateApt']);
route::get('Aptpdf/{id}',[AptController::class,'Aptpdf']);

route::get('searchmyappointment',[AptController::class,'searchmyappointment']);
route::get('searchdate',[AptController::class,'searchdate']);

route::get('viewdiagnosis/{id}',[AptController::class, 'viewdiagnosis']);
































/*route::get('searchmyapprovedappt',[AptController::class,'searchapprovedappt']);
route::get('searchdateapproved',[AptController::class,'searchdateapproved']);*/