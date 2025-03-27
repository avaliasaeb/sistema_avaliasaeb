$(function(){
  var language        = datatable;
  var pageLength      = 15;
  var responsive      = false;
  var searchHighlight = true;
  var lengthChange    = false;
  var scrollX         = false;
  var dom             = 'Bfrtip';
  var replaceElem     = function(data){
                          return data.replace(/<div class="select">(.*)<\/div>/, '')
                                     .replace(/<span class="d-none">(.*)<\/span>/, datatable.situacao);
                        };
  var initComplete    = function(){
                          $('.buttons-copy, .buttons-excel').removeClass('dt-button').addClass('btn btn-sm btn-outline-primary');
                          this.api().columns().every( function(){
                            var column = this;
                            var select = $('<select class="form-control select2"><option value="">'+ datatable.select +'</option></select>')
                                          .appendTo( $(column.header()).find('.select') )
                                          .on( 'change', function(){
                                            var val = $.fn.dataTable.util.escapeRegex( $(this).val() );
                                            column.search( val ? '^'+val+'$' : '', true, false ).draw();
                                          });
                                          $(".select2").select2();

                            column.data().unique().sort().each( function( d, j ){
                              if( d.indexOf("href") > -1){
                                var a = document.createElement('a');
                                a.innerHTML = d;
                                t = a.innerText;
                              }else{
                                t = d;
                              }
                              select.append( '<option value="'+t+'">'+t+'</option>' );
                            });
                          });
                        };

  $('#usersTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "15px"},
      { "targets": 4, "orderable": false, "width": "35px"}
    ]
  });

  $('#rolesTable, #paramsDetailTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0, 1 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0, 1 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "15px"},
      { "targets": 2, "orderable": false, "width": "35px"}
    ]
  });

  $('#paramsTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 1, "orderable": false, "width": "35px"}
    ]
  });

  $('#classTable, #teachersTable, #coordinatorsTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0, 1 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0, 1 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "15px"},
      { "targets": 2, "orderable": false, "width": "35px"}
    ]
  });

  $('#studentsTable, #examsTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0, 1, 2 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0, 1, 2 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "15px"},
      { "targets": 3, "orderable": false, "width": "35px"}
    ]
  });

  $('#questionsTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "15px"},
      { "targets": 1, "width": "300px"},
      { "targets": 4, "orderable": false, "width": "35px"}
    ]
  });

  $('#schedulesTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[1, 'asc']],
    "dom": dom,
    "buttons": [
      { 
        extend:'copyHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      },{
        extend:'excelHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3 ],
          format: {
            header: function ( data, row, column, node ) {
              return replaceElem(data);
            }
          }
        }
      }
    ],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "15px"},
      { "targets": 1, "width": "300px"},
      { "targets": 3, "width": "90px"},
      { "targets": 4, "width": "90px"},
      { "targets": 4, "orderable": false, "width": "35px"}
    ]
  });

  $('#scheduleTable, #myexamsTable').DataTable({
    "language": language,
    "pageLength": pageLength,
    "responsive": responsive,
    "searchHighlight": searchHighlight,
    "lengthChange": lengthChange,
    "scrollX": scrollX,
    "stateSave": true,
    "order": [[2, 'asc']],
    "initComplete": initComplete,
    "columnDefs": [
      { "targets": 0, "width": "55px", "orderable": false }
    ]
  }); 

});