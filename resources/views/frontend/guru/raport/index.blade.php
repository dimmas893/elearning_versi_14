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
                                    <th>Keterangan</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>nilai ulangan rata rata</h1>
                                @foreach($nilai_ulangan as $p)
                                    <tr>
                                        <td>{{$p->siswa_name}}</td>
                                        <td>{{$p->nilai * 0.3 }}</td>
                                        <td><a href="{{ route('get_raport', $p->id) }}"> get</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>nilai ujian rata rata</h1>
                                @foreach($nilai_ujian as $p)
                                    <tr>
                                        <td>{{$p->siswa_name}}</td>
                                        <td>{{$p->nilai * 0.4 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>nilai tugas rata rata</h1>
                                @foreach($nilai_tugas as $p)
                                    <tr>
                                        <td>{{$p->siswa_name}}</td>
                                        <td>{{$p->nilai * 0.4}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h1>Raport</h1>
                                @foreach($nilai_ujian as $p)
                                            <tr>
                                                <td>{{$p->siswa_name}}</td>
                                                <td>
                                                        {{$p->nilai * 0.4 }} 
                                                </td>
                                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

@endsection