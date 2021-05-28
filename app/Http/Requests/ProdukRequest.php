<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'kategori_produk_id' => 'required|max:255',
            'nama_produk' => 'required|max:255',
            'description' => 'required',
            // 'price' => 'required|integer',
            'stok' => 'required|integer'
        ];
    }
}
