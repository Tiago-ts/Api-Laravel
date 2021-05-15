
<?php

namespace App\Http\Controllers;
use App\Models\LogMail;
use Illuminate\Http\Request;
use App\Mail\Email;
use App\Http\Requests\SendEmailRequest;
use Illuminate\Support\Facades\Mail;
class NotificationController extends Controller
{
    //
    public function send( SendEmailRequest $request){

        try{
              $parans = ($request->all());

       $dadosLog = [
           'email' => $parans ['email'],
           'date' => now()
       ];

       $log = new LogMail($dadosLog);
       $log-> save();
       Mail::to($parans['email'])->send( new Email($parans['body']));

        } catch (\Throwable $th){
            response()->json(['message' => 'Opss'], 500);

        }
        
    }
}
