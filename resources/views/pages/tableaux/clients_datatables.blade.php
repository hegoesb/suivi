{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">HTML Table
                    <div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div>
                </h3>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover js-exportable" id="kt_datatable">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nom Complet</th>
                    <th>Type</th>
                    <th>Entreprise</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        {{-- <tr class="gradeX {{ $value['justificatif']==1 ? '' : 'text-danger' }}"> --}}
                        <tr class="gradeX">
                            <td>{{$value['nom']}}</td>
                            <td>{{$value['nom_display']}}</td>
                            <td data-toggle="tooltip" data-placement="right" title="{{$value['type_client']['nom_display']}}">{{$value['type_client']['nom']}}</td>
                            <td data-toggle="tooltip" data-placement="right" title="{{$value['entreprise'][0]['nom_display']}}">{{$value['entreprise'][0]['nom']}}</td>
                            <td>modifier</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')

    {{-- datatable --}}
    <link href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        {{-- boutton --}}
        <link href="{{ asset('https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        {{-- Responsive --}}
        <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css') }}" type="text/javascript"></script>
    {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/> --}}
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- datatable --}}
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
        {{-- boutton --}}
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js') }}" type="text/javascript"></script>
        {{-- Responsive --}}
        <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
        {{-- Page length --}}
        {{-- <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.js') }}" type="text/javascript"></script> --}}




    {{-- page scripts --}}
    {{-- <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> --}}
    {{-- tooltips --}}
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.3/tooltip.min.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrltip',
                responsive: true,
                buttons: [

                    {extend: 'copy', title: '{{$titre}}' },
                    {extend: 'csv', title: '{{$titre}}' },
                    {extend: 'excel', title: '{{$titre}}' },
                    {extend: 'pdf', title: '{{$titre}}'},
                    {extend: 'print', title: '{{$titre}}'}

                ],
                "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                "order": [[ 0, "asc" ]],
                "columnDefs": [
                    { "orderable": false ,    "targets": [4]},
                    // { "width": "54px", "targets": 8 },
                ],
                "oLanguage": {
                  "sUrl": "//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
                },
                initComplete: function () {
                    this.api().columns([4,5,6]).every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });
        });
        $('[data-toggle="tooltip"]').tooltip({container:"body"})
    </script>


@endsection
