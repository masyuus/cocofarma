<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturans';

    protected $fillable = [
        'nama_pengaturan',
        'nilai',
        'tipe'
    ];

    protected $casts = [
        'nama_pengaturan' => 'string',
        'nilai' => 'string',
        'tipe' => 'string'
    ];

    /**
     * Helper to get a setting value by name.
     */
    public static function getValue(string $namaPengaturan, $default = null)
    {
        $row = static::where('nama_pengaturan', $namaPengaturan)->first();
        return $row ? $row->nilai : $default;
    }

    /**
     * Helper to set a setting value by name.
     */
    public static function setValue(string $namaPengaturan, $nilai, string $tipe = 'string')
    {
        return static::updateOrCreate(
            ['nama_pengaturan' => $namaPengaturan],
            ['nilai' => $nilai, 'tipe' => $tipe]
        );
    }

    // Accessor untuk nilai berdasarkan tipe
    public function getNilaiParsedAttribute()
    {
        switch ($this->tipe) {
            case 'integer':
            case 'int':
                return (int) $this->nilai;
            case 'decimal':
            case 'float':
            case 'double':
                return (float) $this->nilai;
            case 'boolean':
            case 'bool':
                return filter_var($this->nilai, FILTER_VALIDATE_BOOLEAN);
            case 'json':
                return json_decode($this->nilai, true);
            default:
                return $this->nilai;
        }
    }
}
