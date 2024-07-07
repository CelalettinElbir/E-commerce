<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function __construct()
    {
        // Sadece index ve show metodlarına middleware uygula
        $this->middleware('admin')->only(['index', 'show', 'destroy']);
    }

    public function index()
    {
        $messages = Message::all();
        return view('user.contactUs.index', compact('messages'));
    }

    public function show(Message $message)
    {
        if (!$message) {
            abort(404); // Or handle the case where message is not found
        }

        // Mark message as read if it's unread
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('user.contactUs.show', compact('message'));
    }


    public function destroy(Message $message)
    {

        if (!$message) {
            abort(404); // Or handle the case where message is not found
        }
        $message->delete();

        $notification = [
            'message' => 'Mesaj Başarıyla Silindi',
            'alert-type' => 'success'
        ];


        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully');
    }

    public function showForm()
    {
        return view('user.contactUs.contact');
    }

    public function submitForm(Request $request)
    {

        // Form doğrulama kuralları
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'email' => 'required|max:255',
            'message' => 'required|string',
        ]);

        try {
            Message::create($request->all());

            $notification = [
                'message' => 'Mesajınız başarıyla gönderildi',
                'alert-type' => 'success'
            ];
            return redirect()->route('contact.form')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            // Hata durumunda kullanıcıya geri bildirim ver
            return redirect()->back()->withInput()->withErrors(['error' => 'Mesajınız gönderilirken bir hata oluştu. Lütfen tekrar deneyin.'])->with($notification);
        }
    }
}
