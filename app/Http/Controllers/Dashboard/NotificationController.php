<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBarangKeluar;
use Illuminate\Cache\RateLimiting\Limit;

class NotificationController extends Controller
{
    public function index()
    {
        $title = 'Daftar Notifikasi';

        $notif = Notification::where('is_read', false)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $notifbaca = Notification::where('is_read', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();


        return  view('dashboard.notifikasi.index', compact('title', 'notif', 'notifbaca'));
    }
    public function getNotifications()
    {
        $notifications = Notification::where('is_read', false)
            ->get()
            ->map(function ($notification) {
                $notification->waktu = Carbon::parse($notification->created_at)->diffForHumans();
                return $notification;
            });

        return response()->json($notifications);
    }

    public function markAsRead(request $request)
    {
        $notification = Notification::find($request->id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }
        if (!$notification) {
            toast('Notif gagal dibaca', 'error');
            //alert()->question('QuestionAlert','Data Tidak Masuk.');
        } else {
            toast('Notifikasi Sudah Dibaca', 'success');
            // alert()->success('SuccessAlert','Data Berhasil Di Update!');
        }
        return  redirect()->back();
    }

    public function count()
    {
        $count = Notification::where('is_read', false)->count(); // Misalnya kolom 'is_read' menandakan notifikasi belum dibaca
        return response()->json(['count' => $count]);
    }

    public function countPending()
    {
        $count = TransaksiBarangKeluar::where('status', '=', 'pending')->count();
        return response()->json(['count' => $count]);
    }
}
