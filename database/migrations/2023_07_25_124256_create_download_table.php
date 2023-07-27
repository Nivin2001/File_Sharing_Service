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
        Schema::create('download', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('file_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }
//     $table->unsignedBigInteger('user_id');
// This line creates an unsignedBigInteger column named user_id in the downloads table. It will store the ID of the user who initiated the download.

// $table->unsignedBigInteger('file_id');
// This line creates an unsignedBigInteger column named file_id in the downloads table. It will store the ID of the file that was downloaded.

// $table->timestamps();
// This line adds two columns, created_at and updated_at, to the downloads table. These columns will automatically store the timestamp when a new record is created and when the record is updated.

// $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
// This line creates a foreign key constraint on the user_id column in the downloads table. It references the id column in the users table. The onDelete('cascade') means that if a user is deleted from the users table, all the associated records in the downloads table with the same user_id will also be deleted.

// $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
// This line creates a foreign key constraint on the file_id column in the downloads table. It references the id column in the files table. The onDelete('cascade') means that if a file is deleted from the files table, all the associated records in the downloads table with the same file_id will also be deleted.

//     /**
    //  * Reverse the migrations.
    //  */
    public function down(): void
    {
        Schema::dropIfExists('download');
    }
};
