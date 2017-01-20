<?php

namespace CodeFin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeFin\Repositories\MyModelRepository;
use CodeFin\Models\MyModel;

/**
 * Class MyModelRepositoryEloquent
 * @package namespace CodeFin\Repositories;
 */
class MyModelRepositoryEloquent extends BaseRepository implements MyModelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MyModel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
