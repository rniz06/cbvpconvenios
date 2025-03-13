<?php

namespace App\Http\Requests\Convenio;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvenioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string',
            'institucion_id' => 'required|exists:instituciones,id_institucion',
            'estado_id' => 'required|exists:convenio_estados,idconvenio_estado',
            'fecha_suscrito' => 'required|date',
            'fecha_fin' => 'required|date',
            'presidente_id' => 'required|exists:db_personal.personal,idpersonal',
            'secretario_id' => 'required|exists:db_personal.personal,idpersonal',
            //'otros_id' => 'nullable|exists:db_personal.personal,idpersonal',
            'archivo' => 'required|file|max:8192|mimes:pdf'
        ];
    }
}
