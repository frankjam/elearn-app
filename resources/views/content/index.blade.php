<!-- 
Instructors should be able to create new courses, update existing courses, and delete courses they own. 
Additionally 
each course has to have a status which is set to 'Pending' on Creation 
and will have to go through an approval(done by a user with the 'approver' Role the status now changes to 'Approved'

-->

<div class="container">
    <div class="row">
    <a href="{{ route('courses.create') }}" class="btn btn-md" > Create course </a>
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td> 
      <a class="btn btn-primary me-2" href="{{ route('courses.show', 1) }}">Show</a>
                                                    <a class="btn btn-primary me-2" href="{{ route('courses.edit', 1) }}">Edit</a>
                                                    <form action="{{ route('courses.destroy', 1) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
    </td>
    </tr>
    
  </tbody>
</table>

</div>