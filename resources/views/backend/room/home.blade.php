@extends('backend.layouts.app')
@section('title', 'Data Kamar')

@push('scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('src/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush


@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
              <a href="{{ url('backend/room/create') }}"><i class="fas fa-plus"></i> Add</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama room</th>
                  <th>Keterangan</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($rooms as $room)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $room->name}}</td>
                      <td>{{ $room->descriptions}}</td>
                      <td>
                        <a href="{{ url('backend/room/'.$room->id) }}" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                        <a href="{{ url('backend/room/'.$room->id.'/edit') }}" class="btn btn-xs btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ url('backend/room/'.$room->id) }}" method="post" class=" d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-xs btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama room</th>
                  <th>Keterangan</th>
                  <th>Tindakan</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div>
    </div>
</div> 
@endsection


@push('scripts')
    <!-- DataTable-->
    <script src="{{asset('src/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('src/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('src/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('src/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('src/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('src/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('src/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('src/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('src/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('src/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('src/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('src/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
@endpush