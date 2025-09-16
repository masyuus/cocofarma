<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && in_array(auth()->user()->role, ['super_admin', 'admin']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_produk' => ['required', 'string', 'max:50', 'unique:produks,kode_produk'],
            'nama_produk' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'kategori' => ['nullable', 'string', 'max:100'],
            'harga_jual' => ['required', 'numeric', 'min:0'],
            'satuan' => ['required', 'string', 'max:50'],
            'stok' => ['required', 'integer', 'min:0'],
            'minimum_stok' => ['required', 'integer', 'min:0'],
            'foto' => ['nullable', 'image', 'max:2048'], // max 2MB
            'status' => ['boolean'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'kode_produk.required' => 'Kode produk wajib diisi.',
            'kode_produk.unique' => 'Kode produk sudah digunakan.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.numeric' => 'Harga jual harus berupa angka.',
            'harga_jual.min' => 'Harga jual tidak boleh negatif.',
            'satuan.required' => 'Satuan wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'minimum_stok.required' => 'Minimum stok wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ];
    }
}
