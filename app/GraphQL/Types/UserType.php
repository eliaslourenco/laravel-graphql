<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\User;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'Um type de usuários',
        'model' => User::class
    ];
    // Tipos de retorno do nosso banco
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()), // parametro do tipo inteiro obrigatorio!
                'description' => 'Id do usuário do banco de dados' // Consigo adicionar uma descricao do argumento
            ],
            'name' => [
                'type' => Type::string(), // parametro do tipo inteiro obrigatorio!
                'description' => 'Id do usuário do banco de dados' // Consigo adicionar uma descricao do argumento

            ],
            'email' => [
                'type' => Type::string(), // parametro do tipo inteiro obrigatorio!
                'description' => 'Id do usuário do banco de dados' // Consigo adicionar uma descricao do argumento

            ]
        ];
    }
}
