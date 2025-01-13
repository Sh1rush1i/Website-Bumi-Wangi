<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukRequest extends FormRequest
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
            'deskripsi' => 'required|string|max:500',
            'harga' => 'required|integer|min:1', // Ensure harga is a positive integer
            'satuan' => 'required|string|max:50',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:10240', // Max 10MB image, optional
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:51200', // Max 50MB video, optional
            '360gambar.360' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Max size: 20MB, optional
            '360video.360' => 'nullable|mimes:mp4|max:51200', // Max size: 50MB, optional
        ];
    }

    /**
     * Get custom error messages for validator.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Nama wisata harus diisi.',
            'deskripsi.required' => 'Deskripsi wisata harus diisi.',
            'harga.required' => 'Harga harus diisi dan berupa angka.',
            'harga.min' => 'Harga harus lebih besar dari 0.',
            'satuan.required' => 'Satuan harus diisi.',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format jpg, jpeg, atau png.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 10MB.',
            'video.mimes' => 'Video harus berupa file dengan format mp4, mov, avi, atau mkv.',
            'video.max' => 'Ukuran video tidak boleh lebih dari 50MB.',
        ];
    }
}
