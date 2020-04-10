<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{	

	protected function errorResponse($message, $code)
	{ 
		return response()->json([
			'error' => $message,
			'code' => $code
		], $code);
	}

	private function successResponse($data, $code)
	{
		return response()->json($data, $code);
	}

	protected function showAll(Collection $collection, $code = 200)
	{
		$collection = $this->filterData($collection);
		$collection = $this->sortData($collection);
		$collection = $this->paginate($collection);

		return $this->successResponse($collection, $code);
	}

	protected function showOne(Model $instance, $code = 200)
	{				
		return $this->successResponse($instance, $code);
	}

	protected function showMessage($message, $code = 200)
	{
		return response()->json([
			'data' => $message,
			'code' => $code
		], $code);
	}

	protected function filterData(Collection $collection)
	{	
		foreach (request()->query() as $query => $value)
		{
			$attribute = $query;
			if(isset($attribute, $value))
			{
				$collection = $collection->where($attribute, $value);
			}
		}

		return $collection;
	}

	protected function sortData(Collection $collection)
	{
		if (request()->has('sort_by'))
		{
			$attribute = request()->sort_by;
			$collection = $collection->sortBy->{$attribute};
		}

		return $collection;
	}

	protected function paginate(Collection $collection)
	{
		$rules = [
			'per_page' => 'integer|min:2|max:50'
		];

		request()->validate($rules);

		$page = LengthAwarePaginator::resolveCurrentPage();
		$perPage = 30;

		if (request()->has('per_page'))
		{
			$perPage = request()->per_page;
		}

		$results = $collection->forPage($page, $perPage);

		$paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
			'path' => LengthAwarePaginator::resolveCurrentPath(),
		]);

		$paginated->appends(request()->all());

		return $paginated;
	}

}