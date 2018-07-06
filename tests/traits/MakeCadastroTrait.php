<?php

use Faker\Factory as Faker;
use App\Models\Cadastro;
use App\Repositories\CadastroRepository;

trait MakeCadastroTrait
{
    /**
     * Create fake instance of Cadastro and save it in database
     *
     * @param array $cadastroFields
     * @return Cadastro
     */
    public function makeCadastro($cadastroFields = [])
    {
        /** @var CadastroRepository $cadastroRepo */
        $cadastroRepo = App::make(CadastroRepository::class);
        $theme = $this->fakeCadastroData($cadastroFields);
        return $cadastroRepo->create($theme);
    }

    /**
     * Get fake instance of Cadastro
     *
     * @param array $cadastroFields
     * @return Cadastro
     */
    public function fakeCadastro($cadastroFields = [])
    {
        return new Cadastro($this->fakeCadastroData($cadastroFields));
    }

    /**
     * Get fake data of Cadastro
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCadastroData($cadastroFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'codigo' => $fake->word,
            'descripcion' => $fake->word,
            'ubicacion' => $fake->word,
            'ean' => $fake->word,
            'upc' => $fake->word,
            'peso' => $fake->randomDigitNotNull,
            'alto' => $fake->randomDigitNotNull,
            'ancho' => $fake->randomDigitNotNull,
            'profundidad' => $fake->randomDigitNotNull,
            'volumen' => $fake->randomDigitNotNull,
            'familia' => $fake->word,
            'categoria' => $fake->word,
            'unid_caja' => $fake->randomDigitNotNull,
            'caja_pallet' => $fake->randomDigitNotNull,
            'cajas_nivel' => $fake->randomDigitNotNull,
            'altura_nivel' => $fake->randomDigitNotNull
        ], $cadastroFields);
    }
}
