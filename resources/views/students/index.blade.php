<table class="table mt-3">
  <thead>

  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($students as $student)
    <tr>
      <td>{{ $student->id }}</td>
      <td>{{ $student->name }}</td>
      <td>
        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">Show</a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
