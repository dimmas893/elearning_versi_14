@extends('layouts.template_guru')
@section('contents')
      <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Kelas</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>raport</h1>
                                @foreach($raport as $p)
                                    <tr>
                                        <td>{{$p->siswa->name}}</td>
                                        <td>{{$p->kelas->kelas}}</td>
                                        <td><a href="{{ route('get_raport', $p->id) }}"> edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection