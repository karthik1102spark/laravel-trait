<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Crud
{
	public function index()
	{
		$data = $this->model::all();
		return view($this->list,compact('data'));
	}
	
	public function create(Request $request)
	{
		return view($this->create);
	}
	
	public function store(Request $request)
	{
		Validator::make($request->all(), $this->validationRules())->validate();
		$this->model::create($request->all());
		return redirect($this->redirect)->with('success','Added '.class_basename($this->model).' Successfully');
	}
	
	public function show($resource_id)
	{
		$data = $this->model::findOrFail($resource_id);
		return view($this->show,compact('data'));
	}
	
	public function edit($resource_id)
	{
		$data = $this->model::findOrFail($resource_id);
		return view($this->edit,compact('data'));	}
	
	public function update(Request $request, $resource_id)
	{
		$resource = $this->model::findOrFail($resource_id);
		Validator::make($request->all(), $this->validationRules($resource_id))->validate();
		$resource->update($request->all());
		return redirect($this->redirect)->with('success','Updated '.class_basename($this->model).' Successfully');
	}
	
	public function destroy($resource_id)
	{
		$resource = $this->model::findOrFail($resource_id);
		$resource->delete();
		return redirect($this->redirect)->with('success','Deleted '.class_basename($this->model).' Successfully');
	}
}