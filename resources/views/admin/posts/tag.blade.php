@extends('layouts.admin')

@section('title','| Categories')



@section('content')

  
    <div class="main-content-header box-shadow">
        <div class="row">            
          <div class="col-md-6 col-xs-12 mp-0 alt-font">
            <h4> <span>Tags</span></h4>
          </div> 
        </div>
    </div>
      

    <div class="main-content-body box-shadow">
      
      <div class="container category">

        <div class="col-md-4">

          <!--catagory-->
          <div class="form-group">
            <label for="usr">Add New Tag</label>
            <input type="text" class="form-control input-sm" id="usr">
            <small><i>The name is how it appears on your site.</i></small>
          </div>
          
          
          <!--slug-->
          <div class="form-group">
            <label for="usr">Slug</label>
            <input type="text" class="form-control input-sm" id="usr">
            <small><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></small>
          </div>
          

          <div class="form-group">
            <label for="comment">Description</label>
            <textarea class="form-control" rows="3" id="comment"></textarea>
            <small><i>The description is not prominent by default; however, some themes may show it.</i></small>
          </div>

          <div>
            <button type="button" class="btn btn-primary btn-sm">
              Add New Category
            </button>
          </div>

        </div>

        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" value=""></th>
                <th>Name</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Count</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" value=""></td>
                <td>John</td>
                <td>-</td>
                <td>john@example.com</td>
                <td>7</td>
              </tr>
              <tr>
                <td><input type="checkbox" value=""></td>
                <td>Mary</td>
                <td>-</td>
                <td>mary@example.com</td>
                <td>4</td>
              </tr>
              <tr>
                <td><input type="checkbox" value=""></td>
                <td>July</td>
                <td>-</td>
                <td>july@example.com</td>
                <td>3</td>
              </tr>
            </tbody>
          </table>

          <b><i>Note:</i></b>
          <i>Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category <b>Uncategorized</b>.</i>
        </div>

      </div>
    </div>


    
@endsection