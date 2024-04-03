<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Mockery\Exception;

// category controller class
class CategoryController extends Controller
{
    // function for index or home page for
    // category module
    public function index()
    {
        // fetching category data from db
        $data['categories'] = Category::get();
        // return page
        return view("admin.category.index", $data);
    }

//  for add form
    public function create()
    {
        //return page to add
        return view("admin.category.create");
    }

// this functions stores the data from form
    public function store(CategoryFormRequest $formRequest)
    {
        // get valid data only
        $validData = $formRequest->validated();

        // try to store data in db
        try{
            Category::create($validData);

        }catch (\Exception $exception){
            // if excepation occured return to route
            return redirect()->route('categories.index')->withErrors( $exception->getMessage());
        }

        //  return to route
        return redirect()->route('categories.index')->with('message', 'New Category successfully created!! ');

    }
// function to return edit form
    public function edit(string $id)
    {
        // find the category object from db
        try{
            // try statement
            $data['category'] = Category::findOrFail($id);

        }catch (\Exception $exception){
            // return exception
            return redirect()->route('categories.index')->withErrors( $exception->getMessage());
        }
        // return page
        return view("admin.category.edit", $data);
    }

    // update data
    public function update(CategoryFormRequest $request, string $id)
    {
        // get valid data
        $validData = $request->validated();

        try{
            // try to store edited data
            Category::findOrFail($id)->update($validData);
            // return with success
            return redirect()->route('categories.index')->with('message', 'Category successfully Updated!! ');

        }catch (\Exception $exception){
            // catch exception here
            return redirect()->route('categories.index')->withErrors( $exception->getMessage());
        }
    }

 // for removing details
    public function destroy(string $id)
    {
        try{
            // find category object and delete it
            Category::findOrFail($id)->delete();
            // defining route
            return redirect()->route('categories.index')->with('message', 'Category successfully Deleted!! ');

//        }catch (QueryException $exception){
//            // throw or catch exception
//            return redirect()->route('categories.index')->withErrors( $exception->getMessage());
        }catch (\Exception $exception){
            // throw or catch exception
            return redirect()->route('categories.index')->withErrors( $exception->getMessage());
        }
    }
}
