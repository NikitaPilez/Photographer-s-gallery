<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Communications;
use App\Orders;
use App\PhotoServices;
use App\Services;
use App\Settings;
use DateTime;

class SendController extends Controller
{
	public function sendModel(){
		// $orders = new Orders;
		// $orders->name = $_GET['name'];
		// $orders->phone = $_GET['phone'];
		// $orders->type = $_GET['type'];
		// $orders->date = $_GET['date'];
		// $orders->save();

		$settings = Settings::find(1);
		mail($settings->email,'Новый заказ на сайте.','Здравствуйте, у вас новый заказ от пользователя '.$_GET['name'].'. Тип фотосъемки:'.$_GET['type'].'. Дата:'.$_GET['date'].'.','From:'.$_GET['name'].' Контакты:'.$_GET['phone'].' ');
	}

	public function sendOrder(){
		$services = Services::where('display','show')->get();
		$idServices = $_GET['id'];
		return view('selectorder',compact('services','idServices'));
	}

	public function sendPhoto(){
		$id = $_GET['idServices'];
		$obj = PhotoServices::where('services_id',$id)->get();
		return view('photoservices',compact('obj'));
	}

	public function sendSms(MessageRequest $request){

		// Communications::create($request->all());

		$settings = Settings::find(1);
		mail($settings->email,'kirillbukrey.com','На вашем сайте оставили новое сообщение или отзыв.');

		$request->session()->flash('success', 
			'Your message was successfully sent');

		return redirect('contacts');
	}
}
