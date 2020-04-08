@extends('lte.master')
@section('content')

<!-- <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a> -->

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">NIP/NIK</th>
               <th scope="col">Jabatan</th>
               <th scope="col">Email</th>
             
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
        
          @forelse($data as $row)
          <tr>
               <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
               <td>{{ $row->name }}</td>
               <td>{{ $row->nip }}</td>
               <td>{{ $row->jabatan }}</td>
               <td>{{ $row->email }}</td>
               <td>
                    <a href="{{ route('user.edit', $row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
               
               <form action="{{ route('user.destroy', $row->id)}}" 
                                method="post" 
                                class="d-inline">
                                @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>


                  
                    
               </td>
          </tr>
          @empty
          <tr>
               <td colspan="8">Data tidak ditemukan</td>
          </tr>
          @endforelse
         
     </tbody>
</table>
{!! $data->render() !!}

@endsection

