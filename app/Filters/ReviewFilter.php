<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ReviewFilter
{
    protected $request;
    protected $builder;

    protected $filters = [
        'sort'
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->filters as $filter) {
            $value = $this->request->query($filter);
            if (!is_null($value)) {
                $method = 'filter' . ucfirst($filter);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

        return $this->builder;
    }

    private function filterSort($value)
    {
        switch ($value) {
            case 'date_asc':
                return $this->builder->orderBy('created_at', 'asc');

            case 'date_desc':
                return $this->builder->orderBy('created_at', 'desc');

            case 'rating_asc':
                return $this->builder->orderBy('rating', 'asc');

            case 'rating_desc':
                return $this->builder->orderBy('rating', 'desc');

            default:
                return $this->builder;
        }
    }
}
