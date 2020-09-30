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
use App\Models\Post;


class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'post',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('post_type'));
    }

    public function args(): array
    {
        return [
            'user_id' => [
                'type' => Type::int(),
                'description' => 'Id do usuario'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
       return Post::all();
    }
}
