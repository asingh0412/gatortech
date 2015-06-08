 // jQuery Datepicker  
        $(function()
        {
            $('#datepicker').datepicker(
            {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                // Set to only show the month and year
                
                onChangeMonthYear: function(year, month, widget)
                {
                    setTimeout(function()
                    {
                        $('.ui-datepicker-calendar').hide();
                    });
                },
                onClose: function(dateText, inst)
                {
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, month, 1));
                },
                }).click(function()
                {
                    $('.ui-datepicker-calendar').hide();
                });
        });