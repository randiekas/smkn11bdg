function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<button type="button" class="btn btn-sm btn-default btn-s-xs btn-primary" id="addrowbutton">Add</button> ');
                    container.append('<button type="button" class="btn btn-sm btn-default btn-s-xs btn-danger" id="deleterowbutton">Delete</button>');

                    // create new row.
                    $("#addrowbutton").on('click', function () {
                        elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
                    });

                    // create new rows.

                    // delete row.
                    $("#deleterowbutton").on('click', function () {

                        var rowsSelected = elementJqxGridReligion.jqxGrid('getselectedcells');


                        if (rowsSelected.length>=1) {
                            var commit = elementJqxGridReligion.jqxGrid('deleterow');

                        }


                    });
                }
