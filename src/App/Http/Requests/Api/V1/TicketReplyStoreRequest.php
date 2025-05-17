<?php

namespace Callmeaf\TicketReply\App\Http\Requests\Api\V1;

use Callmeaf\Ticket\App\Repo\Contracts\TicketRepoInterface;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketReplyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /**
         * @var TicketRepoInterface $ticketRepo
         */
        $ticketRepo = app(TicketRepoInterface::class);
        $ticket = $ticketRepo->findById($this->get('ticket_ref_code'));

        return $ticket->resource->canAnswer();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(TicketRepoInterface $ticketRepo,UserRepoInterface $userRepo): array
    {
        return [
            'ticket_ref_code' => ['required',Rule::exists($ticketRepo->getTable(),$ticketRepo->getModel()->getRouteKeyName())],
            'sender_identifier' => ['required',Rule::exists($userRepo->getTable(),$userRepo->getModel()->getRouteKeyName())],
            'content' => ['required_without:attachments','max:700'],
            'attachments' => ['required_without:content','array'],
            'attachments.*' => ['required','file','mimes:png,jpg,jpeg,pdf','max:2048'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'sender_identifier' => $this->user()->getRouteKey(),
        ]);
    }
}
