<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

use App\Models\Post;

use GraphQL;

class PostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'post',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQl::type('post_type');
    }

    public function args(): array
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Titulo do post'
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Status do post'
            ],
            'user_id' => [
                'type' =>  Type::nonNull(Type::int()),
                'description' => 'Id do usuario'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
       $post = Post::create([
            'title'=> $args['title'],
            'active'=> $args['active'],
            'user_id'=> $args['user_id']
       ]);

       return $post;
    }
}
