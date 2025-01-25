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
        Schema::create('applications_new', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name')->nullable(false); // NOT NULL
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cover_letter')->nullable();
            $table->timestamps();
        });

        \DB::table('applications')->select('id', 'job_id', 'user_id', 'cover_letter', 'created_at', 'updated_at')
            ->orderBy('id')
            ->chunk(100, function ($applications) {
                $data = $applications->map(function ($application) {
                    return [
                        'id' => $application->id,
                        'applicant_name' => $application->applicant_name, 
                        'job_id' => $application->job_id,
                        'user_id' => $application->user_id,
                        'cover_letter' => $application->cover_letter,
                        'created_at' => $application->created_at,
                        'updated_at' => $application->updated_at,
                    ];
                })->toArray();

                \DB::table('applications_new')->insert($data);
            });

        Schema::drop('applications');

        Schema::rename('applications_new', 'applications');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('applications_backup', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name')->nullable(false); // NOT NULL
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cover_letter')->nullable();
            $table->timestamps();
        });

        \DB::table('applications')->select('id', 'applicant_name', 'job_id', 'user_id', 'cover_letter', 'created_at', 'updated_at')
            ->orderBy('id')
            ->chunk(100, function ($applications) {
                $data = $applications->map(function ($application) {
                    return [
                        'id' => $application->id,
                        'applicant_name' => $application->applicant_name,
                        'job_id' => $application->job_id,
                        'user_id' => $application->user_id,
                        'cover_letter' => $application->cover_letter,
                        'created_at' => $application->created_at,
                        'updated_at' => $application->updated_at,
                    ];
                })->toArray();

                \DB::table('applications_backup')->insert($data);
            });

        Schema::drop('applications');

        Schema::rename('applications_backup', 'applications');
    }
};