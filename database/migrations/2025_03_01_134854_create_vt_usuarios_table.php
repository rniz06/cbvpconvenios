<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW vt_usuarios AS
            SELECT 
                users.id,
                users.personal_id,
                users.email,
                users.password,
                users.created_at,
                users.updated_at,
                users.deleted_at,
                personalcbvp.vt_personales.nombrecompleto,
                personalcbvp.vt_personales.codigo,
                personalcbvp.vt_personales.categoria
            FROM users
            JOIN personalcbvp.vt_personales ON (personalcbvp.vt_personales.idpersonal = users.personal_id);
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vt_usuarios;');
    }
};
