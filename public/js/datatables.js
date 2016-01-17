$(document).ready(function() {
    $('#example').DataTable	( {
			 scrollY: true,
			 scrollY: 30,
             bJQueryUI: true,
             sPaginationType: "full_numbers",
             //to delete search box
             bFilter: false,
    } );
} );






// table.row(that).remove().draw();

 // var table=$('#example').DataTable();