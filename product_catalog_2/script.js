class TypeSwitcher{
    static switchType(value){
        //change form when type is switched
        if(value=="book"){
            $(".type_book").show();
            $(".type_disc").hide();
            $(".type_furniture").hide();
        }
        else if (value=="furniture") {
            $(".type_furniture").show();
            $(".type_disc").hide();
            $(".type_book").hide();
        }
        else{
            $(".type_disc").show();
            $(".type_book").hide();
            $(".type_furniture").hide();
        }
    }
}

$( "select#type_switcher" ).change( function(){
    // Get the value from from a dropdown select
    var value = $(this).val();
    //switch types
    TypeSwitcher.switchType(value);
} );





