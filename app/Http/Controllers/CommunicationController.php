<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class CommunicationController extends Controller
{
    public static function getId()
    {
        return  session('role') == 'admin' ? session('user_id') : (session('role') == 'operator' ? session('operator_id') : session('client_id'));
    }

    public function index()
    {
        $userId = $this->getId();

        // Fetch messages where the user is either the sender or receiver
        $communications = Communication::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'desc')
            ->get();

        $users = User::all();

        return view('communications.index', compact('communications', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required',
            'message' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments');
        }
        Communication::create([
            'sender_id' => $this->getId(),
            'receiver_id' => $request->receiver_id,
            'project_id' => $request->project_id,
            'message' => $request->message,
            'attachment' => $attachmentPath,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
