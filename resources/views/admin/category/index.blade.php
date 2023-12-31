<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <b>All Category</b>

        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
               @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                    <div class="card-header">All Category</div>
                
         
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">User_id</th>
                    <th scope="col">Created at</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ( $categories as $item)
                    <tr>
                        <th scope="row">{{$categories->firstItem() + $loop->index  }}</th>
                        <td>{{ $item->category_name }}</td>
                        <td>{{ $item->user->name }}</td>

                        @if ($item->created_at == Null)
                          <span class="text-danger">No Data Set</span> 
                          
                          @else
                          <td>{{ $item->created_at->diffForHumans() }}</td>
                        @endif
                       
                        <td>
                          <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('softdelete.category',$item->id ) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                   
                
                
                 
                </tbody>
              </table>
              {{ $categories->links() }}
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category</div>

                <div class="card-body">
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                          <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                          @error('category_name')
                             <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <button type="submit" class="btn bg-primary text-white">Add Category</button>
                      </form>
                </div>
               
            </div>
        </div>    

        </div>
       </div>


       <!--Trash-->

       <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                  
              
                    <div class="card-header">Trash List</div>
                
         
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">User_id</th>
                    <th scope="col">Created at</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($trachCat as $item)
                    <tr>
                        <th scope="row">{{$categories->firstItem() + $loop->index  }}</th>
                        <td>{{ $item->category_name }}</td>
                        <td>{{ $item->user->name }}</td>

                        @if ($item->created_at == Null)
                          <span class="text-danger">No Data Set</span> 
                          
                          @else
                          <td>{{ $item->created_at->diffForHumans() }}</td>
                        @endif
                       
                        <td>
                          <a href="{{ route('restore.category',$item->id) }}" class="btn btn-info">Restore</a>
                          <a href="{{ route('pdelete.category',$item->id) }}" class="btn btn-danger">P.Delete</a>
                        </td>
                      </tr>
                    @endforeach
                   
                
                
                 
                </tbody>
              </table>
              {{$trachCat->links() }}
            </div>
        </div>
        
           

        </div>
       </div>
          

    </div>
</x-app-layout>
