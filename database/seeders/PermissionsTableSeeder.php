<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'empleado_access',
            ],
            [
                'id'    => 18,
                'title' => 'agregar_empleado_create',
            ],
            [
                'id'    => 19,
                'title' => 'agregar_empleado_edit',
            ],
            [
                'id'    => 20,
                'title' => 'agregar_empleado_show',
            ],
            [
                'id'    => 21,
                'title' => 'agregar_empleado_delete',
            ],
            [
                'id'    => 22,
                'title' => 'agregar_empleado_access',
            ],
            [
                'id'    => 23,
                'title' => 'documento_empleado_create',
            ],
            [
                'id'    => 24,
                'title' => 'documento_empleado_edit',
            ],
            [
                'id'    => 25,
                'title' => 'documento_empleado_show',
            ],
            [
                'id'    => 26,
                'title' => 'documento_empleado_delete',
            ],
            [
                'id'    => 27,
                'title' => 'documento_empleado_access',
            ],
            [
                'id'    => 28,
                'title' => 'recibo_pago_create',
            ],
            [
                'id'    => 29,
                'title' => 'recibo_pago_edit',
            ],
            [
                'id'    => 30,
                'title' => 'recibo_pago_show',
            ],
            [
                'id'    => 31,
                'title' => 'recibo_pago_delete',
            ],
            [
                'id'    => 32,
                'title' => 'recibo_pago_access',
            ],
            [
                'id'    => 33,
                'title' => 'contrato_laboral_create',
            ],
            [
                'id'    => 34,
                'title' => 'contrato_laboral_edit',
            ],
            [
                'id'    => 35,
                'title' => 'contrato_laboral_show',
            ],
            [
                'id'    => 36,
                'title' => 'contrato_laboral_delete',
            ],
            [
                'id'    => 37,
                'title' => 'contrato_laboral_access',
            ],
            [
                'id'    => 38,
                'title' => 'entrenamiento_access',
            ],
            [
                'id'    => 39,
                'title' => 'descripcion_entrenamiento_create',
            ],
            [
                'id'    => 40,
                'title' => 'descripcion_entrenamiento_edit',
            ],
            [
                'id'    => 41,
                'title' => 'descripcion_entrenamiento_show',
            ],
            [
                'id'    => 42,
                'title' => 'descripcion_entrenamiento_delete',
            ],
            [
                'id'    => 43,
                'title' => 'descripcion_entrenamiento_access',
            ],
            [
                'id'    => 44,
                'title' => 'asistencia_entrenamiento_create',
            ],
            [
                'id'    => 45,
                'title' => 'asistencia_entrenamiento_edit',
            ],
            [
                'id'    => 46,
                'title' => 'asistencia_entrenamiento_show',
            ],
            [
                'id'    => 47,
                'title' => 'asistencia_entrenamiento_delete',
            ],
            [
                'id'    => 48,
                'title' => 'asistencia_entrenamiento_access',
            ],
            [
                'id'    => 49,
                'title' => 'charla_create',
            ],
            [
                'id'    => 50,
                'title' => 'charla_edit',
            ],
            [
                'id'    => 51,
                'title' => 'charla_show',
            ],
            [
                'id'    => 52,
                'title' => 'charla_delete',
            ],
            [
                'id'    => 53,
                'title' => 'charla_access',
            ],
            [
                'id'    => 54,
                'title' => 'asistencia_charla_create',
            ],
            [
                'id'    => 55,
                'title' => 'asistencia_charla_edit',
            ],
            [
                'id'    => 56,
                'title' => 'asistencia_charla_show',
            ],
            [
                'id'    => 57,
                'title' => 'asistencia_charla_delete',
            ],
            [
                'id'    => 58,
                'title' => 'asistencia_charla_access',
            ],
            [
                'id'    => 59,
                'title' => 'empleado_contrato_create',
            ],
            [
                'id'    => 60,
                'title' => 'empleado_contrato_edit',
            ],
            [
                'id'    => 61,
                'title' => 'empleado_contrato_show',
            ],
            [
                'id'    => 62,
                'title' => 'empleado_contrato_delete',
            ],
            [
                'id'    => 63,
                'title' => 'empleado_contrato_access',
            ],
            [
                'id'    => 64,
                'title' => 'horas_trabajada_create',
            ],
            [
                'id'    => 65,
                'title' => 'horas_trabajada_edit',
            ],
            [
                'id'    => 66,
                'title' => 'horas_trabajada_show',
            ],
            [
                'id'    => 67,
                'title' => 'horas_trabajada_delete',
            ],
            [
                'id'    => 68,
                'title' => 'horas_trabajada_access',
            ],
            [
                'id'    => 69,
                'title' => 'cliente_access',
            ],
            [
                'id'    => 70,
                'title' => 'contrato_documento_create',
            ],
            [
                'id'    => 71,
                'title' => 'contrato_documento_edit',
            ],
            [
                'id'    => 72,
                'title' => 'contrato_documento_show',
            ],
            [
                'id'    => 73,
                'title' => 'contrato_documento_delete',
            ],
            [
                'id'    => 74,
                'title' => 'contrato_documento_access',
            ],
            [
                'id'    => 75,
                'title' => 'instructor_create',
            ],
            [
                'id'    => 76,
                'title' => 'instructor_edit',
            ],
            [
                'id'    => 77,
                'title' => 'instructor_show',
            ],
            [
                'id'    => 78,
                'title' => 'instructor_delete',
            ],
            [
                'id'    => 79,
                'title' => 'instructor_access',
            ],
            [
                'id'    => 80,
                'title' => 'centro_de_herramientum_access',
            ],
            [
                'id'    => 81,
                'title' => 'cargo_create',
            ],
            [
                'id'    => 82,
                'title' => 'cargo_edit',
            ],
            [
                'id'    => 83,
                'title' => 'cargo_show',
            ],
            [
                'id'    => 84,
                'title' => 'cargo_delete',
            ],
            [
                'id'    => 85,
                'title' => 'cargo_access',
            ],
            [
                'id'    => 86,
                'title' => 'categoria_herramientum_create',
            ],
            [
                'id'    => 87,
                'title' => 'categoria_herramientum_edit',
            ],
            [
                'id'    => 88,
                'title' => 'categoria_herramientum_show',
            ],
            [
                'id'    => 89,
                'title' => 'categoria_herramientum_delete',
            ],
            [
                'id'    => 90,
                'title' => 'categoria_herramientum_access',
            ],
            [
                'id'    => 91,
                'title' => 'departamento_create',
            ],
            [
                'id'    => 92,
                'title' => 'departamento_edit',
            ],
            [
                'id'    => 93,
                'title' => 'departamento_show',
            ],
            [
                'id'    => 94,
                'title' => 'departamento_delete',
            ],
            [
                'id'    => 95,
                'title' => 'departamento_access',
            ],
            [
                'id'    => 96,
                'title' => 'agregar_cliente_create',
            ],
            [
                'id'    => 97,
                'title' => 'agregar_cliente_edit',
            ],
            [
                'id'    => 98,
                'title' => 'agregar_cliente_show',
            ],
            [
                'id'    => 99,
                'title' => 'agregar_cliente_delete',
            ],
            [
                'id'    => 100,
                'title' => 'agregar_cliente_access',
            ],
            [
                'id'    => 101,
                'title' => 'herramientum_create',
            ],
            [
                'id'    => 102,
                'title' => 'herramientum_edit',
            ],
            [
                'id'    => 103,
                'title' => 'herramientum_show',
            ],
            [
                'id'    => 104,
                'title' => 'herramientum_delete',
            ],
            [
                'id'    => 105,
                'title' => 'herramientum_access',
            ],
            [
                'id'    => 106,
                'title' => 'uso_herramientum_create',
            ],
            [
                'id'    => 107,
                'title' => 'uso_herramientum_edit',
            ],
            [
                'id'    => 108,
                'title' => 'uso_herramientum_show',
            ],
            [
                'id'    => 109,
                'title' => 'uso_herramientum_delete',
            ],
            [
                'id'    => 110,
                'title' => 'uso_herramientum_access',
            ],
            [
                'id'    => 111,
                'title' => 'mantenimiento_herramientum_create',
            ],
            [
                'id'    => 112,
                'title' => 'mantenimiento_herramientum_edit',
            ],
            [
                'id'    => 113,
                'title' => 'mantenimiento_herramientum_show',
            ],
            [
                'id'    => 114,
                'title' => 'mantenimiento_herramientum_delete',
            ],
            [
                'id'    => 115,
                'title' => 'mantenimiento_herramientum_access',
            ],
            [
                'id'    => 116,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
