<?php
 
class usuarioSeeder extends Seeder {
 
    public function run()
    {
        DB::table('usuario')->delete();
 
        User::create(array(
            'nombre' => 'firstuser',
            'clave' => Hash::make('first_password')
        ));
 
        User::create(array(
            'nombre' => 'seconduser',
            'clave' => Hash::make('second_password')
        ));
    }
 
}