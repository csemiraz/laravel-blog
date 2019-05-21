<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function manageSubscriber()
    {
        $subscribers = Subscriber::latest()->get();
        return view('back-end.admin.subscriber.manage-subscriber', compact('subscribers'));
    }

    public function deleteSubscriber($id) 
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();

        Toastr::success('Data deleted successfully', 'Success');
        return redirect()->back();
    }


}
