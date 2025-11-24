<?php

namespace App\Filters;

use Illuminate\Http\Request;

class RentFilter
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

            case 'status_asc':
                return $this->builder->orderBy('status', 'asc');

            case 'status_desc':
                return $this->builder->orderBy('status', 'desc');

            case 'rentFee_asc':
                return $this->builder->orderBy('rentFee', 'asc');

            case 'rentFee_desc':
                return $this->builder->orderBy('rentFee', 'desc');

            case 'startRent_asc':
                return $this->builder->orderBy('startRent', 'asc');

            case 'startRent_desc':
                return $this->builder->orderBy('startRent', 'desc');

            default:
                return $this->builder;
        }
    }
}
