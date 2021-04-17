@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data SPK </h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                            {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                            <table class="table table-striped table-bordered table-hovered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th width="15%">cabang</th>
                                    <th>No SPK</th>
                                    <th width="20%">Satus Pembayaran</th>
                                    <th>aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($spk as $spk)
                                    {{--{{$spk->biaya}}--}}
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$spk->branch['nama_toko']}}</td>
                                        <td>{{$spk['no_spk']}}</td>
                                        @php
                                        @endphp
                                       <td><div class="progress progress-striped active" style="background-color: #d4d8cf ;margin-bottom: 0">
                                               <div style="width: {{$spk->invoice->sum('persen')}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="43" role="progressbar" class="progress-bar progress-bar-striped">
                                                   <span class="sr-only">43% Complete (success)</span>
                                               </div>
                                           </div>
                                           {{--{{$spk->invoice->sum('persen')}}--}}
                                       </td>
                                        <td>
                                            <a href="{{route('invoice.show',$spk->id)}}" class="btn btn-success btn-xs"><i class="fa fa-folder-open-o"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                {{--<tr>--}}
                                {{--<td colspan="5">--}}
                                {{--<ul class="pagination pull-right"></ul>--}}
                                {{--</td>--}}
                                {{--</tr>--}}
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{url('/')}}" accept-charset="UTF-8" class="formDelete2 half-width right">
        {{csrf_field()}}
        {{method_field('delete')}}
    </form>
    {{--modals--}}
    <div class="modal inmodal" id="konfirmasi2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h6 class="modal-title">Apakah anda yakin ?</h6>
                    <div style="margin-top:15px">
                        <input type="button" class="btn btn-primary btnYes2" value="Ya">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Modal BUAT --}}
@endsection
@section('scripts')
    @parent
    <!-- Page-Level Scripts -->
    <script>
        $('#data_5 .input-daterange').datepicker({
            format:'yyyy-mm-dd',
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
        var id = null;
        var baseURL = '{{url('/')}}';
        $('.btnDelete2').click(function () {
            id = $(this).data('id');
            $('.formDelete2').attr('action', baseURL+'/spk/'+id);
        });
        $('.btnYes2').click(function () {
            $('.formDelete2').submit();
        });

    </script>
@endsection