<?php

use App\Models\Cadastro;
use App\Repositories\CadastroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CadastroRepositoryTest extends TestCase
{
    use MakeCadastroTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CadastroRepository
     */
    protected $cadastroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cadastroRepo = App::make(CadastroRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCadastro()
    {
        $cadastro = $this->fakeCadastroData();
        $createdCadastro = $this->cadastroRepo->create($cadastro);
        $createdCadastro = $createdCadastro->toArray();
        $this->assertArrayHasKey('id', $createdCadastro);
        $this->assertNotNull($createdCadastro['id'], 'Created Cadastro must have id specified');
        $this->assertNotNull(Cadastro::find($createdCadastro['id']), 'Cadastro with given id must be in DB');
        $this->assertModelData($cadastro, $createdCadastro);
    }

    /**
     * @test read
     */
    public function testReadCadastro()
    {
        $cadastro = $this->makeCadastro();
        $dbCadastro = $this->cadastroRepo->find($cadastro->id);
        $dbCadastro = $dbCadastro->toArray();
        $this->assertModelData($cadastro->toArray(), $dbCadastro);
    }

    /**
     * @test update
     */
    public function testUpdateCadastro()
    {
        $cadastro = $this->makeCadastro();
        $fakeCadastro = $this->fakeCadastroData();
        $updatedCadastro = $this->cadastroRepo->update($fakeCadastro, $cadastro->id);
        $this->assertModelData($fakeCadastro, $updatedCadastro->toArray());
        $dbCadastro = $this->cadastroRepo->find($cadastro->id);
        $this->assertModelData($fakeCadastro, $dbCadastro->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCadastro()
    {
        $cadastro = $this->makeCadastro();
        $resp = $this->cadastroRepo->delete($cadastro->id);
        $this->assertTrue($resp);
        $this->assertNull(Cadastro::find($cadastro->id), 'Cadastro should not exist in DB');
    }
}
