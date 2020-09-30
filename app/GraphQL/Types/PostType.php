<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Models\Post;


class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A type of Post',
        'model' => Post::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::ID(),
                'description' => 'Id do Post'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Titulo do post'
            ],
            'active'=> [
                'type' => Type::boolean(),
                'description' => 'Status do post'
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'Id do usuario do Post'
            ]
        ];
    }
}
