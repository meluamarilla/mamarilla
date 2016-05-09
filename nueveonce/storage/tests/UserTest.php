<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseMigrations;
    use WithoutMiddleware;

    /*public function testUserCreate()
    {
       /* $data = $this->getData();
        // Creamos un nuevo usuario y verificamos la respuesta
        $this->post('/cuenta', $data)
            ->seeJsonEquals(['created' => true]);

        $data = $this->getData(['nombre' => 'Gaddy']);
        // Actualizamos al usuario recien creado (id = 1)
        $this->put('/cuenta/1', $data)
            ->seeJsonEquals(['updated' => true]);

        // Obtenemos los datos de dicho usuario modificado
        // y verificamos que el nombre sea el correcto
        $this->get('cuenta/1')->seeJson(['nombre' => 'Gaddy']);

        // Eliminamos al usuario
        $this->delete('cuenta/1')->seeJson(['deleted' => true]);
    }*/

    public function getData($custom = array())
    {
        $data = [
            'nombre'      => 'melu',
            'apellido'     => 'amarilla',
            'direccion'  => 'mra'
            ];
        $data = array_merge($data, $custom);
        return $data;
    }
}