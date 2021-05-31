<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportPhone extends FormRequest
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
            'nama_terlapor' => 'required',
            'kontak_pelaku' => 'required',
            'kronologi' => 'required',
            'total_kerugian' => 'required'
        ];
    }

    public function message()
    {
        return[
            'nama_terlapor.required' => 'Nama terlapor wajib diisi.',
            'kontak_pelaku.required' => 'Kontak pelaku wajib diisi.',
            'kronologi.required' => 'Kronologi kejadian wajib diisi.',
            'total_kerugian.required' => 'Total kerugian wajib diisi.',
        ];
    }
}
