<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CadastroApiTest extends TestCase
{
    use MakeCadastroTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCadastro()
    {
        $cadastro = $this->fakeCadastroData();
        $this->json('POST', '/api/v1/cadastros', $cadastro);

        $this->assertApiResponse($cadastro);
    }

    /**
     * @test
     */
    public function testReadCadastro()
    {
        $cadastro = $this->makeCadastro();
        $this->json('GET', '/api/v1/cadastros/'.$cadastro->id);

        $this->assertApiResponse($cadastro->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCadastro()
    {
        $cadastro = $this->makeCadastro();
        $editedCadastro = $this->fakeCadastroData();

        $this->json('PUT', '/api/v1/cadastros/'.$cadastro->id, $editedCadastro);

        $this->assertApiResponse($editedCadastro);
    }

    /**
     * @test
     */
    public function testDeleteCadastro()
    {
        $cadastro = $this->makeCadastro();
        $this->json('DELETE', '/api/v1/cadastros/'.$cadastro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cadastros/'.$cadastro->id);

        $this->assertResponseStatus(404);
    }
}
