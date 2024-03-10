@extends('layouts.admin-base')
@section('main-content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Simple Datatable
            </h5>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns"><div class="dataTable-top"><div class="dataTable-dropdown"><select class="dataTable-selector form-select"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select><label> entries per page</label></div><div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div></div><div class="dataTable-container"><table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr><th data-sortable="" style="width: 13.037%;"><a href="#" class="dataTable-sorter">Name</a></th><th data-sortable="" style="width: 46.0741%;"><a href="#" class="dataTable-sorter">Email</a></th><th data-sortable="" style="width: 12.4444%;"><a href="#" class="dataTable-sorter">Phone</a></th><th data-sortable="" style="width: 16.1481%;"><a href="#" class="dataTable-sorter">City</a></th><th data-sortable="" style="width: 12.2963%;"><a href="#" class="dataTable-sorter">Status</a></th></tr>
                </thead>
                <tbody><tr><td>Graiden</td><td>vehicula.aliquet@semconsequat.co.uk</td><td>076 4820 8838</td><td>Offenburg</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Dale</td><td>fringilla.euismod.enim@quam.ca</td><td>0500 527693</td><td>New Quay</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Nathaniel</td><td>mi.Duis@diam.edu</td><td>(012165) 76278</td><td>Grumo Appula</td><td>
                            <span class="badge bg-danger">Inactive</span>
                        </td></tr><tr><td>Darius</td><td>velit@nec.com</td><td>0309 690 7871</td><td>Ways</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Oleg</td><td>rhoncus.id@Aliquamauctorvelit.net</td><td>0500 441046</td><td>Rossignol</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Kermit</td><td>diam.Sed.diam@anteVivamusnon.org</td><td>(01653) 27844</td><td>Patna</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Jermaine</td><td>sodales@nuncsit.org</td><td>0800 528324</td><td>Mold</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Ferdinand</td><td>gravida.molestie@tinciduntadipiscing.org</td><td>(016977) 4107</td><td>Marlborough</td><td>
                            <span class="badge bg-danger">Inactive</span>
                        </td></tr><tr><td>Kuame</td><td>Quisque.purus@mauris.org</td><td>(0151) 561 8896</td><td>Tresigallo</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr><tr><td>Deacon</td><td>Duis.a.mi@sociisnatoquepenatibus.com</td><td>07740 599321</td><td>Karapınar</td><td>
                            <span class="badge bg-success">Active</span>
                        </td></tr></tbody>
            </table></div><div class="dataTable-bottom"><div class="dataTable-info">Showing 1 to 10 of 26 entries</div><nav class="dataTable-pagination"><ul class="dataTable-pagination-list pagination pagination-primary"><li class="active page-item"><a href="#" data-page="1" class="page-link">1</a></li><li class="page-item"><a href="#" data-page="2" class="page-link">2</a></li><li class="page-item"><a href="#" data-page="3" class="page-link">3</a></li><li class="pager page-item"><a href="#" data-page="2" class="page-link">›</a></li></ul></nav></div></div>
        </div>
    </div>

</section>
@endsection