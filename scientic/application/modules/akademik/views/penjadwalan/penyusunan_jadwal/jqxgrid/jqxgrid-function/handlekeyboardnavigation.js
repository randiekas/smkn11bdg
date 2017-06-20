function(event)
{
    var key = event.charCode ? event.charCode : event.keyCode ? event.keyCode : 0;

    if(event.altKey==true && key==46)
    {
      var commit = elementJqxGridReligion.jqxGrid('deleterow');
    }
    if(event.altKey==true && key==65)
    {
      elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    }
}
