@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View Item
                    <a class="pull-right" href="/item">List</a>
                    <a class="pull-right show-edit-link" href="{{ route('item.edit', $item->id) }}">Edit</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <tbody>
                            <tr>
                                <td class="col-md-3 text-right">ID</td>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Encoded By</td>
                                <td>{{ $item->users_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Ticket #</td>
                                <td>{{ $item->ticket_no }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Description</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Auction Schedule</td>
                                <td>{{ $item->ticket_no }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Category</td>
                                <td>{{ $item->category_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Type</td>
                                <td>{{ $item->type_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Price</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Is Sold</td>
                                <td>{{ $item->is_sold }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Date Created</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Date Updated</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Item photos</td>
                                <td>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTIxNWMxNTFkMiB0ZXh0IHsgZmlsbDpyZ2JhKDI1NSwyNTUsMjU1LC43NSk7Zm9udC13ZWlnaHQ6bm9ybWFsO2ZvbnQtZmFtaWx5OkhlbHZldGljYSwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTIxNWMxNTFkMiI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiM3NzciLz48Zz48dGV4dCB4PSI3NC40Mzc1IiB5PSIxMDQuNSI+MjAweDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTIxNWMxNTFkMiB0ZXh0IHsgZmlsbDpyZ2JhKDI1NSwyNTUsMjU1LC43NSk7Zm9udC13ZWlnaHQ6bm9ybWFsO2ZvbnQtZmFtaWx5OkhlbHZldGljYSwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTIxNWMxNTFkMiI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiM3NzciLz48Zz48dGV4dCB4PSI3NC40Mzc1IiB5PSIxMDQuNSI+MjAweDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTIxNWMxNTFkMiB0ZXh0IHsgZmlsbDpyZ2JhKDI1NSwyNTUsMjU1LC43NSk7Zm9udC13ZWlnaHQ6bm9ybWFsO2ZvbnQtZmFtaWx5OkhlbHZldGljYSwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTIxNWMxNTFkMiI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiM3NzciLz48Zz48dGV4dCB4PSI3NC40Mzc1IiB5PSIxMDQuNSI+MjAweDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTIxNWMxNTFkMiB0ZXh0IHsgZmlsbDpyZ2JhKDI1NSwyNTUsMjU1LC43NSk7Zm9udC13ZWlnaHQ6bm9ybWFsO2ZvbnQtZmFtaWx5OkhlbHZldGljYSwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTIxNWMxNTFkMiI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiM3NzciLz48Zz48dGV4dCB4PSI3NC40Mzc1IiB5PSIxMDQuNSI+MjAweDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTIxNWMxNTFkMiB0ZXh0IHsgZmlsbDpyZ2JhKDI1NSwyNTUsMjU1LC43NSk7Zm9udC13ZWlnaHQ6bm9ybWFsO2ZvbnQtZmFtaWx5OkhlbHZldGljYSwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTIxNWMxNTFkMiI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiM3NzciLz48Zz48dGV4dCB4PSI3NC40Mzc1IiB5PSIxMDQuNSI+MjAweDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
