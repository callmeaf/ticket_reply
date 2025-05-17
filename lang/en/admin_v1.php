<?php

return [
    'mail' => [
        'replied' => [
            'subject' => 'New reply to your ticket :ref_code',
            'title' => "New reply to ticket :ref_code",
            'body' => "Your ticket titled ':title' has been replied to by :receiver_identifier.",
            'button' => 'Show Reply',
            'footer' => "Please log in to your account to view the full response.",
            'notification_subject' => "New ticket reply",
            'notification_payload' => "📬 Ticket ':title' has been replied to by :receiver_identifier.\nReference code: :ref_code",
        ],
    ],
];
