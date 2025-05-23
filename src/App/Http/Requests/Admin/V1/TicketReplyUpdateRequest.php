<?php

namespace Callmeaf\TicketReply\App\Http\Requests\Admin\V1;

use Illuminate\Foundation\Http\FormRequest;

class TicketReplyUpdateRequest extends FormRequest
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
            'content' => ['required_without:attachments','max:700'],
            'attachments' => ['required_without:content','array'],
            'attachments.*' => ['required','file','mimes:png,jpg,jpeg,pdf','max:2048'],
        ];
    }
}
