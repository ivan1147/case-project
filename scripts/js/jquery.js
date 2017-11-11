$(document).ready(function(){
    var dateToday = new Date();
    //date picker ui
    var dates = $( "#from, #to" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: dateToday,
        onSelect: function(dateText, inst, selectedDate) {
            //set value
            $("#" + this.id + "_value").val(dateText);
            //set the min or max date
            var option = this.id == "from" ? "minDate" : "maxDate",
            instance = $( this ).data( "datepicker" ),
            date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat, 
                dateText, instance.settings );
            dates.not( this ).datepicker( "option", option, date );
        }
    });
});

