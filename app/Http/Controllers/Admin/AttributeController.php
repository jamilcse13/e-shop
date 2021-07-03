<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AttributeController extends BaseController
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }


    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();

        $this->setPageTitle('Attributes', 'List of all attributes');
        return view('admin.attributes.index', compact('attributes'));
    }


    public function create()
    {
        $this->setPageTitle('Attribues', 'Create Attributes');
        return view('admin.attributes.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'frontend_type' => 'required'
        ]);

        $params = $request->except('_token');

        $attributes = $this->attributeRepository->createAttribute($params);

        if (! $attributes) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.index', 'Attribute added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $attribute = $this->attributeRepository->findAttributeById($id);

        $this->setPageTitle('Attributes', 'Edit Attribute : ' .$attribute->name);
        return view('admin.attributes.edit', compact('attribute'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'frontend_type' => 'required',
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->updateAttribute($params);

        if (! $attribute) {
            return $this->responseRedirectBack('Error occured while updating atttribute', 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.index', 'Attribute updated successfully', 'success', false, false);
    }


    public function delete($id)
    {
        $attribute = $this->attributeRepository->deleteAttribute($id);

        if (! $attribute) {
            return $this->responseRedirectBack('Error occured while deleting atttribute', 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.index', 'Attribute deletedd successfully', 'success', false, false);
    }
}
