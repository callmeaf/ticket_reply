<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();

            /**
             * @var \Callmeaf\Ticket\App\Repo\Contracts\TicketRepoInterface $ticketRepo
             */
            $ticketRepo = app(\Callmeaf\Ticket\App\Repo\Contracts\TicketRepoInterface::class);
            $table->string('ticket_ref_code');
            $table->foreign('ticket_ref_code')->references($ticketRepo->getModel()->getRouteKeyName())->on($ticketRepo->getTable())->cascadeOnDelete();
            /**
             * @var \Callmeaf\User\App\Repo\Contracts\UserRepoInterface $userRepo
             */
            $userRepo = app(\Callmeaf\User\App\Repo\Contracts\UserRepoInterface::class);
            $table->string('sender_identifier')->nullable();
            $table->foreign('sender_identifier')->references($userRepo->getModel()->getRouteKeyName())->on($userRepo->getTable())->cascadeOnUpdate()->nullOnDelete();

            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_replies');
    }
};
