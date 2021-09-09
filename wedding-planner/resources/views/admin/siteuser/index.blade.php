@extends('layouts.admin.main')
@section('headerTitle', 'Site User List')
@section('pageTitle', 'Site User List')

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
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($siteuser)){ $i=1;
                                    foreach ($siteuser as $raw) { ?>
                                         <tr>
                                            <td><?=$i++?></td>
                                            <td><?=!empty($raw['name'])?$raw['name']:''?></td>
                                            <td><?=!empty($raw['email'])?$raw['email']:''?></td>
                                            <td><?=!empty($raw['phone'])?$raw['phone']:''?></td>
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