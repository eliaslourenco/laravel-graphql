<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

use GraphQL;

use App\Models\User;


class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'Uma query de users'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user_type'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(), // parametro do tipo inteiro obrigatorio!
                //'type' => Type::int(), // parametro do tipo inteiro
                'description' => 'Id tipo inteiro' // Consigo adicionar uma descricao do argumento
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        // $fields = $getSelectFields();
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();
        if(isset($args['id'])){
            return User::where('id', $args['id'])->get();
        }
         return User::all();
        
    }
}
