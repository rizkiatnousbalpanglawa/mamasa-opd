<?php

namespace App\Http\Middleware;

use App\Models\StatistikHarian;
use App\Models\StatistikOnline;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HitCounterMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $today = Carbon::today()->toDateString();

        // Ambil / buat data harian
        $stat = StatistikHarian::firstOrCreate(['tanggal' => $today]);

        // Tambah hits setiap request
        $stat->increment('hits');

        // Cek di tabel online apakah IP ini sudah tercatat hari ini
        $online = StatistikOnline::where('ip_address', $ip)->first();

        if (! $online || $online->last_activity->isBefore(Carbon::today())) {
            // Kalau belum ada / belum aktif hari ini → hitung sebagai pengunjung baru
            $stat->increment('pengunjung');
        }

        // Update last_activity
        StatistikOnline::updateOrCreate(
            ['ip_address' => $ip],
            ['last_activity' => Carbon::now()]
        );

        return $next($request);
    }
}
