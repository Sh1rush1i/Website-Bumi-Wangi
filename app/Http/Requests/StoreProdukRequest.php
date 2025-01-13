<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // will change to authorization logic when made
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'satuan' => 'required|string|max:100',
            'gambar' => 'required|array|min:1',
            'gambar.*' => 'required|image|mimes:jpg,jpeg,png|max:10240', // Max size: 10MB per image
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:51200', // Max size: 50MB
            '360gambar.360' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Max size: 20MB
            '360video.360' => 'nullable|mimes:mp4|max:51200', // Max size: 50MB
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wisata harus diisi.',
            'deskripsi.required' => 'Deskripsi wisata harus diisi.',
            'harga.required' => 'Harga harus diisi dan berupa angka.',
            'satuan.required' => 'Satuan harus diisi.',
            'gambar.required' => 'Gambar wisata harus diunggah.',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format jpg, jpeg, atau png.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 10MB.',
            'video.mimes' => 'Video harus berupa file dengan format mp4, mov, avi, atau mkv.',
            'video.max' => 'Ukuran video tidak boleh lebih dari 50MB.',
        ];
    }
}
