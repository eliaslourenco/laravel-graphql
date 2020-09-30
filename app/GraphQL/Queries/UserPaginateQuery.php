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


class UserPaginateQuery extends Query
{
    protected $attributes = [
        'name' => 'userPaginate',
        'description' => 'Uma Query de paginacao'
    ];

    public function type(): Type
    {
       return GraphQL::paginate('user_type');
       
    }

    public function args(): array
    {
        return [
            'page' => [
                'type'=> type::int(),
                'description' => 'Pagina definida para consulta'
            ],
            'paginate' => [
                'type'=> type::int(),
                'description' => 'Quantidade registro por consulta'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $paginate = 10;
       
        if(isset($args['paginate'])) {
            $paginate = $args['paginate'];
        }
        
        $page = 1;
       
        if(isset($args['page'])) {
            $page = $args['page'];
        }
        return User::paginate($paginate, ['*'], 'page', $page );
       
    }
}
