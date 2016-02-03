jQuery(document).ready(function() {
    jQuery('#example').DataTable( {
		"columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
					console.log(row);
                    return '<input type="button"  value="detail" onclick="detail('+ row.id+')" />';
					
                },
                "targets": 3
            }
		],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": urlAPI,
            "type": "POST"
        },
        "columns": [
			{ "data": "created"},
            { "data": "url" },
            { "data": "param" },             
        ]
    } );
} );

function detail(id){
	params={id:id,type:"apiDetail"}
	respon=sendAjax( urlDetail,params);
	respon.success(function(result,status) {
		if(result.status==true){ 
			jQuery(".modal-title").html(result.data.title);
			jQuery(".modal-body").html(result.data.html);
		}else{
			jQuery(".modal-title").html("WARNING");
			jQuery(".modal-body").html(result.message);
			
		}
		
		//jQuery("#myModal").modal({show: true}).css("height","150%");	
		jQuery("#preview").html(result.data.html);
		console.log("success");	console.log(result);			
	});
	respon.error(function(xhr,status,msg){			
			console.log("Error");
			console.log(status);
			console.log(msg);
			console.log(xhr);
			
	});
}