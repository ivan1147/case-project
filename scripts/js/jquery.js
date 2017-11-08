$(document).ready(function(){
    //date picker ui
    var dates = $( "#from, #to" ).datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText, inst) {
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