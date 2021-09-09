@extends('layouts.admin.main')
@section('headerTitle', 'Enquiry List')
@section('pageTitle', 'Enquiry List')

@section('content')
    
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
                                    <th>Vendor Name</th>
                                    
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
                                            <td><?=!empty($raw['vendor_name'])?$raw['vendor_name']:''?></td>
                                            <td><?=!empty($raw['created_at'])?$raw['created_at']:''?></td>
                                            
                                        </tr>
                                    <?php
                                } } ?>
                                
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
     $(document).ready( function () {
              $('#vendor-table').dataTable( {
                "processing": true
              } );
             } );
</script>
@endpush