
$(function () {
    //old table html
    let old_body = $("#table-body").html()

    // client search
    $("#clientSearch").on('keyup',function ()
    {
        searchAjax("#clientSearch",'client/search',"#table-body",old_body);
});
      // contact search
    $("#contactSearch").on('keyup',function ()
    {
        searchAjax("#contactSearch",'contact/search',"#table-body",old_body);

    });
    // donation search
    $("#donationSearch").on('keyup',function ()
    {
            searchAjax("#donationSearch",'donation/search',"#table-body",old_body);

    });
    // front search
    $("frontSearch").on('click',function () {


    });





    //   search ajax function
   function searchAjax(element,url,parentDiv,oldBody) {
       let mySearch =  $(element).val();
       if (mySearch !='') {
           $.ajax({
                   method: 'get',
                   data: {
                       'mySearch': mySearch
                   },
                   url: url,
                   success: function (data) {
                       $(parentDiv).html(data);
                   }
               }
           )
       }

       else{
           $(parentDiv).html(oldBody);
       }
   }
   })

