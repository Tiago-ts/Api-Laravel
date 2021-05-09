<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class SendEmailRequest extends FormRequest
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
            'email' => 'required',
            'title' => 'required',
            'body' => 'required',
        ];
    }

    
    public function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        $errors = array_values($errors);

        $errorsHandle = []; 
        foreach ($errors as $error) {
           foreach ($error as $value) {
              array_push($errorsHandle, $value);
           }
        }

        throw new HttpResponseException(
            response()->json(['errors' => $errorsHandle], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
