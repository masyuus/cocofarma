<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaturans = Pengaturan::orderBy('key')->get();
        return view('admin.pages.pengaturan.index-pengaturan', compact('pengaturans'));
    }

    /**
     * Trigger a database backup (creates a SQL dump in storage/app/backups).
     */
    public function backupDatabase(Request $request)
    {
        // Ensure directory exists
        $backupPath = storage_path('app/backups');
        if (!file_exists($backupPath)) {
            mkdir($backupPath, 0755, true);
        }

        $filename = 'backup_' . date('Ymd_His') . '.sql';
        $fullPath = $backupPath . DIRECTORY_SEPARATOR . $filename;

        // Try using mysqldump if available
        $dbHost = config('database.connections.mysql.host');
        $dbPort = config('database.connections.mysql.port');
        $dbUser = config('database.connections.mysql.username');
        $dbPass = config('database.connections.mysql.password');
        $dbName = config('database.connections.mysql.database');

        $command = "mysqldump --host={$dbHost} --port={$dbPort} --user={$dbUser} --password=\"{$dbPass}\" {$dbName} > " . escapeshellarg($fullPath);
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            return redirect()->back()->with('error', 'Backup gagal. Pastikan mysqldump tersedia di sistem.');
        }

        return redirect()->back()->with('success', "Backup berhasil: {$filename}");
    }

    /**
     * Save dashboard goal setting
     */
    public function saveDashboardGoal(Request $request)
    {
        $request->validate([
            'dashboard_goal' => 'required|numeric|min:0|max:100',
        ]);

        Pengaturan::updateOrCreate(
            ['key' => 'dashboard_goal'],
            ['value' => $request->input('dashboard_goal'), 'type' => 'number', 'description' => 'Goal persen untuk dashboard']
        );

        return redirect()->route('backoffice.pengaturan.index')->with('success', 'Pengaturan goal dashboard disimpan.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pengaturan.create-pengaturan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: Implement store logic
        return redirect()->route('backoffice.pengaturan.index')->with('success', 'Pengaturan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pages.pengaturan.show-pengaturan', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.pengaturan.edit-pengaturan', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO: Implement update logic
        return redirect()->route('backoffice.pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO: Implement destroy logic
        return redirect()->route('backoffice.pengaturan.index')->with('success', 'Pengaturan berhasil dihapus.');
    }
}
