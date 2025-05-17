<?php

use Callmeaf\Base\App\Enums\RequestType;

return [
    'model' => \Callmeaf\TicketReply\App\Models\TicketReply::class,
    'route_key_name' => 'id',
    'repo' => \Callmeaf\TicketReply\App\Repo\V1\TicketReplyRepo::class,
    'resources' => [
        RequestType::API->value => [
            'resource' => \Callmeaf\TicketReply\App\Http\Resources\Api\V1\TicketReplyResource::class,
            'resource_collection' => \Callmeaf\TicketReply\App\Http\Resources\Api\V1\TicketReplyCollection::class,
        ],
        RequestType::WEB->value => [
            'resource' => \Callmeaf\TicketReply\App\Http\Resources\Web\V1\TicketReplyResource::class,
            'resource_collection' => \Callmeaf\TicketReply\App\Http\Resources\Web\V1\TicketReplyCollection::class,
        ],
        RequestType::ADMIN->value => [
            'resource' => \Callmeaf\TicketReply\App\Http\Resources\Admin\V1\TicketReplyResource::class,
            'resource_collection' => \Callmeaf\TicketReply\App\Http\Resources\Admin\V1\TicketReplyCollection::class,
        ],
    ],
    'events' => [
        RequestType::API->value => [
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyIndexed::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyCreated::class => [
                \Callmeaf\TicketReply\App\Listeners\Api\V1\ChangeTicketStatusAfterReplyCreated::class,
            ],
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyShowed::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyUpdated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyDeleted::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Api\V1\TicketReplyTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::WEB->value => [
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyIndexed::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyCreated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyShowed::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyUpdated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyDeleted::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Web\V1\TicketReplyTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::ADMIN->value => [
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyIndexed::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyCreated::class => [
                \Callmeaf\TicketReply\App\Listeners\Admin\V1\ChangeTicketStatusAfterReplyCreated::class,
                \Callmeaf\TicketReply\App\Listeners\Admin\V1\ModifyTicketReceiverToCurrentUserAfterReplyCreated::class,
                \Callmeaf\TicketReply\App\Listeners\Admin\V1\NotifySenderTicketAfterReplyCreated::class,
            ],
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyShowed::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyUpdated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyDeleted::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyTypeUpdated::class => [
                // listeners
            ],
        ],
    ],
    'requests' => [
        RequestType::API->value => [
            'index' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyIndexRequest::class,
            'store' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyStoreRequest::class,
            'show' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyShowRequest::class,
            'update' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyUpdateRequest::class,
            'destroy' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyDestroyRequest::class,
            'statusUpdate' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\TicketReply\App\Http\Requests\Api\V1\TicketReplyTypeUpdateRequest::class,
        ],
        RequestType::WEB->value => [
            'index' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyIndexRequest::class,
            'create' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyCreateRequest::class,
            'store' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyStoreRequest::class,
            'show' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyShowRequest::class,
            'edit' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyEditRequest::class,
            'update' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyUpdateRequest::class,
            'destroy' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyDestroyRequest::class,
            'statusUpdate' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\TicketReply\App\Http\Requests\Web\V1\TicketReplyTypeUpdateRequest::class,
        ],
        RequestType::ADMIN->value => [
            'index' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyIndexRequest::class,
            'store' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyStoreRequest::class,
            'show' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyShowRequest::class,
            'update' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyUpdateRequest::class,
            'destroy' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyDestroyRequest::class,
            'statusUpdate' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\TicketReply\App\Http\Requests\Admin\V1\TicketReplyTypeUpdateRequest::class,
        ],
    ],
    'controllers' => [
        RequestType::API->value => [
            'ticket_reply' => \Callmeaf\TicketReply\App\Http\Controllers\Api\V1\TicketReplyController::class,
        ],
        RequestType::WEB->value => [
            'ticket_reply' => \Callmeaf\TicketReply\App\Http\Controllers\Web\V1\TicketReplyController::class,
        ],
        RequestType::ADMIN->value => [
            'ticket_reply' => \Callmeaf\TicketReply\App\Http\Controllers\Admin\V1\TicketReplyController::class,
        ],
    ],
    'routes' => [
        RequestType::API->value => [
            'prefix' => 'ticket_replies',
            'as' => 'ticket_replies.',
            'middleware' => [
                'auth:sanctum'
            ],
        ],
        RequestType::WEB->value => [
            'prefix' => 'ticket_replies',
            'as' => 'ticket_replies.',
            'middleware' => [
                'route_status:' . \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
            ],
        ],
        RequestType::ADMIN->value => [
            'prefix' => 'ticket_replies',
            'as' => 'ticket_replies.',
            'middleware' => [
                'auth:sanctum',
                'role:' . \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN->value
            ],
        ],
    ],
    'enums' => [
         'status' => \Callmeaf\TicketReply\App\Enums\TicketReplyStatus::class,
         'type' => \Callmeaf\TicketReply\App\Enums\TicketReplyType::class,
    ],
     'exports' => [
        RequestType::API->value => [
            'excel' => \Callmeaf\TicketReply\App\Exports\Api\V1\TicketRepliesExport::class,
        ],
        RequestType::WEB->value => [
            'excel' => \Callmeaf\TicketReply\App\Exports\Web\V1\TicketRepliesExport::class,
        ],
        RequestType::ADMIN->value => [
            'excel' => \Callmeaf\TicketReply\App\Exports\Admin\V1\TicketRepliesExport::class,
        ],
     ],
     'imports' => [
         RequestType::API->value => [
             'excel' => \Callmeaf\TicketReply\App\Imports\Api\V1\TicketRepliesImport::class,
         ],
         RequestType::WEB->value => [
             'excel' => \Callmeaf\TicketReply\App\Imports\Web\V1\TicketRepliesImport::class,
         ],
         RequestType::ADMIN->value => [
             'excel' => \Callmeaf\TicketReply\App\Imports\Admin\V1\TicketRepliesImport::class,
         ],
     ],
];
