<?php

return [
    'mail' => [
        'replied' => [
            'subject' => 'تیکت شما با موفقیت ثبت شد – کد: :ref_code',
            'title' => "پاسخ جدید به تیکت :ref_code",
            'body' => "تیکت شما با عنوان «:title» توسط :receiver_identifier پاسخ داده شد.",
            'button' => 'مشاهده پاسخ',
            'footer' => "برای مشاهده پاسخ کامل، به بخش پشتیبانی مراجعه کنید.",
            'notification_subject' => "پاسخ جدید به تیکت",
            'notification_payload' => "📬 تیکت «:title» توسط :receiver_identifier پاسخ داده شد.\nکد پیگیری: :ref_code",
            "receiver_identifier" => "تیم پشتیبانی"
        ],
    ],
];
