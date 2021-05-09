
<?php
//Thiago Oliveira
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;

class NotificationController extends Controller
{
    //
    public function send( SendEmailRequest $request){
        echo'<pre>';
       print_r($request->all());
    }
}
