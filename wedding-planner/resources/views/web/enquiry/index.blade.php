@extends('layouts.app')


@section('content')
 <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
<link href="{{ asset('css/about.css') }}" rel="stylesheet">

<section id="about" class="clearfix">
 <div class="about_main clearfix">
   <div class="container">
    <div class="row">
     <div class="about clearfix">
       <div class="col-sm-7 about_left clearfix">
        <div class="about_left_inner clearfix">
         <h1>User Enquiry List </h1>
       </div>
     </div>  
   </div>
 </div>
</div>
</div>
</section>   
<section id="contact_2" class="clearfix">
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <input type="hidden" id="drs" name="drange"/>
                    <input type="hidden" id="delete_value" name="delete_value"/>
                    <div class="table-overflow">
                        <table id="vendor-table" class="table table-lg table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>*</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>City</th>
                                    <th>Special Instruction</th>
                                    <th>Event Date</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($enquiry)){ $i=1;
                                    foreach ($enquiry as $raw) { ?>
                                         <tr>
                                            <td><?=$i++?></td>
                                            <td><?=!empty($raw['name'])?$raw['name']:''?></td>
                                            <td><?=!empty($raw['email'])?$raw['email']:''?></td>
                                            <td><?=!empty($raw['phone_number'])?$raw['phone_number']:''?></td>
                                            <td><?=!empty($raw['city_name'])?$raw['city_name']:''?></td>
                                            <td><?=!empty($raw['special_instruction'])?$raw['special_instruction']:''?></td>
                                            <td><?=!empty($raw['event_date'])?$raw['event_date']:''?></td>
                                            <td><?=!empty($raw['created_at'])?$raw['created_at']:''?></td>
                                            
                                        </tr>
                                    <?php
                                } } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('script')
<script type="text/javascript">
     $(document).ready( function () {
              $('#vendor-table').dataTable( {
                "processing": true
              } );
             } );
</script>
<!-- <script>
var oTable;
oTable = $('#vendor-table').DataTable({
    processing: true,
    serverSide: true,
    dom: 'lBfrtip',
    order:  [[ 3, "asc" ]],
    pagingType: 'full_numbers',
    /*buttons: [
        {
            extend: 'print',
            autoPrint: false,
            customize: function ( win ) {
                $(win.document.body)
                    .css( 'padding', '2px' )
                    .prepend(
                        '<img src="{{asset('img/logo.png')}}" style="float:right; top:0; left:0;height: 40px;right: 10px;background: #101010;padding: 8px;border-radius: 4px" /><h5 style="font-size: 9px;margin-top: 0px;"><br/><font style="font-size:14px;margin-top: 5px;margin-bottom:20px;"> Report Vendor</font><br/><br/><font style="font-size:8px;margin-top:15px;">{{date('Y-m-d h:i:s')}}</font></h5><br/><br/>'
                    );


                $(win.document.body).find( 'div' )
                    .css( {'padding': '2px', 'text-align': 'center', 'margin-top': '-50px'} )
                    .prepend(
                        ''
                    );

                $(win.document.body).find( 'table' )
                    .addClass( 'compact' )
                    .css( { 'font-size': '9px', 'padding': '2px' } );


            },
            title: '',
            orientation: 'landscape',
            exportOptions: {columns: ':visible'} ,
            text: '<i class="fa fa-print" data-toggle="tooltip" title="" data-original-title="Print"></i>',
            //className: 'btn btn-primary'
        },*/
       /* {extend: 'colvis', text: '<i class="fa fa-eye" data-toggle="tooltip" title="" data-original-title="Column visible"></i>'},
        {extend: 'csv', text: '<i class="fa fa-file-excel-o" data-toggle="tooltip" title="" data-original-title="Export CSV"></i>'}*/
    ],
    //sDom: "<'table-responsive fixed't><'row'<p i>> B",
    sPaginationType: "bootstrap",
    destroy: true,
    responsive: true,
    scrollCollapse: true,
    oLanguage: {
        "sLengthMenu": "_MENU_ ",
        "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
    },
    lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
    ajax: {
    url: '{!! route('vendor.enquirydata') !!}',
        data: function (d) {
            d.range = $('input[name=drange]').val();
        }
    },
    columns: [
		{ data: "rownum", name: "rownum" },
		{ data: "name", name: "name" },
        { data: "email", name: "email" },
		{ data: "phone_number", name: "phone_number" },
		{ data: "city_id", name: "city_id" },
		{ data: "special_instruction", name: "special_instruction" },
        { data: "event_date", name: "event_date" },
		{ data: "created_at", name: "created_at", visible:false },
        { data: "action", name: "action", searchable: false, orderable: false },
    ],
}).on( 'processing.dt', function ( e, settings, processing ) {if(processing){Pace.start();} else {Pace.stop();}});

$("#vendor-table_wrapper > .dt-buttons").appendTo("div.export-options-container");

$('#formsearch').submit(function () {
    oTable.search( $('#search-table').val() ).draw();
    return false;
} );

oTable.page.len(25).draw();

function modalDelete(id) {
    $('#modal-delete').modal('show');
    $('#delete_value').val(id);
}

function deleteRecord(){
    $('#modal-delete').modal('hide');
    var id = $('#delete_value').val();
    $.ajax({
        url: '{{route("vendor.enquiry")}}' + "/" + id + '?' + $.param({"_token" : '{{ csrf_token() }}' }),
        type: 'DELETE',
        complete: function(data) {
            oTable.draw();
        }
    });
}

</script> -->
@endpush