@extends('layouts.template_guru')
@section('contents')

<x-alert />
      <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Kelas</th>
                                    <th>nilai tugas</th>
                                    <th>nilai ulangan</th>
                                    <th>nilai ujian</th>
                                    <th>nilai raport</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>raport</h1>
                                <form action="{{route('raport_save', $raport->id)}}"  method="POST" enctype="multipart/form-data">
                                {{-- @foreach($raport as $p) --}}
                                @csrf
                                    <tr>
                                        <td>{{$raport->siswa->name}}</td>
                                        <td>{{$raport->kelas->kelas}}</td>
                                        <td>{{$raport->nilai_tugas}}
                                                <input type="number" name="nilai_tugas" id="nilai_tugas" class="form-control" placeholder="masukan nilai tugas">
                                        </td>
                                        <td>{{$raport->nilai_ulangan}}<input type="number" name="nilai_ulangan" id="nilai_ulangan" class="form-control" placeholder="masukan nilai tugas"></td>
                                        <td>{{$raport->nilai_ujian}}<input type="number" name="nilai_ujian" id="nilai_ujian" class="form-control" placeholder="masukan nilai tugas"></td>
                                        <td>{{$raport->nilai_raport}}</td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="save">
                                        </td>
                                        {{-- <td><a href="{{ route('get_raport', $p->id) }}"> edit</a></td> --}}
                                    </tr>
                                </form>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection